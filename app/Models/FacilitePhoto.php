<?php

namespace App\Models;

use App\Http\Traits\FileUploadTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilitePhoto extends Model
{
    use HasFactory , FileUploadTrait;
    protected $fillable = [ 'facilite_id' ,'photo' ];

    public function getPhotoAttribute(){
        return asset('uploads/facilites/'.$this->attributes['photo']);
    }
}
