<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Traits\UploadImage;

class Unique extends Model
{
    use SoftDeletes , UploadImage  , Translatable;

    public $table       = 'uniques';
    public $fillable    = [ 'photo'  ];

    protected $casts = [
        'id'            => 'integer',
        'photo'         => 'string'
    ];

    public $translatedAttributes =  [ 'title',  'text' ];

    public static function rules()
    {
        $langs = LaravelLocalization::getSupportedLanguagesKeys();
        foreach ($langs as $language) {
            $rules[$language . '.title'] = 'required|string|min:3|max:191';
            $rules[$language . '.text']  = 'required|min:3';
        }
        $rules['photo'] = 'image|required';

        return $rules;
    }

    public function setPhotoAttribute($photo)
    {
        $name = $this->ulpoadImages($photo , 'Admins');
        $this->attributes['photo'] = $name;
    }


}
