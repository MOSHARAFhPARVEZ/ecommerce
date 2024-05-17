<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Orderproduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout(){
        $carts =Cart::where('user_id', Auth::id())->get();
        return view('frontend.checkout',[
            'carts' => $carts,
        ]);
    }
    public function order_success(){
        return view('frontend.order_success');
    }
    public function checkout_store(Request $request){
        $order_id = uniqid();
        if ($request->payment_method == 1) {
            Order::insert([
            'coustomer_id'=> $request->coustomer_id,
            'order_id' =>$order_id ,
            'name'  =>$request->name,
            'email' =>$request->email,
            'company'   =>$request->company,
            'phone' =>$request->phone,
            'country'   =>$request->country,
            'city'  =>$request->city,
            'address'   =>$request->address,
            'notes' =>$request->notes,
            'discount'  =>$request->discount,
            'charge'    =>$request->charge,
            'total' =>$request->total+$request->charge,
            'created_at' => Carbon::now(),
        ]);

        $carts = Cart::where('user_id',Auth::id())->get();
        foreach ($carts as $cart) {
            Orderproduct::insert([
                'coustomer_id' => $cart->user_id,
                'order_id' => $order_id,
                'product_id' => $cart->product_id,
                'color_id' => $cart->color_id,
                'size_id' =>$cart->size_id,
                'quantity' => $cart->quantity,
                'created_at' => Carbon::now(),
            ]);
        }

        return redirect()->route('order_success') ;
        }
        else {
            $data = $request->all();
            return redirect('/pay')->with('data',$data);
        }


    }
}
