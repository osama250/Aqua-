<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    use HasFactory;
    public $table       = 'accommodations';
    protected $dates    = ['deleted_at'];
    public $fillable = [
        'reservation_id',
        'type',
        'accommodation_num',
        'guest_name',
        'adults_count',
        'children_count',
        'child1_age',
        'child2_age',
        'cabin_price',
        'suite_price',
        'single_cabin_price',
        'single_suite_price',
        'total_price',
        'discount' ,
        'status',
    ];

    public function reservation()
    {
        return $this->belongsTo(\App\Models\Reservation::class);
    }
}
