<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Facilite;
use Illuminate\Http\Request;

class FaciliteController extends Controller
{
    public function facilites(){
        // return response()->json(['facilites'=>Facilite::all()->load('photos')],200);
        return response()->json( [ 'facilites' => Facilite::with('photos')->get() ] ,  200 );
    }
}
