<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Attachment;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAttachmentRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules      = Attachment::$rules;
        $rules['factsheet']     = 'nullable';
        $rules['itinerary']     = 'nullable';
        $rules['sightseeing']   = 'nullable';
        return $rules;
    }
}
