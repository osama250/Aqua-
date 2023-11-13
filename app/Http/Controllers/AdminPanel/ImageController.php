<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Traits\FileUploadTrait;
use Illuminate\Http\FileHelpers;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    use FileUploadTrait;
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,$folder)
    {
        $name = $this->upload($request->photo,'\uploads\\'.$folder.'\\');
        return response(['name'=>$name],200);
    }
}
