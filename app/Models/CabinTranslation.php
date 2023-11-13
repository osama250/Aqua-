<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CabinTranslation extends Model
{
    use HasFactory;
    protected $table        = 'cabin_translations';
    protected $primaryKey   = 'id';
    protected $fillable     = [ 'title', 'description' ];
    public $timestamps      = false;
}
