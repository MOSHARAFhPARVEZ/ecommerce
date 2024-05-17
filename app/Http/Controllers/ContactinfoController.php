<?php

namespace App\Http\Controllers;

use App\Mail\ContactFromMail;
use App\Models\Contactinfo;
use App\Models\Letstalk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.dashboard.contactinfo.index',[
            'cotacts'=>Contactinfo::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.dashboard.contactinfo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // error part
        $request->validate([
        'bracnce_name' => 'required',
        'location' => 'required',
        'open_time' => 'required',
        'close_time' => 'required',
        'email' => 'required',
        'phone' => 'required',
        ]);
        // error part
       Contactinfo::insert([
        'bracnce_name' =>$request->bracnce_name,
        'location' =>$request->location,
        'open_time' =>$request->open_time,
        'close_time' =>$request->close_time,
        'email' =>$request->email,
        'phone' =>$request->phone,
        'created_at' =>Carbon::now(),
       ]);
       return redirect()->route('contactinfo.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contactinfo $contactinfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $contactinfo = Contactinfo::find($id);
        return view('layouts.dashboard.contactinfo.edit',compact('contactinfo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Contactinfo::find($id)->update([
        'bracnce_name' =>$request->bracnce_name,
        'location' =>$request->location,
        'open_time' =>$request->open_time,
        'close_time' =>$request->close_time,
        'email' =>$request->email,
        'phone' =>$request->phone,
        'updated_at' =>Carbon::now(),
       ]);
       return redirect()->route('contactinfo.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $delete = Contactinfo::find($id);
        $delete->delete();
        return back()->with('success','You Successfully Deleted Your Contact Info');
    }
    public function mail_view(){
        return view('frontend.mail.mail_view');
    }
    public function letstalk(Request $request){
        // error part
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required',
        ]);
        // error part

        $data =[
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        Mail::to('mmhparvez3800@gmail.com')->send(new ContactFromMail($data));

        Letstalk::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('success','You Successfully Sent Your Message');
    }

}
