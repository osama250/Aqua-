<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Attachment;
use Illuminate\Foundation\Http\FormRequest;

class CreateAttachmentRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Attachment::$rules;
    }
}
