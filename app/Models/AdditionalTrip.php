<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Traits\UploadImage;

class AdditionalTrip extends Model
{
    use SoftDeletes , Translatable , UploadImage;

    public $table    = 'additional_trips';
    protected $dates = ['deleted_at'];

    public $fillable = [ 'price' ,  'img' ];

    public $translatedAttributes =  [
        'name',
        'location',
        'details'
    ];

    protected $casts = [
        'id'    => 'integer',
        'price' => 'integer',
        'img'   => 'string'
    ];

    public static function rules()
    {
        $languages = array_keys(config('langs'));
        foreach ($languages as $language) {
            $rules[$language . '.name']     = 'required|string|min:3|max:191';
            $rules[$language . '.location'] = 'required|string|min:3|max:191';
            $rules[$language . '.details']  = 'required';
        }
        $rules['price'] = 'required|numeric';
        $rules['img']   = 'required|image';

        return $rules;
    }

    public function setImgAttribute($file)
    {
        $name = $this->ulpoadImages($file , 'Admins');
        $this->attributes['img'] = $name;
    }

    public function tripsAdditionals()
    {
        return $this->belongsToMany('App\Models\Trip', 'trips_additionals', 'additional_trip_id', 'trip_id');
    }
}
