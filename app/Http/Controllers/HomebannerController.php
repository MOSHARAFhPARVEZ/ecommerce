<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Homebanner;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomebannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.dashboard.homebanner.index',[
            'homebanners' => Homebanner::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.dashboard.homebanner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // error part
        $request->validate([
            'category' => 'required',
            'product_name' => 'required',
            'description' => 'required',
            'regular_price' => 'required',
            'discount_price' => 'required',
            'homebanner_photo' => 'required|image',
        ]);
        // error part
        if ($request->hasFile('homebanner_photo')) {
            $manager = new ImageManager(new Driver());
            $new_name = uniqid() . "." . $request->file('homebanner_photo')->getClientOriginalExtension();
            $image = $manager->read($request->file('homebanner_photo'))->resize(844,517);
            $image->toPng()->save(base_path('public/uploads/homebanner_photo/'.$new_name));
            Homebanner::insert([
                'category' => $request->category,
                'product_name' => $request->product_name,
                'description' => $request->description,
                'regular_price' => $request->regular_price,
                'discount_price' => $request->discount_price,
                'homebanner_photo' =>$new_name,
                'created_at' => Carbon::now(),
            ]);
        }
        return redirect()->route('homebanner.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Homebanner $homebanner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $homebanner = Homebanner::find($id);
        return view('layouts.dashboard.homebanner.edit',compact('homebanner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Homebanner::find($id)->update([
            'category' =>$request->category,
            'product_name' =>$request->product_name,
            'description' =>$request->description,
            'regular_price' =>$request->regular_price,
            'discount_price' =>$request->discount_price,
            'updated_at' => Carbon::now(),
        ]);
        $homebanner_photo_update = Homebanner::find($id);
        $img_path = 'uploads/homebanner_photo/' . $homebanner_photo_update->homebanner_photo;
        if ($request->hasFile('homebanner_photo')) {
            $manager = new ImageManager(new Driver());
            if (File::exists($img_path)) {
                unlink($img_path);
            };
            $new_name = uniqid() . "." . $request->file('homebanner_photo')->getClientOriginalExtension();
            $image = $manager->read($request->file('homebanner_photo'))->resize(844,517);
            $image->toJpeg(100)->save(base_path('public/uploads/homebanner_photo/'.$new_name ));
            $homebanner_photo_update->update([
                'homebanner_photo' => $new_name,
            ]);
        }
        return redirect()->route('homebanner.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $homebanner_photo_delete = Homebanner::find($id);
        $img_path = 'uploads/homebanner_photo/' . $homebanner_photo_delete->homebanner_photo;
        if (File::exists($img_path)) {
            unlink($img_path);
        };
        $homebanner_photo_delete->delete();
        return back()->with('success','You Successfully Deleted Your Banner Info');
    }
}
