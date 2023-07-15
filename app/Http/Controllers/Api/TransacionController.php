<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Membresia;
use Illuminate\Http\Request;

class TransacionController extends Controller
{ 
    public function membresiaIndex()
    {
        $membresias = Membresia::where('estado', 'activo')->with('servicios')->get();
        return response()->json($membresias);
    }

    public function index()
    {
        
    }

 //Implemtacion de funcion de 
    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
