<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Facilite;

class facilityController extends Controller
{
    public function facilities() {
        return response()->json( ['facilities' => Facilite::with('category')->get() ] , 200 );
        // return 'Done';
    }
}
