<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

 class Country extends Model
{
    use SoftDeletes, Translatable;

    public $table                 = 'countries';
    protected $dates              = ['deleted_at'];
    public $fillable              = [ 'name' ];
    public $translatedAttributes  = [ 'name' ];

    protected $casts = [
        'id' => 'integer'
    ];

    public static function rules()
    {
        $languages = LaravelLocalization::getSupportedLanguagesKeys();
        foreach ($languages as $language) {
            $rules[$language . '.name'] = 'required|min:3';
        }

        return $rules;
    }

    public function cities()  //  ??????????????
    {
        return $this->hasMany(\App\Models\City::class);
    }

}
