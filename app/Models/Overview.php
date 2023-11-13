<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Traits\UploadImage;

class Overview extends Model
{
    use Translatable , UploadImage;
    public $table    = 'overviews';
    public $fillable = [ 'title' ,'subtitle', 'description' ];
    public $translatedAttributes = [ 'title' ,'subtitle', 'description' ];


    protected $casts = [
        'id'        => 'integer',
        'photo'     => 'string'
    ];

    public static array $rules = [
        'photo' => '255'
    ];

    public function setPhotoAttribute($file)
    {
        $name = $this->ulpoadImages($file , 'Admins');
        $this->attributes['photo'] = $name;
    }

    public static function rules()
    {
        $langs = LaravelLocalization::getSupportedLanguagesKeys();
        foreach ($langs as $language) {
            $rules[$language . '.title']        = 'required|string|min:3|max:191';
            $rules[$language . '.subtitle']     = 'required|string|min:3|max:191';
            $rules[$language . '.description']  = 'required|min:3';
        }
        // $rules['photo'] = 'image|required';

        return $rules;
    }



    public function photos() {      //  One To Many
        return $this->hasMany( OverviewPhoto::class ,'overview_id' );
    }

}
