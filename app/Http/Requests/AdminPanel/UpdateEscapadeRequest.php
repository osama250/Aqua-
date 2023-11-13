<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Escapade;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEscapadeRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = Escapade::rules();
        return $rules;
    }
}
