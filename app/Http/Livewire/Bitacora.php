<?php

namespace App\Http\Livewire;

use App\Models\Bitacora as ModelsBitacora;
use Livewire\Component;

class Bitacora extends Component
{
    public $attribute = '';

    public function updatingAttribute()
    {
        $this->resetPage();
    }

    public function render()
    {
        $bitacoras = ModelsBitacora::orderBy('id', 'DESC')->paginate(15);
        return view('livewire.bitacora', compact('bitacoras'));
    }
}
