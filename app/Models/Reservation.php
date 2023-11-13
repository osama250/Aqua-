<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public $table    = 'reservations';
    protected $dates = [ 'deleted_at' ];

    public $fillable = [
        'trip_id',
        'user_id',
        'price',
        'comment',
        'uuid',
    ];

    protected $casts = [
        'id'        => 'integer',
        'trip_id'   => 'integer',
        'user_id'   => 'integer',
        'price'     => 'integer',
        'comment'   => 'string',
        'uuid'      => 'string',
    ];

    public function trip()
    {
        return $this->belongsTo(\App\Models\Trip::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function accommodations()
    {
        return $this->hasMany(\App\Models\Accommodation::class);
    }

    public function reservedAdditionalTrips()
    {
        return $this->hasMany(\App\Models\ReservedAdditionalTrip::class);
    }

    public static array $rules = [

    ];


}
