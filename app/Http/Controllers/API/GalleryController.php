<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function galleries(){
        return response()->json( [ 'galleries'  => Gallery::all() ] , 200 );
    }
}
