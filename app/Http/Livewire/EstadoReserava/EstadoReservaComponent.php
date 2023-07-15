<?php

namespace App\Http\Livewire\EstadoReserava;

use App\Models\Bitacora;
use App\Models\Estado_Reserva;
use Livewire\Component;
use Livewire\WithPagination;

class EstadoReservaComponent extends Component
{
    use WithPagination;

    public function deleteEstado($estado_reserva_id){
        $estado = Estado_Reserva::find($estado_reserva_id);
        $estado->delete();
        Bitacora::Bitacora('D', 'Estado_Reserva', $estado->id);
    }

    public function render()
    {
        $estados = Estado_Reserva::orderBy('nombre_estado','ASC')->paginate(3);
        return view('livewire.estado-reserava.estado-reserva-component',compact('estados'));
    }
}
