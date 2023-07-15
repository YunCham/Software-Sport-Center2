<?php

namespace App\Http\Livewire\Reserava;

use App\Models\Bitacora;
use App\Models\Reserva;
use Livewire\Component;
use Livewire\WithPagination;

class ReservaComponent extends Component
{

    use WithPagination;

    public function deleteReserva($reserva_id){
        $reserva = Reserva::find($reserva_id);
        $reserva->delete();
        Bitacora::Bitacora('D', 'Reserva', $reserva->id);   
    }

    public function render()
    {
        $reservas = Reserva::orderBy('id', 'DESC')->paginate(8);
       
        return view('livewire.reserava.reserva-component',['reservas'=>$reservas]);
    }
}
