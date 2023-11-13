<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactInfo;

class ContactInfoController extends Controller
{
    public function contactinfo() {
        return response()->json( [ 'contact-info' => ContactInfo::get() ] , 200 );
    }
}
