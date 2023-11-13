<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Cabinfeature;
use Illuminate\Foundation\Http\FormRequest;

class CreateCabinfeatureRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Cabinfeature::rules();
    }
}
