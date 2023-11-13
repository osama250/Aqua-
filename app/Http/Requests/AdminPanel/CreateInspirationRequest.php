<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Inspiration;
use Illuminate\Foundation\Http\FormRequest;

class CreateInspirationRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Inspiration::rules();
    }
}
