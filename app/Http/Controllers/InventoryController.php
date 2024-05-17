<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Product;
use App\Models\Size;
use App\Models\Color;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Colors\Rgb\Channels\Red;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function inventory($id)
    {
        $products = Product::find($id);
        $sizes = Size::all();
        $colors = Color::all();
        $inventories = Inventory::where('product_id', $id)->get();
        return view('layouts.dashboard.product.inventory',[
            'sizes'=>$sizes,
            'colors'=>$colors,
            'products'=>$products,
            'inventories'=>$inventories,
        ]);
    }
    public function inventorystore(Request $request, $id)
    {
        // error part
        $request->validate([
            'size_id' => 'required',
            'color_id' => 'required',
            'quantity' => 'required',
        ]);
        // error part
        Inventory::insert([
            'product_id' => $id,
            'size_id' => $request->size_id,
            'color_id' => $request->color_id,
            'quantity' => $request->quantity,
            'created_at' => Carbon::now(),
        ]);
        return back();
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventory $inventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventory $inventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventory $inventory)
    {
        //
    }
}
