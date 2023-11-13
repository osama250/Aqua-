<?php

namespace App\Http\Requests;

use App\Models\meta;
use Illuminate\Foundation\Http\FormRequest;

class CreatemetaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return meta::$rules;
    }
}
