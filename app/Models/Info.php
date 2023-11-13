<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    public $table     = 'infos';
    public $fillable  = [ 'key', 'value', ];

    protected $casts = [
        'id'    => 'integer',
        'key'   => 'string',
        'value' => 'string'
    ];

    public static array $rules = [
        "key"         => "required|string|min:5",
        'value'       => "required|string|min:5",
    ];


}
