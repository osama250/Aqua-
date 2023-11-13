<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Itinerary;

class ItineraryController extends Controller
{
    public function itineraries() {
        return response()->json( [ 'itineraries' => Itinerary::all() ] , 200 );
    }
}
