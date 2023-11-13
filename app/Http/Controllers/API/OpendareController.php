<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OpenDate;

class OpendareController extends Controller
{
    public function openDates() {
        return response()->json([ 'decks' => OpenDate::all() ] , 200 );
    }
}
