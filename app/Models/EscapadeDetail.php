<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class EscapadeDetail extends Model
{
    use Translatable;
    public $table                   = 'escapade_details';
    public $fillable                = [ 'title' ,'description' ];
    public $translatedAttributes    = [ 'title' ,'description' ];

    protected $casts = [
        'id' => 'integer'
    ];

    public static function rules()
    {
        $langs = LaravelLocalization::getSupportedLanguagesKeys();
        foreach ( $langs as $language ) {
            $rules[$language . '.title']        = 'required|string|min:3|max:191';
            $rules[$language . '.description']  = 'required|min:3';
        }
        return $rules;
    }

    public function photos() {      //  One To Many
        return $this->hasMany(  EscapadeDetailPhoto::class , 'escapade_detail_id' );
    }

}
