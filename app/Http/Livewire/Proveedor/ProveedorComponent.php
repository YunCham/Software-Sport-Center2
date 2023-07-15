<?php

namespace App\Http\Livewire\Proveedor;

use App\Models\Bitacora;
use App\Models\Proveedor;
use Livewire\Component;

class ProveedorComponent extends Component
{
    public function deleteProveedor($personal_id)
    {
      $personal = Proveedor::find($personal_id);
      $personal->delete();
      Bitacora::Bitacora('D', 'Proveedor', $personal->id);
      session()->flash('message','Registro elimidado exitosamente!');
    }
    public function render()
    {
        $personales = Proveedor::orderBy('name', 'ASC')->paginate(5);
        return view('livewire.proveedor.proveedor-component' , ['proveedors' => $personales]);
    }
}
