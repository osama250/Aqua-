<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OverviewTranslation extends Model
{
    use HasFactory;
    public $table         = 'overview_translations';
    protected $primaryKey = 'id';
    protected $fillable   = ['title','subtitle','description'];
    public $timestamps    = false;
}
