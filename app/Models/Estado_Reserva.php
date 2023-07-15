<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado_Reserva extends Model
{
    use HasFactory;

    /*cuando tiene muchos campos(atributos)
    los sgts no se asignan masivamente*/
    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Relacion entre Reserva&estado_reserva de uno a muchos
    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
