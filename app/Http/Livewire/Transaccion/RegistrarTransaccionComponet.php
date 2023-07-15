<?php

namespace App\Http\Livewire\Transaccion;

use App\Models\Bitacora;
use App\Models\Membresia;
use App\Models\Transaccion;
use App\Models\User;
use Livewire\Component;

class RegistrarTransaccionComponet extends Component
{
  public $fecha_hora_transaccion;
  public $tipo_transaccion;
  public $description;
  public $monto;
  public $metodo_pago;
  public $estado_transaccion;
  public $user_id;
  public $membresia_id;
  public $montoEditable = true;   //input... editable

  //Implementacion del metodo  precio automatico al momento de selecionar una membresia
  public function updatedMembresiaId()
  {
    $membresia = Membresia::find($this->membresia_id);
    $this->monto = $membresia->precio;
    $this->montoEditable = false; //input no editable
  }

  //Implement of the funtion update
  public function updated($fields)
  {
    $this->validateOnly($fields, [
      'fecha_hora_transaccion' => 'required',
      'tipo_transaccion' => 'required',
      'description' => 'required',
      'monto' => 'required',
      'metodo_pago' => 'required',
      'estado_transaccion' => 'required',
      'user_id' => 'required',
      'membresia_id' => 'required'
    ]);
  }

  //Implementacion de la  funcion de gruardar  datos | | dd($this->nombre_atributo);---->ver por consola
  public function storeTansaccion()
  {
    $this->validate([
      'fecha_hora_transaccion' => 'required',
      'tipo_transaccion' => 'required',
      'description' => 'required',
      'monto' => 'required',
      'metodo_pago' => 'required',
      'estado_transaccion' => 'required',
      'user_id' => 'required',
      'membresia_id' => 'required'
    ]);

    $transaccion = new Transaccion();
    $transaccion->fecha_hora_transaccion = $this->fecha_hora_transaccion;
    $transaccion->tipo_transaccion = $this->tipo_transaccion;
    $transaccion->description = $this->description;
    $transaccion->monto = $this->monto;
    $transaccion->metodo_pago = $this->metodo_pago;
    $transaccion->estado_transaccion = $this->estado_transaccion;
    $transaccion->user_id = $this->user_id;
    $transaccion->membresia_id = $this->membresia_id;


    $transaccion->save();
    Bitacora::Bitacora('C', 'Transaccion', $transaccion->id);
    session()->flash('message', ' Registro Exitoso!');
  }

  //función para retroceder
  public function goBack()
  {
    // Lógica adicional si es necesario
    $this->redirect(route('transaccion'));
  }


  public function render()
  {
    //Consulta para listar a los usuarios de Tipo Cliente con ID=3
    $users = User::whereHas('roles', function ($query) {
      $query->where('role_id', '=', 3);
    })->orderBy('name', 'ASC')->get();

    $membresias = Membresia::orderBy('nombre', 'ASC')->get();
    return view('livewire.transaccion.registrar-transaccion-componet', ['users' => $users, 'membresias' => $membresias]);
  }
}
