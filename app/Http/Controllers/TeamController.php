<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.dashboard.team.index',[
            'teams' => Team::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.dashboard.team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // error part
        $request->validate([
            'member_name' => 'required',
            'member_position' => 'required',
            'member_photo' => 'required|image',
        ]);
        // error part

        if ($request->hasFile('member_photo')) {
            $manager = new ImageManager(new Driver());
            $new_name = uniqid() . "." . $request->file('member_photo')->getClientOriginalExtension();
            $image = $manager->read($request->file('member_photo'))->resize(540,540);
            $image->toPng()->save(base_path('public/uploads/member_photo/' . $new_name));
            Team::insert([
                'member_name' =>$request->member_name,
                'member_position' =>$request->member_position,
                'member_photo' =>$new_name,
            ]);
        }
        return redirect()->route('team.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $team = Team::find($id);
        return view('layouts.dashboard.team.edit',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Team::find($id)->update([
            'member_name' =>$request->member_name,
            'member_position' =>$request->member_position,
        ]);
        $team_photo_update = Team::find($id);
        $image_path = 'uploads/member_photo/' . $team_photo_update->member_photo;
        if ($request->hasFile('member_photo')) {
            $manager = new ImageManager(new Driver());
            if (File::exists($image_path)) {
                unlink($image_path);
            };
            $new_name = uniqid() . "." . $request->file('member_photo')->getClientOriginalExtension();
            $image = $manager->read($request->file('member_photo'))->resize(540,540);
            $image->toJpeg(100)->save(base_path('public/uploads/member_photo/'.$new_name));
            $team_photo_update->update([
                'member_photo' => $new_name,
            ]);
        }
        return redirect()->route('team.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $member_photo_delete = Team::find($id);
        $member_photo_path = 'uploads/member_photo/'. $member_photo_delete->member_photo;
        if (File::exists($member_photo_path)) {
            unlink($member_photo_path);
        };
        $member_photo_delete->delete();
        return back()->with('success','You Successfully Deleted Your Team Member Info');
    }
}
