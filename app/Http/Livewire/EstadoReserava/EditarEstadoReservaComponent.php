<?php

namespace App\Http\Livewire\EstadoReserava;

use App\Models\Bitacora;
use App\Models\Estado_Reserva;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditarEstadoReservaComponent extends Component
{
  use WithFileUploads;

  public $nombre_estado, $estado_id;

  public function mount($estado_id)
  {
    $estado = Estado_Reserva::find($estado_id);
    $this->estado_id = $estado->id;
    $this->nombre_estado = $estado->nombre_estado;
  }

  public function updated($fields)
  {
    $this->validateOnly($fields, [
      'nombre_estado' => 'required'
    ]);
  }

  public function updateEstado()
  {
    $this->validate([
      'nombre_estado' => 'required',
    ]);

    $estado =  Estado_Reserva::find($this->estado_id);
    $estado->nombre_estado = $this->nombre_estado;

    $estado->save();
    Bitacora::Bitacora('U', 'Estado', $estado->id);
    return redirect(route('estado.index'))->with('status', 'Estado registrado!');
  }

  public function goBack()
  {
    return redirect(route('estado.index'));
  }

  public function render()
  {
    return view('livewire.estado-reserava.editar-estado-reserva-component');
  }
}
