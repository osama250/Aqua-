<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InspirationDetail;

class InspirationDetailController extends Controller
{
    public function InspirationsDetails() {
        return response()->json([ 'inspirationsDetails' => InspirationDetail::with('photos')->get() ] , 200 );

    }
}
