<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\SideSeeing;
use Illuminate\Http\Request;

class SideSeeingController extends Controller
{
    public function sideSeeings(){
        return response()->json(['sideseeing'=>SideSeeing::all()->load('photos')],200);
    }
}
