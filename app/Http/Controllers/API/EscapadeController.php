<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Escapade;

class EscapadeController extends Controller
{
    public function escapades() {
        return response()->json([ 'escapades' => Escapade::with('photos')->get() ] , 200 );
        // return 'Done';
    }
}
