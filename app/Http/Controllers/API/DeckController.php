<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deck;

class DeckController extends Controller
{
    public function decks() {
        return response()->json([ 'decks' => Deck::all() ] , 200 );
    }
}
