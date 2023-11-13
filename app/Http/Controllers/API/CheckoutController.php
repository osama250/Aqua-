<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;

class CheckoutController extends Controller
{
    public function getCheckout($id) {
        // return response()->json( ['reservations' => Reservation::where( 'trip_id', $id)->first() ] , 200 );
            $reserve  =  Reservation::findOrFail($id);
            $checkout =  $reserve->trip->check_out;
            return response()->json( compact( 'checkout' ) );
        }
}

