<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Cabin;
use Illuminate\Foundation\Http\FormRequest;

class CreateCabinRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return Cabin::rules();
    }
}
