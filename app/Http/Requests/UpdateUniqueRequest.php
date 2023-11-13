<?php

namespace App\Http\Requests;

use App\Models\Unique;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUniqueRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules              = Unique::rules();
        $rules['photo']     = 'nullable';
        return $rules;
    }
}
