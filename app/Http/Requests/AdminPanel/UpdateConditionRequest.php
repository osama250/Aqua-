<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Condition;
use Illuminate\Foundation\Http\FormRequest;

class UpdateConditionRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = Condition::rules();
        return $rules;
    }
}
