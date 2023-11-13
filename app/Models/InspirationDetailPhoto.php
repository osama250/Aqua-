<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspirationDetailPhoto extends Model
{
    use HasFactory;
    protected $table        = 'inspiration_detail_photos';
    protected $fillable     = [ 'inspiration_detail_id' ,'photo' , 'Witdh' , 'height'];

    public function getPhotoAttribute() {
        return asset('uploads\inspirationsdetail\\'.$this->attributes['photo']);
    }
}
