<?php

namespace App\Models;

use App\Http\Traits\FileUploadTrait;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Traits\UploadImage;
use App\Models\FacilitePhoto;

class Facilite extends Model
{
    use Translatable , UploadImage;

    public $table                = 'facilites';
    public $translatedAttributes = [ 'title','icon' ];
    public $fillable             = [ 'category_id' ,'title', 'order' ,'icon' ];

    protected $casts = [
        'id'          => 'integer',
        'main_photo'  => 'string'
    ];

    static function rules()
    {
        $langs = LaravelLocalization::getSupportedLanguagesKeys();
        foreach ($langs as $lang) {
            $rules[$lang . '.title']        = 'required|string|min:5|max:255';
            // $rules[$lang . '.icon']         = 'required|string|min:5|max:255';
        }
        $rules['category_id']    =  'required';
        // $rules['main_photo'] = 'required|image|mimes:jpg,png,jpeg';
        // $rules['photos']     = 'required|array';
        // $rules['photos.*']   = 'required';
        return $rules;
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function cabins() {
        return $this->belongsToMany( Cabin::class , 'cabin_facilite_pivot' );
    }

    // public function getMainPhotoAttribute()
    // {
    //     return asset('uploads/facilites/' . $this->attributes['main_photo']);
    // }

    // public function setMainPhotoAttribute($file)
    // {
    //     $name = $this->ulpoadImages($file , 'Admins');
    //     $this->attributes['main_photo'] = $name;
    // }

    // public function setMainPhotoAttribute($file)
    // {
    //     $name = $this->upload($file, 'uploads/facilites/');
    //     $this->attributes['main_photo'] = $name;
    // }

    public function photos() {  //  One To Many
        return $this->hasMany( FacilitePhoto::class ,'facilite_id' );
    }
}
