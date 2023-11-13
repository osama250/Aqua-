<?php

namespace App\Models;

use App\Http\Traits\FileUploadTrait;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SideSeeing extends Model
{
    use FileUploadTrait,Translatable;
    public $table = 'side_seeings';

    public $translatedAttributes =  ['title', 'short_description','long_description'];

    public $fillable = [
        'main_photo',
        'title',
        'short_description',
        'long_description',
        'price'
    ];

    protected $casts = [
        'id' => 'integer',
        'main_photo' => 'string'
    ];

    static function rules()
    {
        $langs = LaravelLocalization::getSupportedLanguagesKeys();
        foreach ($langs as $lang) {
            $rules[$lang . '.title'] = 'required|string|min:5|max:255';
            $rules[$lang . '.short_description'] = 'required|string|min:5|max:255';
            $rules[$lang . '.long_description'] = 'required|string|min:5|max:255';
        }
        $rules['price'] = 'required|numeric|not_in:0,min:1';
        $rules['main_photo'] = 'required|image|mimes:jpg,png,jpeg';
        $rules['photos'] = 'required|array';
        $rules['photos.*'] = 'required';
        return $rules;
    }

    public function getMainPhotoAttribute()
    {
        return asset('uploads/sideseeing/' . $this->attributes['main_photo']);
    }

    public function setMainPhotoAttribute($file)
    {
        $name = $this->upload($file, 'uploads/sideseeing/');
        $this->attributes['main_photo'] = $name;
    }

    public function photos()
    {
        return $this->hasMany(SideSeeingPhoto::class, 'side_seeing_id');
    }


}
