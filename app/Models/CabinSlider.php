<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UploadImage;

class CabinSlider extends Model
{
    use  UploadImage;
    public $table       = 'cabin_sliders';
    public $fillable    = [ 'cabin_id' ,'photo' ];

    protected $casts = [
        'id'        => 'integer',
        'photo'     => 'string'
    ];

    public function setPhotoAttribute($file)
    {
        $name = $this->ulpoadImages($file , 'Admins');
        $this->attributes['photo'] = $name;
    }


    public function getPhotoAttribute() {
        return asset('images/'.$this->attributes['photo']);
    }

    public static array $rules = [
        'photo'   => 'required|file|mimes:jpg,png,mp4,jpeg,avi'
    ];

    public function cabin() {
        return $this->belongsTo( Cabin::class );
    }

}
