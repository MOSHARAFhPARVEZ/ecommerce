<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.dashboard.color.index');
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
        // error part
        $request->validate([
            'color' => 'required',
        ]);
        // error part
        Color::insert([
            'color' => $request->color,
            'user_id' => auth()->id(),
            'created_at' => Carbon::now() ,
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Color $color)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        //
    }
}
