<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inspiration;

class InspirationController extends Controller
{
    public function Inspirations() {
        return response()->json([ 'Inspirations' => Inspiration::with('photos')->get() ] , 200 );
    }
}
