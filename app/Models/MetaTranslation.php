<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaTranslation extends Model
{
    use HasFactory;
    protected $table            = 'meta_translations';
    protected $primaryKey       = 'trans_id';
    protected $fillable         = ['title', 'description', 'keywords'];
    public $timestamps          = false;
}
