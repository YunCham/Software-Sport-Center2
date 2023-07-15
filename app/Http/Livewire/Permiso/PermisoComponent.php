<?php

namespace App\Http\Livewire\Permiso;

use App\Models\Bitacora;
use App\Models\Permission;
use Livewire\Component;
use Spatie\Permission\Models\Permission as ModelsPermission;

class PermisoComponent extends Component
{
    public $permiso_id;

    public function deletePermiso($permiso_id)
    {
        $permiso = ModelsPermission::find($permiso_id);
        $permiso->delete();
        Bitacora::Bitacora('D', 'Permiso', $permiso->id);
        session()->flash('message','Permiso elimidado exitosamente!');
    }

    public function render()
    {
        $permisos = ModelsPermission::orderBy('id', 'DESC')->paginate(8);
        return view('livewire.permiso.permiso-component', compact('permisos'));
    }
}
