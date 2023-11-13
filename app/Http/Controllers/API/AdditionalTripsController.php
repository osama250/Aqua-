<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdditionalTrip;

class AdditionalTripsController extends Controller
{
    public function additionalTrips() {
        return response()->json( ['AdditionalTrips' => AdditionalTrip::all() ] , 200 );
    }
}
