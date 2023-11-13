<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Astrotomic\Translatable\Translatable;

class InspirationDetail extends Model
{
    use Translatable;
    public $table                = 'inspiration_details';
    public $fillable             = [ 'title' ,'description' ];
    public $translatedAttributes = [ 'title' , 'description' ];

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
        // $rules['photo'] = 'image|required';

        return $rules;
    }

    public function photos() {      //  One To Many
        return $this->hasMany(  InspirationDetailPhoto::class ,'inspiration_detail_id' );
    }


}
