<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use App\Models\Pro_gallary;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.dashboard.product.index',[
            'products' => Product::with('category')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.dashboard.product.create',[
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // error part
        $request->validate([
            'product_name'      => 'required',
            'product_category'  => 'required',
            'purchase_price'    => 'required',
            'regular_price'     => 'required',
            'description'       => 'required',
            'long_description'  => 'required',
            'addi_info'         => 'required',
            'photo'             => 'required|image',
        ]);
        // error part

        // insert part
        if ($request->hasFile('photo')) {
            $manager = new ImageManager(new Driver());
            $new_name = uniqid(). "." . $request->file('photo')->getClientOriginalExtension();
            $image = $manager->read($request->file('photo'))->resize(300,300);
            $image->toJpeg()->save(base_path('public/uploads/product_photo/'.$new_name));

           $product_id = Product::insertGetId([
                'product_name'      => $request->product_name,
                'product_category'  => $request->product_category,
                'purchase_price'    => $request->purchase_price,
                'regular_price'     => $request->regular_price,
                'discount_price'    => $request->discount_price,
                'description'       => $request->description,
                'long_description'  => $request->long_description,
                'addi_info'         => $request->addi_info,
                'photo'             => $new_name,
            ]);

            $product_gallarys = $request->product_gallary;
                foreach ($product_gallarys as  $product_gallarys) {
                    $products = str_replace('', '-', str::lower($request->product_name)) . '-' .  rand(1000000,99999999);
                    $upload_files = $product_gallarys;
                    $extension = $upload_files->getClientOriginalExtension();
                    $manager = new ImageManager(new Driver());
                    $new_names = $request->product_id . '-' . $products . "." . $extension;
                    $imgs= $manager->read($upload_files);
                    $imgs->toJpeg(200)->save(base_path('public/uploads/gal_photo/' . $new_names));

                    Pro_gallary::insert([
                        'product_gallary' => $new_names,
                        'product_id' => $product_id,
                        'created_at' => Carbon::now(),
                    ]);
                }

            // $product = Product::create($request->except('_token','gal_photos'));
            // if ($request->hasFile('gal_photos')) {
            //     foreach ($request->File('gal_photos') as  $pro_gallary) {
            //         $new_name_gal = uniqid(). "." . $pro_gallary->getClientOriginalExtension();
            //         $imagegal = $manager->read($pro_gallary)->resize(300,300);
            //         $imagegal->toJpeg(80)->save(base_path('public/uploads/gal_photo/'.$new_name_gal));
            //         Pro_gallary::create([
            //             'product_gallary' => $new_name_gal,
            //             'product_id' => $product->id,
            //             'created_at' => Carbon::now(),
            //         ]);
            //     }
            // }
            return redirect('product');
        }
        // insert part
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, Category $category)
    {
        $product = Product::find($id);
        return view('layouts.dashboard.product.edit',[
            'categories' => Category::all(),
            'product' => $product,
            'sizes' => Size::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        Product::find($id)->update([
            'product_name'      => $request->product_name,
            'product_category'  => $request->product_category,
            'purchase_price'    => $request->purchase_price,
            'regular_price'     => $request->regular_price,
            'discount_price'    => $request->discount_price,
            'description'       => $request->description,
            'long_description'  => $request->long_description,
            'addi_info'         => $request->addi_info,
        ]);

        $photo_update = Product::find($id);
        $imgpath = 'uploads/product_photo/' . $photo_update-> photo;

        if ($request->hasFile('photo')) {
            $manager = new ImageManager(new Driver());
            if (File::exists($imgpath)) {
                unlink($imgpath);
            }
            $new_name = uniqid() . "." . $request->file('photo')->getClientOriginalExtension();
            $image = $manager->read($request->file('photo'))->resize(300,300);
            $image->toPng()->save(base_path('public/uploads/product_photo/' . $new_name));
            $photo_update->update([
                'photo' => $new_name,
            ]);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $delete = Product::find($id);
        $imgpath = 'uploads/product_photo/' . $delete-> photo;
        if (File::exists($imgpath)) {
            unlink($imgpath);
        }
        $delete->delete();
        return back();
    }
}
