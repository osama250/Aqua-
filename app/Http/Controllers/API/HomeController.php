<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Overview;
use App\Models\Experience;
use App\Models\Question;

class HomeController extends Controller
{
    public function homePage() {
        $overviews       = Overview::all();
        $experience      = Experience::all();
        $sliders         = Slider::all();
        return response()->json( [
            'overviews'      => $overviews,
            'experience'     => $experience,
            'sliders'        =>$sliders
        ]);
    }

    public function question() {
        return response()->json( [ 'Overviews' => Question::get() ] , 200 );
    }
}
