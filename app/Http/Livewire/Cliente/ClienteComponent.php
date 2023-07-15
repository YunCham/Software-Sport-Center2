<?php

namespace App\Http\Livewire\Cliente;

use App\Models\Bitacora;
use App\Models\Cliente;
use App\Models\Transaccion;
use Livewire\Component;
use Livewire\WithPagination;

class ClienteComponent extends Component
{
    use WithPagination;

    //Funcion para eliminar un cliente  de la base de datos
    public function deleteCliente($cliente_id){
        $cliente = Cliente::find($cliente_id);
        $cliente->delete();
        Bitacora::Bitacora('D', 'Cliente', $cliente->id); //metodo de monitoreo Bitacora
    }

    public function render()
    {
        $clientes = Cliente::orderBy('nombre','ASC')->paginate(5);
        $transaccions = Transaccion::all();
        return view('livewire.cliente.cliente-component',['clientes'=>$clientes, 'transaccions'=>$transaccions]);
    }
}
