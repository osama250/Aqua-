<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiningPhoto extends Model
{
    use HasFactory;
    protected $table        = 'dining_photos';
    protected $fillable     = [ 'dining_id' ,'photo' , 'Witdh' , 'height'];

    public function getPhotoAttribute(){
        return asset('uploads/pages/'.$this->attributes['photo']);
    }
}
