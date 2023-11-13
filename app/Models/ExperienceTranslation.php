<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienceTranslation extends Model
{
    use HasFactory;
    protected $table        = 'experience_translations';
    protected $primaryKey   = 'id';
    protected $fillable     = [ 'title', 'description' ];
    public $timestamps      = false;
}
