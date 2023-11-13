<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OverviewPhoto extends Model
{
    use HasFactory;
    protected $table        = 'overview_photos';
    protected $fillable     = [ 'overview_id' ,'photo' , 'Witdh' , 'height'];

    public function getPhotoAttribute(){
        return asset('uploads/pages/'.$this->attributes['photo']);
    }
}
