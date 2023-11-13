<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EscapadePhoto extends Model
{
    use HasFactory;
    protected $table        = 'escapade_photos';
    protected $fillable     = [ 'escapade_id' ,'photo' , 'Witdh' , 'height'];

    public function getPhotoAttribute(){
        return asset('uploads/escapades/'.$this->attributes['photo']);
    }
}
