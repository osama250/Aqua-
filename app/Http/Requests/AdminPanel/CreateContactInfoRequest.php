<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\ContactInfo;
use Illuminate\Foundation\Http\FormRequest;

class CreateContactInfoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return ContactInfo::rules();
    }
}
