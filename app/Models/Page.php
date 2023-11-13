<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Page extends Model
{
    use Translatable;
    public $table = 'pages';

    public $fillable = [
        'title',
        'description',
        'seo',
    ];

    protected $casts = [
        'id' => 'integer'
    ];

    public $translatedAttributes =  ['title','description','seo'];

    public static function rules (){
        $langs = LaravelLocalization::getSupportedLanguagesKeys();
        foreach ($langs as $lang) {
            $rules[$lang . '.title']         = 'required|string|min:5|max:255';
            // $rules[$lang . '.description']   = 'required|string|min:5|max:255';
            $rules[$lang . '.seo']           = 'required|string|min:5|max:255';
        }
        return $rules;
    }

    public function photos() {      //  One To Many
        return $this->hasMany( PagePhoto::class ,'page_id' );
    }
}
