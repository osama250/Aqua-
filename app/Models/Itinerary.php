<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    public $table    = 'itineraries';
    public $fillable = [ 'trip_category_id', 'day' ];

    protected $casts = [
        'id'                => 'integer',
        'trip_category_id'  => 'integer',
        'day'               => 'integer'
    ];

    public static $rules = [
        'trip_category_id'  => 'required',
        'day'               => 'required'
    ];

    public function tripCategory()
    {
        return $this->belongsTo(\App\Models\TripCategory::class);
    }

    public function itineraryDetails()
    {
        return $this->hasMany(\App\Models\ItineraryDetail::class);
    }

}
