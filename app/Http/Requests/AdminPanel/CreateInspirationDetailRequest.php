<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\InspirationDetail;
use Illuminate\Foundation\Http\FormRequest;

class CreateInspirationDetailRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return InspirationDetail::rules();
    }
}
