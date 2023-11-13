<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Escapade extends Model
{
    use Translatable;
    public $table       = 'escapades';
    public $fillable    = [  'title' ];
    public $translatedAttributes    = ['title'];

    protected $casts = [
        'id' => 'integer'
    ];

    public static function rules()
    {
        $langs = LaravelLocalization::getSupportedLanguagesKeys();
        foreach ($langs as $language) {
            $rules[$language . '.title']  = 'required|string|min:3|max:191';
        }
        return $rules;
    }

    public function photos() {      //  One To Many
        return $this->hasMany( EscapadePhoto::class ,'escapade_id' );
    }

}
