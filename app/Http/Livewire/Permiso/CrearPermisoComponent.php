<?php

namespace App\Http\Livewire\Permiso;

use App\Models\Bitacora;
use App\Models\Permission;
use Livewire\Component;
use Spatie\Permission\Models\Permission as ModelsPermission;

class CrearPermisoComponent extends Component
{
    public $name, $description;

    public function storeRol()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $permiso = new ModelsPermission();
        $permiso->name = $this->name;
        $permiso->description = $this->description;
        $permiso->save();
        Bitacora::Bitacora('C', 'Permiso', $permiso->id);   
        return redirect(route('permiso.index'))->with('status', 'Nuevo Permiso registrado!');
        //session()->flash('status', 'Nuevo tipo registrado!');
    }
    //función para retroceder
    public function goBack()
    {
        // Lógica adicional si es necesario
        $this->redirect(route('permiso.index'));
    }

    public function render()
    {
        return view('livewire.permiso.crear-permiso-component');
    }
}
