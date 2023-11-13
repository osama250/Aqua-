<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaciliteTranslation extends Model
{
    use HasFactory;
    protected $fillable = [ 'title','icon' ];
}
