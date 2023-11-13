<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Cabin;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCabinRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = Cabin::rules();
        return $rules;
    }
}
