<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspirationPhoto extends Model
{
    use HasFactory;
    protected $table        = 'inspiration_photos';
    protected $fillable     = [ 'inspiration_id' ,'photo' , 'Witdh' , 'height'];

    public function getPhotoAttribute() {
        return asset('uploads/inspirations/'.$this->attributes['photo']);
    }
}
