<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Traits\UploadImage;

class Experience extends Model
{
    use Translatable , UploadImage;
    public $table = 'experiences';
    public $fillable                = [ 'title' ,'description' ];
    public $translatedAttributes    = [ 'title' , 'description' ];

    protected $casts = [
        'id' => 'integer'
    ];

    public static function rules()
    {
        $langs = LaravelLocalization::getSupportedLanguagesKeys();
        foreach ($langs as $language) {
            $rules[$language . '.title']        = 'required|string|min:3|max:191';
            // $rules[$language . '.subtitle']     = 'required|string|min:3|max:191';
            $rules[$language . '.description']  = 'required|min:3';
        }
        // $rules['photo'] = 'image|required';

        return $rules;
    }

    public function photos() {      //  One To Many
        return $this->hasMany( ExperiencePhoto::class ,'experience_id' );
    }


}
