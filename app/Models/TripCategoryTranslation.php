<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class TripCategoryTranslation extends Model
{
    use HasFactory;
    protected $table        = 'trip_category_translations';
    protected $primaryKey   = 'trans_id';
    protected $fillable     = [ 'name', 'duration', 'rate_plan', 'desc', ];
    public $timestamps      = false;


    public static function rules()
    {
        $languages = LaravelLocalization::getSupportedLanguagesKeys();

            foreach ($languages as $language) {
                $rules[$language . '.name'] = 'required|string|min:3|max:191';
                $rules[$language . '.duration'] = 'required|string|min:3|max:191';
                $rules[$language . '.rate_plan'] = 'required|string|min:3';
                $rules[$language . '.desc'] = 'required|string|min:3';
            }

        $rules['photo'] = 'required|image';
        $rules['map']   = 'required|image';

        return $rules;
    }
}
