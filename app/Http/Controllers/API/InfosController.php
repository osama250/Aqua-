<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Info;

class InfosController extends Controller
{
    public function infos() {
        return response()->json( [ 'Infos' => Info::all() ] , 200 );
    }
}
