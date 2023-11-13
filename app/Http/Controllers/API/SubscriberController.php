<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    public function subscribe(Request $request){
        $validator = Validator::make( $request->all() , [
            'email' => 'required|email|unique:subscribers,email'
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()],403);
        }

        Subscriber::create($request->all());

        return response()->json(['message'=>__('lang.subscribed')],200);
    }
}
