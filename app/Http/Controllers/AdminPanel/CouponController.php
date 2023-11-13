<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminPanel\CreateCouponRequest;
use App\Http\Requests\AdminPanel\UpdateCouponRequest;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:View Coupon|Add Coupon|Edit Coupon|Delete Coupon', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Coupon', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Coupon', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Coupon', ['only' => ['destroy']]);
    }

    public function index()
    {
        $coupones = Coupon::all();
        return view('AdminPanel.coupones.index',get_defined_vars());
    }


    public function create()
    {
        return view('AdminPanel.coupones.create');
    }


    public function store(CreateCouponRequest $request)
    {
        $request['remaining'] = $request->limit;
        Coupon::create($request->all());
        return redirect()->route('coupons.index')->with('success', __('lang.created'));
    }


    // public function show($id)
    // {
    //     //
    // }


    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('AdminPanel.coupones.edit',get_defined_vars());
    }


    public function update(UpdateCouponRequest $request, $id)
    {
        $coupon = Coupon::findOrFail($request->id);
        $request['remaining'] = $request['limit'] - $coupon->limit + $coupon->remaining;
        $coupon->update($request->all());
        return redirect()->route('coupons.index')->with('success', __('lang.updated'));

    }


    public function destroy($id)
    {
        Coupon::findOrFail($id)->delete();
        return redirect()->route('coupons.index')->with('warning', __('lang.deleted'));
    }
}
