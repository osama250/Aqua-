<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeckTranslation extends Model
{
    use HasFactory;
    protected $table        = 'deck_translations';
    protected $primaryKey   = 'trans_id';
    protected $fillable     = [ 'title', 'content' ];
    public $timestamps      = false;
}
