<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniqueTranslation extends Model
{
    use HasFactory;
    protected $table        = 'unique_translations';
    protected $primaryKey   = 'trans_id';
    protected $fillable     = [ 'title', 'text' ];
    public $timestamps      = false;
}
