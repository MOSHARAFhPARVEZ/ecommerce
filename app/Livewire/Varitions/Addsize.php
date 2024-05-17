<?php

namespace App\Livewire\Varitions;

use Livewire\Component;
use Illuminate\Support\Carbon;
use App\Models\Size;

class Addsize extends Component
{
    public $size;
    public function size_insert(){
        Size::insert([
            'size' => $this->size,
            'user_id' => auth()->id(),
            'created_at' => Carbon::now(),
        ]);
        $this->reset();
        session()->flash('success', 'You successfully Added.');
    }
    public function delete($id){
        Size::find($id)->delete();
    }
    public function render()
    {
        $sizes = Size::where('user_id',auth()->id())->latest()->get();
        return view('livewire.varitions.addsize',compact('sizes'));
    }

}
