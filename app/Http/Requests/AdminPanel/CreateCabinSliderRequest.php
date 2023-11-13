<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\CabinSlider;
use Illuminate\Foundation\Http\FormRequest;

class CreateCabinSliderRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return CabinSlider::$rules;
    }
}
