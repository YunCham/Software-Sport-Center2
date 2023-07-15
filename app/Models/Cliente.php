<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaccion;
use App\Models\Reserva;


class Cliente extends Model
{
    use HasFactory;

     /*cuando tiene muchos campos(atributos)
    los sgts no se asignan masivamente*/  
    protected $guarded =['id','created_at','updated_at'];

      //relacion de  uno a uno con Cliente & transaccion
  public function transaccion()
  {
    return $this->hasOne(Transaccion::class, 'transaccion_id');
  }

  //Relcion de uno a muchos entre cliente&Reserva
  public function reserva()
  {
      return $this->hasMany(Reserva::class);
  }

}
