<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\CabinSlider;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCabinSliderRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = CabinSlider::$rules;
        $rules['photo'] = 'nullable';
        return $rules;
    }
}
