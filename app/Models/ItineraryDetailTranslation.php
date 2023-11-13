<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItineraryDetailTranslation extends Model
{
    use HasFactory;
    protected $table        = 'itinerary_detail_translations';
    protected $primaryKey   = 'trans_id';
    protected $fillable     = [ 'text' ];
    public $timestamps      = false;

}
