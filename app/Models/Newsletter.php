<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    public $table    = 'newsletters';
    public $fillable = [ 'title', 'description' ];

    protected $casts = [
        'id'    => 'integer',
        'title' => 'string'
    ];

    public static array $rules = [
        'title'         => 'required|string|min:5',
        'description'   => 'required|string|min:5'
    ];


}
