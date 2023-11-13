<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Gallery;
use Illuminate\Foundation\Http\FormRequest;

class CreateGalleryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Gallery::$rules;
    }
}
