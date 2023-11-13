<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attachment;

class AttachmentController extends Controller
{
    public function attachments() {
        return response()->json( [ 'attachments'  => Attachment::all() ] , 200 );
    }
}
