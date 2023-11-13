<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Validator;
use App\Models\Trip;
use App\Models\Coupon;
use Carbon\Carbon;
use App\Models\CouponUsers;
use App\Models\User;
use App\Models\Accommodation;
use App\Models\AdditionalTrip;
use App\Models\ReservedAdditionalTrip;

use Illuminate\Database\Eloquent\Model;


class
 ReservedController extends Controller
{
    public function getReserved($id)
    {
        // return response()->json( ['reservations' => Reservation::find()->where('trip_id' , $id )  ] , 200 );
        // return response()->json( ['reservations' => Reservation::find($id) ] , 200 );
        return response()->json( ['reservations' => Reservation::where( 'trip_id', $id)->first() ] , 200 );
    }

    public function addReservation(Request $request )
    {
        // $validator = Validator::make( $request->all() , [
        //     'trip_id'           => 'required',
        //     'user_id'           => 'required',
        //     'price'             => 'required',
        //     'comment'           => 'required',
        //     'uuid'              => 'required',
        //     'status'            => 'required',
        // ]);
        // if ( $validator->fails() ) {
        //     return response()->json( [
        //         'error' => $validator->errors()
        //     ]);
        // }
        //     $newpost  = Reservation::create( $request->all() );
        //     return response()->json( compact('Reservition Saved') );

        $validator = Validator::make($request->all(), [
            'first_name'     => 'required',
            'last_name'      => 'required',
            'title'          => 'required',
            'mobile'         => 'required',
            'email'          => 'required',
            'country_id'     => 'required',
            'trip_id'        => 'required',
            'accommodations' => 'required',
            'coupon'         => 'required'
        ]);

        if ( $validator->fails() ) {
            return response()->json( [
                'error' => $validator->errors()
            ]);
        }


        $accommodations  = request('accommodations');

        $additionalTrips = request()->filled('additional_trips') ? json_decode(request('additional_trips')) : [];

        $trip   = Trip::find(request('trip_id'));

        if ( request('coupon') != "no_coupon" ) {
            // coupon stage
            $check = Coupon::where( "name", request('coupon') )->first();

            if (!$check) {
                return response()->json(["msg" => "coupon is not found !"], 404);
            }


            // check if coupon is valid or not
            if ( $check->created_at > Carbon::now() || $check->usage_count >= $check->usage_limit ) {
                return response()->json( [ "msg" => "coupon is invalid !" ] , 404 );
            }

            // check if user has used this coupon ==> [note] user should use this coupon once one time
            foreach ( $check->coupon_users as $usage ) {
                if ( $usage->user_mobile == request('mobile') ) {
                    return response()->json( [ "msg" => "this user has used this coupon before !" ] , 404 );
                }
            }

            foreach ( $check->related_trips as $trips ) {
                if ( $trips->coupon_id == $check->id ) {
                    $check->update([
                        "usage_count"       => $check->usage_count++
                    ]);

                    CouponUsers::create([
                        "user_mobile"       => request('mobile'),
                        "coupon_id"         => $check->id
                    ]);
                }
            }
        }

        // return $request;

        $request['name'] = $request->first_name.$request->last_name;

        $user = User::create($request->all());

        $request['user_id']  = $user->id;
        $request['uuid']     = uniqid();
        $reservation = Reservation::create($request->all());

        $allPrice = 0;

        // Accomodation
        foreach ( $accommodations as $accommodation ) {
            $cPrice = $trip->cabin_price;
            $sPrice = $trip->suite_price;
            $cPrice_single = $trip->single_cabin_price;
            $sPrice_single = $trip->single_suite_price;
            $child1 = $accommodation['child1_age'];
            $child2 = $accommodation['child2_age'];

            $price_double = $accommodation['type'] == 1 ? $cPrice : $sPrice;
            $price_single = $accommodation['type'] == 1 ? $cPrice_single : $sPrice_single;

            $totalPrice = $accommodation['adults_count'] > 1 ? $price_double : $price_single;
            $totalPrice += ($child1 && $child1 == 2) ? $price_double * 0.25 : 0;
            $totalPrice += ($child2 && $child2 == 2) ? $price_double * 0.25 : 0;

            if ( request('coupon') != "no_coupon" ) {
                $totalPrice -= (($check->discount * $totalPrice) / 100);
            }

            $allPrice += $totalPrice;

            Accommodation::create([
                'reservation_id'         => $reservation->id,
                'type'                   => $accommodation['type'],
                'accommodation_num'      => $accommodation['accommodation_num'],
                'guest_name'             => $accommodation['guest_name'],
                'adults_count'           => $accommodation['adults_count'],
                'children_count'         => $accommodation['children_count'],
                'child1_age'             => $child1,
                'child2_age'             => $child2,
                'cabin_price'            => $cPrice,
                'suite_price'            => $sPrice,
                'single_cabin_price'     => $cPrice_single,
                'single_suite_price'     => $sPrice_single,
                'total_price'            => $totalPrice,
                "discount"               => request('coupon') != "no_coupon" ? $check->discount : 0
            ]);
        }


        foreach ($additionalTrips as $additionalTrip) {
            $aTrip = AdditionalTrip::find($additionalTrip->id);

            $aPrice = $aTrip->price;
            $adults_count = $additionalTrip->adultCount;
            $child1_count = $additionalTrip->child1Count;
            $child2_count = $additionalTrip->child2Count;

            $totalPrice = $aPrice * $adults_count;
            $totalPrice += $aPrice * $child1_count * 0.5;
            if (request('coupon') != "no_coupon") {
                 $totalPrice -= ( ($check->discount * $totalPrice) / 100 ) ;
            }

            $allPrice += $totalPrice;

            ReservedAdditionalTrip::create( [
                'reservation_id'        => $reservation->id,
                'additional_trip_id'    => $additionalTrip->id,
                'price'                 => $aPrice,
                'adults_count'          => $adults_count,
                'child1_count'          => $child1_count,
                'child2_count'          => $child2_count,
                'total_price'           => $totalPrice,
            ]);
        }

        // $reservation->update(['price' => $allPrice]);
        $reservation->update(['price' => $allPrice,'ip_address'=>request()->ip()]);

        $reference_number = $reservation->id;

        $transaction_uuid = $reservation->uuid;

        // $online_payment_data = $this->online_payment_data($allPrice, $reference_number, $transaction_uuid, $user);

        // $signature = $this->signature($online_payment_data);

        $reservation = $reservation->load (
            'user.country',
            'trip.tripCategory',
            'accommodations',
            'reservedAdditionalTrips.additionalTrip'
        );

        return response()->json(compact('reservation'));

    }
}
