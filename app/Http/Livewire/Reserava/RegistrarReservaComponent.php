<?php

namespace App\Http\Livewire\Reserava;

use App\Models\Area;
use App\Models\Bitacora;
use App\Models\Cliente;
use App\Models\Estado_Reserva;
use App\Models\Reserva;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegistrarReservaComponent extends Component
{
  use WithFileUploads;

  public $area_id;
  public $estado_reserva_id;
  public $cliente_id;
  public $fecha;
  public $hora_inicio;
  public $hora_fin;
  public $comentario;

  public function updated($fields)
  {
    $this->validateOnly($fields, [
      'area_id' => 'required',
      'estado_reserva_id' => 'required',
      'cliente_id' => 'required',
      'fecha' => 'required',
      'hora_inicio' => 'required',
      'hora_fin' => 'required',
      'comentario' => 'required'
    ]);
  }

  public function storeReserva()
  {

    $this->validate([
      'area_id' => 'required',
      'estado_reserva_id' => 'required',
      'cliente_id' => 'required',
      'fecha' => 'required',
      'hora_inicio' => 'required',
      'hora_fin' => 'required'
      ]);

    $reserva = new Reserva();
    $reserva->area_id = $this->area_id;
    $reserva->estado_reserva_id = $this->estado_reserva_id;
    $reserva->cliente_id = $this->cliente_id;
    $reserva->fecha = $this->fecha;
    $reserva->hora_inicio = $this->hora_inicio;
    $reserva->hora_fin = $this->hora_fin;
    $reserva->comentario = $this->comentario;

    $reserva->save();
    Bitacora::Bitacora('C', 'reserva.index', $reserva->id);
    return redirect(route('reserva.index'))->with('status', 'reserva registrado!');
  }

  public function goBack()
  {
    return redirect(route('reserva.index'));
  }

  public function render()
  {
    $areas= Area::all();
    $clientes= Cliente::all();
    $estados= Estado_Reserva::all();
    return view('livewire.reserava.registrar-reserva-component', ['estados' => $estados,'areas'=>$areas,'clientes'=>$clientes]);
  }
}
