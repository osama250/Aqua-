<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EscapadeDetailPhoto extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table        = 'escapade_detai_photos';
    protected $fillable     = [ 'escapade_detail_id' ,'photo' , 'Witdh' , 'height'];

    public function getPhotoAttribute() {
        return asset('uploads/escapadesdetail/'.$this->attributes['photo']);
    }
}
