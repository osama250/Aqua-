<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Traits\UploadImage;

class ContactInfo extends Model
{
    use Translatable , UploadImage;
    public $table                   = 'contact_Infos';
    public $fillable                = ['qr1',  'qr2', 'phone' , 'adress' , 'email', 'gmt' ,'cet'];
    public $translatedAttributes    = [ 'adress' , 'email' ];

    protected $casts = [
        'ud' => 'integer',
        'qu1' => 'string',
        'qr2' => 'string',
        'phone' => 'integer'
    ];

    public static function rules()
    {
        $langs = LaravelLocalization::getSupportedLanguagesKeys();
        foreach ($langs as $language) {
            $rules[$language . '.adress']        = 'required|string|min:3|max:255';
            $rules[$language . '.email']         = 'required';
        }
        return $rules;
    }

    public function setQr1Attribute($file)
    {
        $name = $this->ulpoadImages($file , 'Admins');
        $this->attributes['qr1'] = $name;
    }
    public function getQr1Attribute() {
        return asset('images/'.$this->attributes['qr1']);
    }


    public function setQr2Attribute($file)
    {
        $name = $this->ulpoadImages($file , 'Admins');
        $this->attributes['qr2'] = $name;
    }
    public function getQr2Attribute() {
        return asset('images/'.$this->attributes['qr2']);
    }

}
