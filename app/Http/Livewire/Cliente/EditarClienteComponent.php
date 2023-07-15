<?php

namespace App\Http\Livewire\Cliente;

use App\Models\Bitacora;
use App\Models\Cliente;
use App\Models\Transaccion;
use Livewire\Component;

class EditarClienteComponent extends Component
{

  public $transaccion_id;
  public $nombre;
  public $apellido_paterno;
  public $apellido_materno;
  public $fecha_nacimiento;
  public $genero;
  public $telefono;
  public $direccion;
  public $ciudad;
  public $estado;
  public $tipo_cliente;
  public $cliente_id;

  public function mount($cliente_id)
  {
    $cliente = Cliente::find($cliente_id);
    $this->cliente_id = $cliente->id;
    $this->nombre = $cliente->nombre;
    $this->transaccion_id = $cliente->transaccion_id;
    $this->apellido_paterno = $cliente->apellido_paterno;
    $this->apellido_materno = $cliente->apellido_materno;
    $this->fecha_nacimiento = $cliente->fecha_nacimiento;
    $this->genero = $cliente->genero;
    $this->telefono = $cliente->telefono;
    $this->direccion = $cliente->direccion;
    $this->ciudad = $cliente->ciudad;
    $this->estado = $cliente->estado;
    $this->tipo_cliente = $cliente->tipo_cliente;
  }

  public function updated($fields)
  {
    $this->validateOnly($fields, [
      'transaccion_id' => 'required',
      'nombre' => 'required',
      'apellido_paterno' => 'required',
      'apellido_materno' => 'required',
      'fecha_nacimiento' => 'required',
      'genero' => 'required',
      'telefono' => 'required',
      'direccion' => 'required',
      'ciudad' => 'required',
      'estado' => 'required',
      'tipo_cliente' => 'required'
    ]);
  }

  public function updateCliente()
  {

    $this->validate([
      'nombre' => 'required',
      'transaccion_id' => 'required',
      'apellido_paterno' => 'required',
      'apellido_materno' => 'required',
      'fecha_nacimiento' => 'required',
      'genero' => 'required',
      'telefono' => 'required',
      'direccion' => 'required',
      'ciudad' => 'required',
      'estado' => 'required',
      'tipo_cliente' => 'required'
    ]);


    $cliente = Cliente::find($this->cliente_id);
    $cliente->nombre = $this->nombre;
    $cliente->transaccion_id = $this->transaccion_id;
    $cliente->apellido_paterno = $this->apellido_paterno;
    $cliente->apellido_materno = $this->apellido_materno;
    $cliente->fecha_nacimiento = $this->fecha_nacimiento;
    $cliente->genero = $this->genero;
    $cliente->telefono = $this->telefono;
    $cliente->direccion = $this->direccion;
    $cliente->ciudad = $this->ciudad;
    $cliente->estado = $this->estado;
    $cliente->tipo_cliente = $this->tipo_cliente;


    $cliente->save();
    Bitacora::Bitacora('U', 'Cliente', $cliente->id);
    return redirect(route('cliente.index'))->with('status', 'Actualizacion registrado!');
  }


  public function goBack()
  {
    return redirect(route('cliente.index'));
  }




  public function render()
  {
    $transaccions = Transaccion::All();
    return view('livewire.cliente.editar-cliente-component', compact('transaccions'));
  }
}
