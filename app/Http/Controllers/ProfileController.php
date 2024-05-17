<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile(){
        return view('layouts.dashboard.profile.profile');
    }
    public function profilechg(Request $request){

        // error part start
        $request->validate([
            'profile_photo' => 'required|image',
        ]);
        // error part end

        if ($request->hasfile('profile_photo')) {
            $manager = new ImageManager(new Driver());
            $new_name = Auth::user()->id. "." . $request->file('profile_photo')->getClientOriginalExtension();
            $image = $manager->read($request->file('profile_photo'))->resize(200,200);
            $image->toJpeg(80)->save(base_path('public/uploads/profile_photo/'. $new_name));

            User::find(auth()->id())->update([
                'profile_photo' => $new_name,
            ]);
        }
        return back()->with('succm', 'You Successfully Changed Your Profile Photo');

    }

    public function coverchg(Request $request){
        // error part
        $request->validate([
            'cover_photo' => 'required|image'
        ]);
        // error part

        if ($request->hasfile('cover_photo')) {
            $manager = new ImageManager(new Driver());
            $new_name = auth::user()->id . "." . $request->file('cover_photo')->getClientOriginalExtension();
            $image = $manager->read($request->file('cover_photo'))->resize(1600,451);
            $image->toJpeg(80)->save(base_path('public/uploads/cover_photo/'.$new_name));

            User::find(auth()->id())->update([
                'cover_photo' => $new_name,
            ]);
        }

        return back()->with('success', 'You Successfully Changed Your Cover Photo');

    }


    public function passwordcng(Request $request){
        // error part
        $request->validate([
            'old_password'     => 'required',
            'password'         => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);
        // error part

        if (Hash::check($request->old_password, auth()->user()->password)) {
            User::find(auth()->user()->id)->updare([
                'password' => bcrypt($request->password)
            ]);
            return back()->with('pass_succ' , 'You Successfully Changed Your Password');
        }
        else{
            return back()->withErrors('Your Old Password Does not Match');
        }
    }

}
