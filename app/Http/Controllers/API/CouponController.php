<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function coupones(){
        return response()->json(['coupones' => Coupon::where('status',1)->get()],200);
    }
}