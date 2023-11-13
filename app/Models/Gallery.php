<?php

namespace App\Models;

use App\Http\Traits\FileUploadTrait;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use FileUploadTrait;
    public $table    = 'galleries';
    public $fillable = [ 'photo' ];

    protected $casts = [
        'id'    => 'integer',
        'photo' => 'string'
    ];

    public static array $rules = [
        // 'photos'   => 'required|array',
        // 'photos.*' => 'required|image|mimes:jpg,jpeg,png',
    ];

    public function getPhotoAttribute() {
        return asset('uploads/gallery/'.$this->attributes['photo']);
    }

    public function setPhotoAttribute($value)
    {
        $name = $this->upload($value, 'uploads/gallery/');
        $this->attributes['photo'] = $name;
    }

}
