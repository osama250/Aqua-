<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservedAdditionalTrip extends Model
{
    use HasFactory;
    public $table = 'reserved_additional_trips';

    public $fillable = [
        'reservation_id',
        'additional_trip_id',
        'price',
        'adults_count',
        'child1_count',
        'child2_count',
        'total_price',
        'status',
    ];

    public function reservation()
    {
        return $this->belongsTo(\App\Models\Reservation::class);
    }

    public function additionalTrip()
    {
        return $this->belongsTo(\App\Models\AdditionalTrip::class);
    }
}
