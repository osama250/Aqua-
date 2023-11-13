<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Overview;
use Illuminate\Foundation\Http\FormRequest;

class UpdateOverviewRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules              = Overview::$rules;
        $rules['photo']     = 'nullable';
        return $rules;
    }
}
