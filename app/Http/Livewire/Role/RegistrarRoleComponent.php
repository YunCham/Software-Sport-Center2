<?php

namespace App\Http\Livewire\Role;

use App\Models\Bitacora;
use App\Models\Permission;
use Livewire\Component;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Spatie\Permission\Models\Role as ModelsRole;

class RegistrarRoleComponent extends Component
{
    public $name;
    public $selectedPermissions = [];

    public function storeRol()
    {
        $this->validate([
            'name' => 'required',
        ]);
        $rol = new ModelsRole();
        $rol->name = $this->name;
        $rol->save();
        $rol->permissions()->sync($this->selectedPermissions);
        Bitacora::Bitacora('C', 'Rol', $rol->id); 
        return redirect(route('rol.index'))->with('status', 'Nuevo Rol registrado!');
        //session()->flash('status', 'Nuevo tipo registrado!');
    }
    //función para retroceder
    public function goBack()
    {
        // Lógica adicional si es necesario
        $this->redirect(route('rol.index'));
    }

    public function render()
    {
        $permisos = ModelsPermission::all();
        return view('livewire.role.registrar-role-component', compact('permisos'));
    }
}
