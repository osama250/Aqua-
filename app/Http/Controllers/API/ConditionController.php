<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Condition;

class ConditionController extends Controller
{
    public function conditions() {
        return response()->json( [ 'conditions' => Condition::get() ] , 200 );
    }

}
