<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Http\Traits\FileUploadTrait;
use App\Traits\UploadImage;

class Deck extends Model
{
    use Translatable , UploadImage;

    public $table                 = 'decks';
    public $translatedAttributes  = [ 'title', 'content' ];
    public $fillable              = [ 'file' ];
    protected $casts              = ['id' => 'integer', 'file' => 'string' ];

    public function setFileAttribute($file)
    {
        $name = $this->ulpoadImages($file , 'Admins');
        $this->attributes['file'] = $name;
    }


    public function getFileAttribute() {
        return asset('images/'.$this->attributes['file']);
    }

    public static array $rules = [
        'file'   => 'required|file|mimes:jpg,png,mp4,jpeg,avi'
    ];


}
