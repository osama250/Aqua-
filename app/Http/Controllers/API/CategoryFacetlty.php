<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryFacetlty extends Controller
{
    public function categories() {
        return response()->json( ['Categories' => Category::with('facilites')->get() ] , 200 );
    }
}
