<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Cabinfeature;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCabinfeatureRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = Cabinfeature::rules();

        return $rules;
    }
}
