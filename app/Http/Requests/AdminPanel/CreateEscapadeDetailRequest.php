<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\EscapadeDetail;
use Illuminate\Foundation\Http\FormRequest;

class CreateEscapadeDetailRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return EscapadeDetail::rules();
    }
}
