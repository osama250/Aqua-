<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Deck;
use Illuminate\Foundation\Http\FormRequest;

class CreateDeckRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Deck::$rules;
    }
}
