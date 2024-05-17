<?php

namespace App\Http\Controllers;

use App\Models\About;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.dashboard.about.index',[
            'abouts'=> About::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.dashboard.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // error Part
        $request->validate([
            'tittle' => 'required',
            'description' => 'required',
            'experience_number' => 'required',
            'satisfaction_per' => 'required',
            'happy_customer' => 'required',
            'banner_photo' => 'required|image',
        ]);
        // error Part

        if ($request->hasFile('banner_photo')) {
            $manager = new ImageManager(new Driver());
            $new_name = uniqid() . "." . $request->file('banner_photo')->getClientOriginalExtension();
            $image = $manager->read($request->file('banner_photo'))->resize(1140,690);
            $image->toJpeg(100)->save(base_path('public/uploads/banner_photo/'.$new_name));

            About::insert([
                'tittle' => $request->tittle,
                'description' => $request->description,
                'experience_number' => $request->experience_number,
                'satisfaction_per' => $request->satisfaction_per,
                'happy_customer' => $request->happy_customer,
                'banner_photo' => $new_name,
                'created_at' => Carbon::now(),
            ]);
        }

        return redirect()->route('aboutpart.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $about = About::find($id);
        return view('layouts.dashboard.about.edit',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        About::find($id)->update([
            'tittle' => $request->tittle,
            'description' => $request->description,
            'experience_number' => $request->experience_number,
            'satisfaction_per' => $request->satisfaction_per,
            'happy_customer' => $request->happy_customer,
            'updated_at' => Carbon::now(),
        ]);

        $photo_update = About::find($id);
        $image_path = 'uploads/baner_photo/' . $photo_update->banner_photo;
        if ($request->hasFile('banner_photo')) {
            $manager = new ImageManager(new Driver());
            if (File::exists($image_path )) {
                unlink($image_path);
            };
            $new_name = uniqid() . "." . $request->file('banner_photo')->getClientOriginalExtension();
            $image = $manager->read($request->file('banner_photo'))->resize(1140,690);
            $image->toJpeg(100)->save(base_path('public/uploads/banner_photo/'.$new_name));
            $photo_update->update([
               'banner_photo' => $new_name,
            ]);
        }
        return redirect()->route('aboutpart.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $photo_delete = About::find($id);
        $image_path = 'uploads/banner_photo/' . $photo_delete->banner_photo;
        if (File::Exists($image_path)) {
            unlink($image_path);
        };
        $photo_delete->delete();
        return back()->with('success','You Successfully Deleted Your Banner Info');
    }
}
