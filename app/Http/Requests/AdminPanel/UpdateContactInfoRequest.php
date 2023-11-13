<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\ContactInfo;
use Illuminate\Foundation\Http\FormRequest;

class UpdateContactInfoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = ContactInfo::rules();
        return $rules;
    }
}
