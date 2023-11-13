<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\CreateReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ReservationRepository;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Trip;
use App\Models\User;
use Flash;

class ReservationController extends AppBaseController
{
    /** @var ReservationRepository $reservationRepository*/
    private $reservationRepository;

    public function __construct(ReservationRepository $reservationRepo)
    {
        $this->middleware('permission:View  View Reservation|Add Reservation|Edit Reservation|Delete Reservation', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Reservation', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Reservation', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Reservation', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $trip = Trip::get()->pluck('name', 'id');
        $user = user::get()->pluck('name', 'id');
        $Reservations = Reservation::all();
        return view('AdminPanel.reservations.index' , get_defined_vars() );
    }

    public function create()
    {
        $trips = Trip::get();
        // $users = user::get()->pluck('name', 'id');
        return view('AdminPanel.reservations.create' , get_defined_vars() );
    }

    public function store(CreateReservationRequest $request)
    {

    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $reserve = Reservation::findOrFail($id);
        return $id;
    }


    public function update($id, UpdateReservationRequest $request)
    {

    }

    public function destroy($id)
    {
        $reserve = Reservation::findOrFail($id)->delete();
        return redirect(route('reservations.index'))->with('warning',__('lang.deleted'));
    }
}
