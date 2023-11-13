<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Socket;

class SocialController extends Controller
{
    public function socials(){
        return response()->json(['socials'=>SocialMedia::all()],200);
    }
}