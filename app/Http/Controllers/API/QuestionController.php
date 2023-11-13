<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    public function question() {
        return response()->json( [ 'Overviews' => Question::get() ] , 200 );
    }

}
