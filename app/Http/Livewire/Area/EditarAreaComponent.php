<?php

namespace App\Http\Livewire\Area;

use App\Models\Area;
use App\Models\Bitacora;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditarAreaComponent extends Component
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

  public $area_id;
  public $newimage;

  public function mount($area_id)
  {
    $area = Area::find($area_id);
    $this->area_id = $area->id;
    $this->nombre_Area = $area->nombre_Area;
    $this->tipo_Area = $area->tipo_Area;
    $this->capacidad = $area->capacidad;
    $this->estado = $area->estado;
    $this->horario_apertura = $area->horario_apertura;
    $this->horario_cierre = $area->horario_cierre;
    $this->descripcion = $area->descripcion;
    $this->imagen = $area->imagen;
  }

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

  public function updateArea()
  {
    $this->validate([
      'nombre_Area' => 'required',
      'tipo_Area' => 'required',
      'capacidad' => 'required',
      'estado' => 'required',
      'horario_apertura' => 'required',
      'horario_cierre' => 'required'
    ]);

    $area =  Area::find($this->area_id);
    $area->nombre_Area = $this->nombre_Area;
    $area->tipo_Area = $this->tipo_Area;
    $area->capacidad = $this->capacidad;
    $area->estado = $this->estado;
    $area->horario_apertura = $this->horario_apertura;
    $area->horario_cierre = $this->horario_cierre;
    $area->descripcion = $this->descripcion;

    if ($this->newimage) {
      if ($area->imagen) {
        unlink('assets/img/areas/' . $area->imagen); // Eliminar el archivo anterior si existe
      }
     
      $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension(); // Corregir aquí
      $this->newimage->storeAs('areas', $imageName);
      $area->imagen = $imageName;

      
    }

    $area->save();
    Bitacora::Bitacora('U', 'area', $area->id);
    return redirect(route('area.index'))->with('status', 'Area  del centro deportivo Actualizado!');
  }


  public function goBack()
  {
    return redirect(route('area.index'));
  }

  public function render()
  {
    return view('livewire.area.editar-area-component');
  }
}
