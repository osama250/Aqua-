<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EscapadeTranslation extends Model
{
    use HasFactory;
    protected $table        = 'escapade_translations';
    protected $primaryKey   = 'id';
    protected $fillable     = [ 'title' ];
    public $timestamps      = false;
}
