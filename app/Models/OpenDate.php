<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class OpenDate extends Model
{
    public $table       = 'open_dates';
    public $fillable    = [ 'date' ];


    public $timestamps = false;
    protected $casts   = [
        'id'    => 'integer',
        'date'  => 'date'
    ];

    public static $rules = [
        'date' => 'required|date'
    ];

    public function getDateAttribute()
    {
        return Carbon::parse($this->attributes['date'])->toDateString();
    }

}
