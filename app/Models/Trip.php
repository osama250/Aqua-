<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Trip extends Model
{
    public $table     = 'trips';
    protected $dates  = ['deleted_at'];

    public $fillable = [
        'trip_category_id',
        'check_in',
        'check_out',
        'cabin_count',
        'suite_count',
        'cabin_available',
        'suite_available',
        'cabin_price',
        'suite_price',
        'single_cabin_price',
        'single_suite_price',
        'is_home'
    ];

    protected $casts = [
        'id'        => 'integer',
        'trip_category_id' => 'integer',
        'check_in' => 'date',
        'check_out' => 'date',
        'cabin_count' => 'integer',
        'suite_count' => 'integer',
        'cabin_available' => 'integer',
        'suite_available' => 'integer',
        'cabin_price' => 'double',
        'suite_price' => 'double',
        'single_cabin_price' => 'double',
        'single_suite_price' => 'double',
        'is_home' => 'integer'
    ];

    public static $rules = [
        'trip_category_id' => 'required',
        'check_in' => 'required|before:check_out',
        'check_out' => 'required|after:check_in',
        'cabin_count' => 'required',
        'suite_count' => 'required',
        'cabin_price' => 'required',
        'suite_price' => 'required',
        'single_cabin_price' => 'required',
        'single_suite_price' => 'required',
        'closed_cabins' => 'array',
        'additional_trips' => 'array',
    ];

    public function tripCategory()
    {
        return $this->belongsTo(\App\Models\TripCategory::class);
    }

    public function getCheckinAttribute()
    {
        return Carbon::parse($this->attributes['check_in'])->toDateString();
    }

    public function getCheckoutAttribute()
    {
        return Carbon::parse($this->attributes['check_out'])->toDateString();
    }
}
