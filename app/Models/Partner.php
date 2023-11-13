<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\FileUploadTrait;
use App\Traits\UploadImage;

class Partner extends Model
{
    use UploadImage;

    public $table       = 'partners';
    protected $dates    = [ 'deleted_at' ];
    public $fillable    = [ 'photo', 'url' ];

    protected $casts = [
        'id'        => 'integer',
        'photo'     => 'string',
        'url'       => 'string'
    ];

    public static array $rules = [
        "photo"     => "required|image",
        'url'       => "required",
    ];

    public function setPhotoAttribute($photo)
    {
        $name = $this->ulpoadImages($photo , 'Admins');
        $this->attributes['photo'] = $name;
    }

}
