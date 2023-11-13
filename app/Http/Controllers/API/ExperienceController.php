<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Experience;

class ExperienceController extends Controller
{
    public function experience() {
        return response()->json([ 'experience' => Experience::with('photos')->get() ] , 200 );
    }
}
