<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Models\Facilite;

class Category extends Model
{
    use Translatable;
    public $table                   = 'categories';
    public $fillable                = ['title' , 'description'];
    public $translatedAttributes    = [ 'title' , 'description' ];
    protected $casts = [ 'id' => 'integer' ];

    public static function rules()
    {
        $langs = LaravelLocalization::getSupportedLanguagesKeys();
        foreach ($langs as $language) {
            $rules[$language . '.title']        = 'required|string|min:3|max:191';
            $rules[$language . '.description']  = 'required|min:3';
        }
        return $rules;
    }

    public function cabins() {
        return $this->belongsToMany( Cabin::class , 'cabin_facilite_pivot' );
    }
    public function facilites()  {
        return $this->hasMany(Facilite::class);
    }

}
