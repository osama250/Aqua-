<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfoTranslation extends Model
{
    use HasFactory;
    protected $table        = 'contact_info_translations';
    protected $primaryKey   = 'id';
    public $fillable        = ['adress' , 'email'];
    public $timestamps      = false;
}
