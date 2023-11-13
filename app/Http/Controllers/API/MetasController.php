<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meta;

class MetasController extends Controller
{
    public function metas() {
        return response()->json([ 'decks' => Meta::all() ] , 200 );
    }
}
