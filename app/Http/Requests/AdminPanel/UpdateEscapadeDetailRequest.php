<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\EscapadeDetail;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEscapadeDetailRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = EscapadeDetail::rules();
        return $rules;
    }
}
