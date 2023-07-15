<?php

namespace App\Http\Livewire\Servicio;

use App\Models\Bitacora;
use Livewire\Component;
use App\Models\Servicio;

class ServicioComponent extends Component
{
    public $deletedServicioId;
    public function deleteServicio($servicio_id)
    {
        $servicio = Servicio::find($servicio_id);
        $servicio->delete();
        Bitacora::Bitacora('D', 'Servicio', $servicio->id);
        $this->deletedServicioId = $servicio_id;
      /*  session()->flash('message', 'Registro eliminado exitosamente!');*/
    }


    public function render()
    {
        $servicios = Servicio::orderBy('nombre', 'ASC')->paginate(5);

        return view('livewire.servicio.servicio-component', compact('servicios'));
    }
}
