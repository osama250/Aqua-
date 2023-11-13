<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Question extends Model
{
    use Translatable;
    public $table                   = 'questions';
    public $fillable                = [ 'question' , 'answer' ];
    public $translatedAttributes    = [ 'question' , 'answer' ];
    protected $casts = [
        'id' => 'integer'
    ];


    public static function rules () {
        $langs = LaravelLocalization::getSupportedLanguagesKeys();
        foreach ($langs as $lang) {
            $rules[$lang . '.question']         = 'required|string|min:5|max:255';
            $rules[$lang . '.answer']           = 'required|string|min:5|max:255';
        }
        return $rules;
    }
}
