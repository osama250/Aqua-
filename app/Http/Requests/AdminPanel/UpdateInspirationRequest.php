<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Inspiration;
use Illuminate\Foundation\Http\FormRequest;

class UpdateInspirationRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules              = Inspiration::rules();
        $rules['photo']     = 'nullable';
        return $rules;
    }
}
