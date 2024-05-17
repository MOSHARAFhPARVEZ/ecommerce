<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.dashboard.service.index',[
            'services' => Service::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.dashboard.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // error part
        $request->validate([
            'tittle' => 'required',
            'description' => 'required',
            'icon' => 'required',
        ]);
        // error part
        Service::insert([
            'icon' => $request->icon,
            'tittle' => $request->tittle,
            'description' => $request->description,
        ]);
        return redirect()->route('service.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $service = Service::find($id);
        return view('layouts.dashboard.service.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Service::find($id)->update([
            'tittle' => $request->tittle,
            'description' => $request->description,
            'icon' => $request->icon,
        ]);
        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $delete = Service::find($id);
        $delete->delete();
        return back()->with('succes','You Successfully Deleted Your Service Info');
    }
}
