<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspirationDetailTranslation extends Model
{
    use HasFactory;
    public $table         = 'inspirat_detail_translations';
    protected $primaryKey = 'id';
    protected $fillable   = ['title','description'];
    public $timestamps    = false;
}
