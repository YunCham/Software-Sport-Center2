<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'location',
        'phone',
        'about',
        'tipo_proveedor'
    ];

    //git add -f "\app\Models\Proveedor.php"
    // Relacion de uno a muchos entre  proveedor y nota de compra
    public function notasCompra()
    {
        return $this->hasMany(NotaCompra::class);
    }
}
