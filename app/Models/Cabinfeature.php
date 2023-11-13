<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Traits\UploadImage;


class Cabinfeature extends Model
{
    use Translatable , UploadImage;
    public $table                   = 'cabinfeatures';
    public $fillable                = [ 'cabin_id' ,'photo' , 'title' , 'description'];
    public $translatedAttributes    = [ 'title' , 'description' ];

    protected $casts = [
        'id'    => 'integer',
        'photo' => 'string'
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

    public function setPhotoAttribute($file)
    {
        $name = $this->ulpoadImages($file , 'Admins');
        $this->attributes['photo'] = $name;
    }

    public function getPhotoAttribute() {
        return asset('images/'.$this->attributes['photo']);
    }

    public function cabin() {
        return $this->belongsTo( Cabin::class );
    }
}
