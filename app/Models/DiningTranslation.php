<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiningTranslation extends Model
{
    use HasFactory;
    protected $table        = 'dining_translations';
    protected $primaryKey   = 'id';
    protected $fillable     = [ 'title', 'description' ];
    public $timestamps      = false;
}
