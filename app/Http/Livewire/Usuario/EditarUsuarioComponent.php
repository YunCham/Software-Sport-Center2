<?php

namespace App\Http\Livewire\Usuario;

use App\Models\Bitacora;
use App\Models\Personal;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;

class EditarUsuarioComponent extends Component
{

    use WithFileUploads;
    public $user_id;
    public $name;
    public $email;
    public $phone;
    public $location;
    public $about;
    public $password;
    public $personal_id;
    public $userRoles , $user;
    public $role_id;

    public $selectedRole;

    public function mount($user_id)
    {
        $user = User::find($user_id);
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->location = $user->location;
        $this->about = $user->about;
        //$this->password = $user->password;
        $this->personal_id = $user->personal_id;
        $this->user = $user;
        $this->userRoles  = $user->getRoleNames();

        $this->selectedRole = $user->roles->first()->id ?? null; // Asignar el ID del primer rol por defecto
       
      }
  
    public function updated($fields)
    {
      $this->validateOnly($fields, [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required'
      ]);
    }
  
    //Implemtamos Metodo para editar el usuario 
    public function updateUsuario()
    {
      $this->validate([
        'name' => 'required',
        'email' => 'required',
        'password' => 'required'
      ]);
      $user = User::find($this->user_id);
      $user->name = $this->name;
      $user->email = $this->email;
      $user->phone = $this->phone;
      $user->location = $this->location;
      $user->about = $this->about;
      $user->password = $this->password;
      $user->personal_id = $this->personal_id;
      if ($this->role_id != null) {
          if ($user->roles->first()) {
              $user->removeRole($user->roles->first()->name);
          }
          $user->syncRoles($this->role_id);
      }
      $user->save();
      Bitacora::Bitacora('U', 'Usuario', $user->id);
      session()->flash('message', 'Actualizacion exitosa!');
    }
  
    //función para retroceder
    public function goBack()
    {
      // Lógica adicional si es necesario
      $this->redirect(route('usuario'));
    }
  
    public function render()
    {
        $personales=Personal::orderBy('nombre','ASC')->get();
        $roles = Role::all();
        return view('livewire.usuario.editar-usuario-component',['personales'=>$personales, 'roles'=>$roles]);
    }
}
                                                                  