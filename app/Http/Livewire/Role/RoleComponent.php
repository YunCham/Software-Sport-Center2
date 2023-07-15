<?php

namespace App\Http\Livewire\Role;

use App\Models\Bitacora;
use Livewire\Component;
use Spatie\Permission\Models\Role as ModelsRole;

class RoleComponent extends Component
{
    public $role_id;

    public function deleteRol($role_id)
    {
        $role = ModelsRole::find($role_id);
        $role->delete();
        Bitacora::Bitacora('D', 'Roles', $role->id);
        session()->flash('message','Rol elimidado exitosamente!');
    }

    public function render()
    {
        $roles = ModelsRole::orderBy('id', 'ASC')->paginate(15);
        return view('livewire.role.role-component', compact('roles'));
    }
}
