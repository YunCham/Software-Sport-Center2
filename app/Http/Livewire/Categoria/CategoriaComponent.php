<?php

namespace App\Http\Livewire\Categoria;

use App\Models\Bitacora;
use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithPagination;

class CategoriaComponent extends Component
{
    use WithPagination;

    public function deleteCategoria($categoria_id)
    {
        $categoria = Categoria::find($categoria_id);
        Bitacora::Bitacora('D', 'Categoria', $categoria->id);
        $categoria->delete();
    }
    
    public function render()
    {
        $categorias = Categoria::orderBy('nombre', 'ASC')->paginate(5);
        return view('livewire.categoria.categoria-component',['categorias' => $categorias]);
    }
}
