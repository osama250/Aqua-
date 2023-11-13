<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EscapadeDetailTranslation extends Model
{
    use HasFactory;
    public $table         = 'escapade_detail_translations';
    protected $primaryKey = 'id';
    protected $fillable   = ['title','description'];
    public $timestamps    = false;
}
