<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CabinPhoto extends Model
{
    use HasFactory;
    protected $table        = 'cabin_photos';
    protected $fillable     = [ 'cabin_id' ,'photo' , 'Witdh' , 'height'];

    public function getPhotoAttribute() {
        return asset('uploads/cabins/'.$this->attributes['photo']);
    }
}
