<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AboutUs extends Model
{
    use HasFactory, Translatable;
    public $translatedAttributes =  ['title', 'description','seo','keywords','focus_keyword'];
    protected $fillable          =  ['title','description', 'seo', 'keywords', 'focus_keyword'];

    static function rules(){
        $langs = LaravelLocalization::getSupportedLanguagesKeys();
        foreach($langs as $lang){
            $rules[$lang . '.title'] = 'required|string|min:5';
            $rules[$lang . '.description'] = 'required|string|min:5|max:255';
        }
        return $rules;
    }

}
