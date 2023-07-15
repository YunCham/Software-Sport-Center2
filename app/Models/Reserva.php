<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Area;
use App\Models\Estado_Reserva;
use App\Models\Cliente;

class Reserva extends Model
{
    use HasFactory;

    /*cuando tiene muchos campos(atributos)
    los sgts no se asignan masivamente*/
    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Relacion de uno a muchos entre Area&Reserva
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    // Relacion entre Reserva&estado_reserva de uno a muchos
    public function estado_reserva()
    {
        return $this->belongsTo(Estado_Reserva::class);
    }

    //Relcion de uno a muchos entre cliente&Reserva
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
