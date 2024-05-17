<?php

namespace App\Livewire\Varitions;

use Livewire\Component;
use App\Models\Color;
use Illuminate\Support\Carbon;

class Addcolor extends Component
{
    public $color;
    public $color_code;
    public function color_insert(){
        $this->validate([
            'color' => 'required',
            'color_code' => 'required',
        ]);
        Color::insert([
            'color' => $this->color,
            'color_code' => $this->color_code,
            'user_id' => auth()->id(),
            'created_at' => Carbon::now() ,
        ]);
        $this->reset();
        session()->flash('success', 'You successfully Added A Color.');
    }
    public function color_update($id){
        $this->validate([
            'color' => 'required',
            'color_code' => 'required',
        ]);
        Color::find($id)->update([
            'color' => $this->color,
            'color_code' => $this->color_code,
            'updated_at' => Carbon::now() ,
        ]);
        $this->reset();
        session()->flash('successm', 'You successfully Updated A Color.');
        return back();
    }
    public function delete($id){
        Color::find($id)->delete();
    }
    public function edit($id){
        $editcolor = Color::where('id',$id)->first();
        $this->color = $editcolor->color;
        $this->color_code = $editcolor->color_code;
    }
    public function render()
    {
        $colors = Color::where('user_id',  auth()->id())->latest()->get();
        return view('livewire.varitions.addcolor',compact('colors'));
    }
}
