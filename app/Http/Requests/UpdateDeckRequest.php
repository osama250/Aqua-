<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Deck;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDeckRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = Deck::$rules;
        $rules['file']  =  'nullable';
        return $rules;
    }
}
