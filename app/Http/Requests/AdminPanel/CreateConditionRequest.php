<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Condition;
use Illuminate\Foundation\Http\FormRequest;

class CreateConditionRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Condition::rules();
    }
}
