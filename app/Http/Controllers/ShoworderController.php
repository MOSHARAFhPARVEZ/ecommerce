<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ShoworderController extends Controller
{
    public function showorder(){
        $show_orders = Order::all();
        return view('layouts.dashboard.showorder',compact('show_orders'));
    }
    public function orderstutas(Request $request, $id){
        Order::find($id)->update([
            'order_stutas' => $request->order_stutas,
        ]);
        return back();
    }
}
