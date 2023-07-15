<?php

namespace App\Http\Livewire\Personal;

use App\Models\Bitacora;
use App\Models\Personal;
use Livewire\Component;
use Livewire\WithPagination;

class PersonalComponent extends Component
{
  use WithPagination;


  public $deletedPersonalId;
  public function deletePersonal($personal_id)
  {
    $personal = Personal::find($personal_id);
    $personal->delete();
    Bitacora::Bitacora('D', 'Personal', $personal->id);
    $this->deletedPersonalId = $personal_id;
   /* session()->flash('message', 'Registro eliminado exitosamente!');*/
  }

  public function render()
  {
    $personales = Personal::orderBy('nombre', 'ASC')->paginate(8);
    return view('livewire.personal.personal-component', ['personales' => $personales]);
  }
}
