<?php

namespace App\Http\Controllers\API;


use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactEmail;


class ContactUsAPIController extends AppBaseController
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            ContactUs::$rules,
        );

        if( $validator->fails() ) {
            return response()->json(['errors'=>$validator->errors()],403);
        }

        $input     = $request->all();
        $contactUs = ContactUs::create($input);

        Mail::to('osama.m.yousry.98@gmail.com')->send( new ContactEmail($contactUs) );

        return response()->json(['message' => __('lang.created')],200);
    }

}
