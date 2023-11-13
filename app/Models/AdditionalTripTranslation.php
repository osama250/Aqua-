<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalTripTranslation extends Model
{
    use HasFactory;
    protected $table        = 'additional_trip_translations';
    protected $primaryKey   = 'trans_id';
    protected $fillable     = [ 'name','location', 'details'  ];

    public $timestamps = false;
}
