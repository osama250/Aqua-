<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Experience;
use Illuminate\Foundation\Http\FormRequest;

class UpdateExperienceRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = Experience::rules();

        return $rules;
    }
}
