<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function pages($id) {
        // return response()->json([ 'pages' => Page::with('photos')->get() ] , 200 );
                // return response()->json( ['Pages' => Page::first()->translate('es') ] , 200 );
        // return response()->json( ['reservations' => Page::where( 'id', $id)->first() ] , 200 );
        return response()->json([ 'pages' => Page::with('photos')->where( 'id' , $id )->get() ] , 200 );

    }
}
