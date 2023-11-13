<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Escapade;
use Illuminate\Foundation\Http\FormRequest;

class CreateEscapadeRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Escapade::rules();
    }
}
