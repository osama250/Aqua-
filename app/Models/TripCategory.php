<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\UploadImage;
use Astrotomic\Translatable\Translatable;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class TripCategory extends Model
{
    use  UploadImage , Translatable;

    public $table    = 'trip_categories';
    public $fillable = [ 'photo', 'map' ,    'name',
    'duration',
    'rate_plan',
    'desc' ];

    public $translatedAttributes =  [
        'name',
        'duration',
        'rate_plan',
        'desc',
    ];

    protected $casts = [
        'id'    => 'integer',
        'photo' => 'string',
        'map'   => 'string'
    ];

    public static function rules()
    {
        $languages = LaravelLocalization::getSupportedLanguagesKeys();
        foreach ($languages as $language) {
            $rules[$language . '.name'] = 'required|string|min:3|max:191';
            $rules[$language . '.duration'] = 'required|string|min:3|max:191';
            $rules[$language . '.rate_plan'] = 'required|string|min:3';
            $rules[$language . '.desc'] = 'required|string|min:3';
        }
        // $rules['photo'] = 'required|image';
        // $rules['map']   = 'required|image';

        return $rules;
    }

    public function setPhotoAttribute($file)
    {
        $name = $this->ulpoadImages($file , 'Admins');
        $this->attributes['photo'] = $name;
    }

    public function setMapAttribute($file)
    {
        $map  = $this->ulpoadImages($file , 'Admins');
        $this->attributes['map']  = $map;
    }

    public function itineraries()
    {
        return $this->hasMany(\App\Models\Itinerary::class);
    }

}
