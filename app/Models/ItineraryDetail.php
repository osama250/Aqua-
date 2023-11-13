<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ItineraryDetail extends Model
{
    use Translatable;

    public $table        = 'itinerary_details';
    public $fillable     = [ 'itinerary_id' ];

    public $translatedAttributes =  [ 'text' ];

    protected $casts = [
        'id'             => 'integer',
        'itinerary_id'   => 'integer'
    ];

    public static function rules()
    {
        $langs = LaravelLocalization::getSupportedLanguagesKeys();
        foreach ( $langs as $lang )  {
            $rules[ $lang . '.text' ] = 'required|string|min:3|max:191';
        }
        $rules['itinerary_id'] = 'required';

        return $rules;
    }

    public function itinerary()
    {
        return $this->belongsTo(\App\Models\Itinerary::class);
    }

}
