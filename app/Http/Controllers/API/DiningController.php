<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dining;

class DiningController extends Controller
{
    public function dining() {
        return response()->json([ 'dining' => Dining::with('photos')->get() ] , 200 );
    }
}
