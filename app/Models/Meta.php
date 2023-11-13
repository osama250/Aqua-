<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Meta extends Model
{
    use Translatable;

    public $table    = 'metas';
    public $fillable = ['name' ];
    public $translatedAttributes =  ['title', 'description', 'keywords'];

    protected $casts = [
        'id'       => 'integer',
        'name'     => 'string'
    ];

    public static array $rules = [
        'name'  => "required|string|min:5",
    ];

}
