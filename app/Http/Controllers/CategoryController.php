<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.dashboard.category.index',[
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // error part
        $request->validate([
            'category_name' => 'required',
            'category_slug' => 'required',
            'category_photo'=> 'required|image',
        ]);
        // error part


        // insert part
        if ($request->hasFile('category_photo')) {
            $manager = new ImageManager(new Driver());
            $new_name = uniqid(). "." . $request->file('category_photo')->getClientOriginalExtension();
            $image = $manager->read($request->file('category_photo'))->resize(300,300);
            $image->toJpeg(80)->save(base_path('public/uploads/category_photo/'.$new_name));

            $slug = Str::slug($request->category_slug);
            Category::insert([
                'category_name' => $request->category_name,
                'category_slug' => $slug,
                'category_photo'=>$new_name,
                'created_at'    => Carbon::now(),
            ]);
            return redirect('category')->with('catesucc','You Successfully Added A Category');
        }
        // insert part
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('layouts.dashboard.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $category_photo_update = Category::find($id);
        $image_path = 'uploads/category_photo/' . $category_photo_update->category_photo;

        if ($request->hasFile('category_photo')) {
            $manager = new ImageManager(new Driver());
            if (File::exists($image_path)) {
                unlink($image_path);
            }
            $new_name = uniqid() . "." . $request->file('category_photo')->getClientOriginalExtension();
            $image = $manager->read($request->file('category_photo'))->resize(300,300);
            $image->toJpeg(80)->save(base_path('public/uploads/category_photo/'.$new_name));

            Category::find($id)->update([
                'category_photo' => $new_name,
            ]);
        }
        $category_photo_update->update([
            'category_name' => $request->category_name,
            'category_slug' => $request->category_slug,
        ]);
        return back()->with('success','You Successfully Changed Your Category Info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $delete= Category::findOrFail($id);
        $image_path = 'uploads/category_photo/' . $delete->category_photo;
        if (File::exists($image_path)) {
            unlink($image_path);
        }
        $delete->delete();
        return back();
        
    }
}


