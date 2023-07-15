<?php

namespace App\Http\Livewire\EstadoReserava;

use App\Models\Bitacora;
use App\Models\Estado_Reserva;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegistrarEstadoReservaComponent extends Component
{
    use WithFileUploads;

    public $nombre_estado;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'nombre_estado' => 'required'
        ]);
    }

    public function storeEstado()
    {
        $this->validate([
            'nombre_estado' => 'required',
        ]);

        $estado = new Estado_Reserva();
        $estado->nombre_estado = $this->nombre_estado;

        $estado->save();
        Bitacora::Bitacora('C', 'estado.index', $estado->id);
        return redirect(route('estado.index'))->with('status', 'Estado registrado!');
    }

    public function goBack()
    {
        return redirect(route('estado.index'));
    }

    public function render()
    {
        return view('livewire.estado-reserava.registrar-estado-reserva-component');
    }
}
