<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConditionTranslation extends Model
{
    use HasFactory;
    protected $table        = 'condition_translations';
    protected $primaryKey   = 'id';
    public $fillable        = [ 'title' , 'description' ];
    public $timestamps      = false;
}
