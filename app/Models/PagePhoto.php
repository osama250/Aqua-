<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagePhoto extends Model
{
    use HasFactory;
    protected $table        = 'page_photos';
    protected $fillable     = [ 'page_id' ,'photo' , 'Witdh' , 'height'];

    public function getPhotoAttribute(){
        return asset('uploads/pages/'.$this->attributes['photo']);
    }
}
