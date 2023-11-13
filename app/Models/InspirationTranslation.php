<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspirationTranslation extends Model
{
    use HasFactory;
    public $table         = 'inspiration_translations';
    protected $primaryKey = 'id';
    protected $fillable   = ['title','description'];
    public $timestamps    = false;
}
