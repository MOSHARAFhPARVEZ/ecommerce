<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart(Request $request){
        Cart::insert([
            'product_id' => $request->product_id,
            'user_id' => $request->user_id,
            'size_id' => $request->size_id,
            'color_id' => $request->color_id,
            'quantity' => $request->quantity,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return back();
    }

    public function cartview(Request $request){
        $coupon_name = $request->coupon_name;
        $coupon_type = $request->coupon_type;
        $msg = '';
        $coupon_discount = 0;

        if (Coupon::where('coupon_name',$coupon_name)->exists()) {
            $coupon_discount = Coupon::where('coupon_name',$coupon_name)->first()->coupon_discount;
            $coupon_type = Coupon::where('coupon_name',$coupon_name)->first()->coupon_type;

        }
        else {
           $msg ="coupon invalid";
        }
        return view('frontend.cartview',[
            'msg' =>$msg,
            'coupon_discount' =>$coupon_discount,
            'coupon_type' =>$coupon_type,
        ]);
    }

    public function cartdelete($id){
        Cart::find($id)->delete();
        return back();
    }

    public function cartupdate(Request $request){

        foreach ($request->quantity as $cart_id => $quantity) {
           Cart::find($cart_id)->update([
            'quantity' => $quantity,
           ]);
           return back();
        }
        // return $request;
    }
}
