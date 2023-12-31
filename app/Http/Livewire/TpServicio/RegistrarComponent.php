<?php

namespace App\Http\Livewire\TpServicio;

use App\Models\Bitacora;
use Livewire\Component;
use App\Models\TipoServicio;

class RegistrarComponent extends Component
{
    public $nombre;

    public function storeTipoServicio()
    {
        $this->validate([
            'nombre' => 'required',

        ]);
        $tservicio = new TipoServicio();
        $tservicio->nombre = $this->nombre;
        $tservicio->save();
        Bitacora::Bitacora('C', 'Tipo Servicio', $tservicio->id);   
        session()->flash('status', 'Nuevo tipo registrado!');
    }
    //función para retroceder
    public function goBack()
    {
        // Lógica adicional si es necesario
        $this->redirect(route('tservicio.index'));
    }
    public function render()
    {
        return view('livewire.tp-servicio.registrar-component');
    }
}
