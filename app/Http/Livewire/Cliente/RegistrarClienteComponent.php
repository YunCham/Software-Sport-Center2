<?php

namespace App\Http\Livewire\Cliente;

use App\Models\Bitacora;
use App\Models\Cliente;
use App\Models\Transaccion;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegistrarClienteComponent extends Component
{
  use WithFileUploads;
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

  public function storeCliente()
  {

    // dd($this->nombre, 
    // $this->transaccion_id, 
    // $this->apellido_paterno, 
    // $this->apellido_materno, 
    // $this->fecha_nacimiento, 
    // $this->genero, 
    // $this->telefono, 
    // $this->direccion, 
    // $this->ciudad, 
    // $this->estado, 
    // $this->tipo_cliente);

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
     

    $cliente = new Cliente();
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
    Bitacora::Bitacora('C', 'Cliente.index', $cliente->id);
    return redirect(route('cliente.index'))->with('status', 'Cliente registrado!');

  }


  public function goBack()
  {
    return redirect(route('cliente.index'));
  }

  public function render()
  {
    $transaccions = Transaccion::All();
    return view('livewire.cliente.registrar-cliente-component', compact('transaccions'));
  }
}
