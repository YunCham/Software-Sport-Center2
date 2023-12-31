<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Membresia;
use App\Models\Cliente;
class Transaccion extends Model
{
    use HasFactory;
    
    /*cuando tiene muchos campos(atributos)
    los sgts no se asignan masivamente*/  
    protected $guarded =['id','created_at','updated_at'];

    //relacion de uno a muchos inversa
    public function user(){
        return $this->belongsTo(User::class);
    }
    //relacion de uno a muchos inversa
    public function membresia(){
        return $this->belongsTo(Membresia::class);
    }

    //relacion de  uno a uno con cliente & transaccion 
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }


}
