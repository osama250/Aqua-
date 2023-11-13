<?php

namespace App\Http\Requests;

use App\Models\Trip;
use Illuminate\Foundation\Http\FormRequest;

class CreateTripRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return Trip::$rules;
    }
}
