<?php

namespace App\Http\Livewire\Area;

use App\Models\Area;
use App\Models\Bitacora;
use Livewire\Component;
use Livewire\WithPagination;

class AreaComponent extends Component
{
  use WithPagination;

  public $area_id;

  // public function deleteArea($area_id)
  // {
  //   dd($this->id);

  //   $area = Area::find($area_id);
  //   unlink('assets/imgs/areas/' . $area->imagen);
  //   $area->delete();
  //   session()->flash('message', 'area elimidado exitosamente!');
  //   Bitacora::Bitacora('D', 'Area', $area->id); //metodo de monitoreo Bitacora
  // }


  public function deleteArea($area_id){
    dd($area_id);
    $area = Area::find($area_id);
    unlink('assets/imgs/areas/' . $area->imagen);
    $area->delete();
    Bitacora::Bitacora('D', 'Area', $area->id);   
}

  public function render()
  {
    $areas = Area::orderBy('nombre_Area', 'ASC')->paginate(5);
    return view('livewire.area.area-component', ['areas' => $areas]);
  }
}
