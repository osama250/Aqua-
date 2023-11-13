<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Traits\UploadImage;


class Inspiration extends Model
{
    use Translatable , UploadImage;
    public $table                = 'inspirations';
    public $fillable             = [ 'title' ,'description' ];
    public $translatedAttributes = [ 'title' , 'description' ];

    protected $casts = [
        'id'    => 'integer',
        'photo' => 'string'
    ];

    // public function setPhotoAttribute($file)
    // {
    //     $name = $this->ulpoadImages($file , 'Admins');
    //     $this->attributes['photo'] = $name;
    // }

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
        return $this->hasMany( InspirationPhoto::class ,'inspiration_id' );
    }

}
