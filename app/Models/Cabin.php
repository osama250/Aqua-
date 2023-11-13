<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Traits\UploadImage;
use App\Models\Facilite;


class Cabin extends Model
{
    use Translatable , UploadImage;
    public $table                   = 'cabins';
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
            $rules[$language . '.description']  = 'required|min:3';
        }
        // $rules['photo'] = 'image|required';

        return $rules;
    }

    public function photos() {      //  One To Many
        return $this->hasMany( CabinPhoto::class ,'cabin_id' );
    }

    public function sliders() {      //  One To Many
        return $this->hasMany( CabinSlider::class ,'cabin_id' );
    }

    public function cabinfeatures() {
        return $this->hasMany( Cabinfeature::class , 'cabin_id' );
    }

    public function categories() {
        return $this->belongsToMany( Category::class , 'cabin_category_pivot' );
    }

    public function facilites() {
        return $this->belongsToMany(Facilite::class , 'cabin_facilite_pivot');
    }

}
