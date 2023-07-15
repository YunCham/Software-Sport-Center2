<?php

namespace App\Http\Livewire\Area;

use App\Models\Area;
use App\Models\Bitacora;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegistrarAreaComponent extends Component
{
  use WithFileUploads;

  public $nombre_Area;
  public $tipo_Area;
  public $capacidad;
  public $estado;
  public $horario_apertura;
  public $horario_cierre;
  public $descripcion;
  public $imagen;

  public function updated($fields)
  {
    $this->validateOnly($fields, [
      'nombre_Area' => 'required',
      'tipo_Area' => 'required',
      'capacidad' => 'required',
      'estado' => 'required',
      'horario_apertura' => 'required',
      'horario_cierre' => 'required',
      'descripcion' => 'required',
      'imagen' => 'required',
    ]);
  }

  public function storeArea()
  {


    $this->validate([
      'nombre_Area' => 'required',
      'tipo_Area' => 'required',
      'capacidad' => 'required',
      'estado' => 'required',
      'horario_apertura' => 'required',
      'horario_cierre' => 'required'
    ]);


    $area = new Area();
    $area->nombre_Area = $this->nombre_Area;
    $area->tipo_Area = $this->tipo_Area;
    $area->capacidad = $this->capacidad;
    $area->estado = $this->estado;
    $area->horario_apertura = $this->horario_apertura;
    $area->horario_cierre = $this->horario_cierre;
    $area->descripcion = $this->descripcion;

    $imageName = Carbon::now()->timestamp . '.' . $this->imagen->extension();
    $this->imagen->storeAs('areas', $imageName);
    $area->imagen = $imageName;

    $area->save();
    Bitacora::Bitacora('C', 'area.index', $area->id);
    return redirect(route('area.index'))->with('status', 'Area  del centro deportivo registrado!');
  }


  public function goBack()
  {
    return redirect(route('area.index'));
  }



  public function render()
  {
    return view('livewire.area.registrar-area-component');
  }
}
