<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CabinfeatureTranslation extends Model
{
    use HasFactory;
    protected $table        = 'cabin_feature_translations';
    protected $primaryKey   = 'id';
    protected $fillable     = [ 'title', 'description' ];
    public $timestamps      = false;
}
