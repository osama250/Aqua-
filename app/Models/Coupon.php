<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = ['name','limit','remaining','start_date','end_date','status', 'type','value'];

    protected $casts    = ['start_date','end_date'];
    public $appends     = ['statustype','typestring'];

    static function rules(){
        $rules['name']          = 'required|unique:coupons,name|string';
        $rules['limit']         = 'required|numeric|min:1|not_in:0';
        $rules['start_date']    = 'required|date';
        $rules['end_date']      = 'required|date';
        $rules['status']        = 'required|in:1,2';
        $rules['type']          = 'required|in:1,2';
        $rules['value']         = 'required|numeric|not_in:0,min:1';
        return $rules;
    }

    public function getStatustypeAttribute(){
        return $this->attributes['status'] == 1 ? 'active' : 'inactive';
    }

    public function getTypestringAttribute()
    {
        return $this->attributes['type'] == 1 ? 'amount' : 'percentage';
    }

    public function getStartDateAttribute(){
        return Carbon::parse($this->attributes['start_date'])->toDateString();
    }

    public function getEndDateAtribute()
    {
        return Carbon::parse($this->attributes['end_date'])->toDateString();
    }
}
