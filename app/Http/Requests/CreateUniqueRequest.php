<?php

namespace App\Http\Requests;

use App\Models\Unique;
use Illuminate\Foundation\Http\FormRequest;

class CreateUniqueRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Unique::rules();
    }
}
