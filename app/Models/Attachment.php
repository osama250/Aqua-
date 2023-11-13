<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UploadImage;

class Attachment extends Model
{
    use UploadImage;
    public $table    = 'attachments';
    public $fillable = [ 'factsheet','itinerary', 'sightseeing'];

    protected $casts = [
        'id'            => 'integer',
        'factsheet'     => 'string',
        'itinerary'     => 'string',
        'sightseeing'   => 'string'
    ];

    public function setFactsheetAttribute($file)
    {
        $name = $this->ulpoadImages($file , 'Admins');
        $this->attributes['factsheet'] = $name;
    }

    public function getFactsheetAttribute() {
        return asset('images/'.$this->attributes['factsheet']);
    }

    public function setItineraryAttribute($file)
    {
        $name = $this->ulpoadImages($file , 'Admins');
        $this->attributes['itinerary'] = $name;
    }

    public function getItineraryAttribute() {
        return asset('images/'.$this->attributes['itinerary']);
    }

    public function setSightseeingAttribute($file)
    {
        $name = $this->ulpoadImages($file , 'Admins');
        $this->attributes['sightseeing'] = $name;
    }

    public function getSightseeingAttribute() {
        return asset('images/'.$this->attributes['sightseeing']);
    }

    public static array $rules = [
        'factsheet'     => 'required|file|mimes:jpg,png,mp4,jpeg,avi,pdf' ,
        'itinerary'     => 'required|file|mimes:jpg,png,mp4,jpeg,avi,pdf' ,
        'sightseeing'   => 'required|file|mimes:jpg,png,mp4,jpeg,avi,pdf' ,
    ];
}
