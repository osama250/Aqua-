<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;
    protected $fillable=['name','value'];

    static function rules(){
        $rules['name'] = 'required|string';
        $rules['value'] = 'required|string';
        $rules['id'] = 'sometimes|exists:social_media,id';

        return $rules;
    }
}