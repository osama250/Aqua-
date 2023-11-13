<?php

namespace App\Models;

use App\Http\Traits\FileUploadTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SideSeeingPhoto extends Model
{
    use HasFactory, FileUploadTrait;
    protected $fillable = ['side_seeing_id', 'photo'];

    public function getPhotoAttribute()
    {
        return asset('uploads/sideseeing/' . $this->attributes['photo']);
    }
}
