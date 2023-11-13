<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperiencePhoto extends Model
{
    use HasFactory;
    protected $table        = 'experience_photos';
    protected $fillable     = [ 'experience_id' ,'photo' , 'Witdh' , 'height'];

    public function getPhotoAttribute() {
        return asset('uploads/experiences/'.$this->attributes['photo']);
    }
}
