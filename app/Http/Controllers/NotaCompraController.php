<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\NotaCompra;
use Illuminate\Http\Request;
use PDF;
class NotaCompraController extends Controller
{
    public function generarPDF($nota_compra_id) {
        $nota_compra = NotaCompra::with('productos')->findOrFail($nota_compra_id);
    
        $pdf = PDF::loadView('nota_compra', ['nota_compra' => $nota_compra]);
    
        return $pdf->download('nota_compra_'.$nota_compra_id.'.pdf');
    }
}
