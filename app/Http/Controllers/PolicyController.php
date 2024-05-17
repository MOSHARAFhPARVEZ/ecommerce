<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.dashboard.policy.index',[
            'policies'=>Policy::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.dashboard.policy.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // error part
        $request->validate([
            'policy_tittle' => 'required',
            'policy_sub_tittle' => 'required',
            'policy_icon' => 'required',
        ]);
        // error part

        Policy::insert([
            'policy_tittle' => $request->policy_tittle,
            'policy_sub_tittle' => $request->policy_sub_tittle,
            'policy_icon' => $request->policy_icon,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('policy.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Policy $policy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $policy = Policy::find($id);
        return view('layouts.dashboard.policy.edit',compact('policy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        Policy::find($id)->update([
            'policy_tittle' => $request->policy_tittle,
            'policy_sub_tittle' => $request->policy_sub_tittle,
            'policy_icon' => $request->policy_icon,
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('policy.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $policydelete = Policy::find($id);
        $policydelete->delete();
        return back()->with('success','You Successfully Deleted Your Info');
    }
}
