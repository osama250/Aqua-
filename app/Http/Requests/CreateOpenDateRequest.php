<?php

namespace App\Http\Requests;

use App\Models\OpenDate;
use Illuminate\Foundation\Http\FormRequest;

class CreateOpenDateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return OpenDate::$rules;
    }
}
