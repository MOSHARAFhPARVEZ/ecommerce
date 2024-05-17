<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function coupon(){
        return view('layouts.dashboard.coupon',[
            'coupons' => Coupon::all(),
        ]);
    }
    public function couponinsert(Request $request){
        Coupon::insert([
            'coupon_name' => $request->coupon_name,
            'coupon_type' => $request->coupon_type,
            'coupon_discount' => $request->coupon_discount,
            'coupon_date' => $request->coupon_date,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('success','You Successfully Added A Coupon');
    }
}
