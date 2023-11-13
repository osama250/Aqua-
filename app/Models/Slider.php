<?php

namespace App\Models;

use App\Http\Traits\FileUploadTrait;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UploadImage;


class Slider extends Model
{
    use UploadImage , Translatable;
    public $table                 = 'sliders';
    public $translatedAttributes  =  ['title','sub_title'];
    public $fillable              = ['media','type'  ];

    protected $casts = [
        'id' => 'integer'
    ];

    public static array $rules = [
        'media'   => 'required|file|mimes:jpg,png,mp4,jpeg,avi'
    ];

    public function setMediaAttribute($file)
    {
        $name = $this->ulpoadImages($file , 'Admins');
        $this->attributes['media'] = $name;
    }

    public function getMediaAttribute() {
        return asset('images/'.$this->attributes['media']);
    }

    // public function setMediaAttribute($value) {
    //     $name = $this->upload($value,'uploads/slider/');
    //     $this->attributes['media'] = $name;
    // }



}
