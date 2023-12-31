<?php

namespace App\Http\Livewire\NotaCompra;

use App\Models\Bitacora;
use App\Models\NotaCompra;
use Livewire\Component;
use Livewire\WithPagination;
class NotaCompraComponent extends Component
{
    use WithPagination;

    public function deleteCompra($membresia_id){
        $compra = NotaCompra::find($membresia_id);
        $compra->delete();
        Bitacora::Bitacora('D', 'Nota Compra', $compra->id);   
    }
    
    public function render()
    {
        $notasCompra = NotaCompra::orderBy('id', 'DESC')->paginate(5);
        return view('livewire.nota-compra.nota-compra-component', ['notasCompra' => $notasCompra]);
    }
}
