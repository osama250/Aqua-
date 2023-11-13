<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trip;

class TripController extends Controller
{
    public function trips() {
        return response()->json( ['trips' => Trip::all() ] , 200 );
    }
}
