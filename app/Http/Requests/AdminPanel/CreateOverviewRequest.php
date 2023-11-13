<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Overview;
use Illuminate\Foundation\Http\FormRequest;

class CreateOverviewRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Overview::rules();
    }
}
