<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Overview;

class OverviewController extends Controller
{
    public function overview() {
        return response()->json([ 'Overviews' => Overview::with('photos')->get() ] , 200 );

    }
}
