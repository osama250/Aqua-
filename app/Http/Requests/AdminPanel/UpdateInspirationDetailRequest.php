<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\InspirationDetail;
use Illuminate\Foundation\Http\FormRequest;

class UpdateInspirationDetailRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = InspirationDetail::rules();

        return $rules;
    }
}
