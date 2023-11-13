<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EscapadeDetail;

class EscapadeDetailController extends Controller
{
    public function escapadesDetails() {
        return response()->json([ 'escapadedetails' => EscapadeDetail::with('photos')->get() ] , 200 );

    }
}
