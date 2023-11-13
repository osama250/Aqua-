<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Experience;
use Illuminate\Foundation\Http\FormRequest;

class CreateExperienceRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Experience::rules();
    }
}
