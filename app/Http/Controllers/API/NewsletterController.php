<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
    public function newsletter() {
        return response()->json( [ 'newsletter' => Newsletter::all() ] , 200 );
    }
}
