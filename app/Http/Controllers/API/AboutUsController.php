<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function aboutus(){
        return response()->json( [ 'aboutus' => AboutUs::first() ] , 200 );
    }
}
