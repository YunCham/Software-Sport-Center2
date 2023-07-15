<?php

namespace App\Http\Livewire\NotaCompra;

use App\Models\Bitacora;
use Illuminate\Support\Facades\Auth;
use App\Models\NotaCompra;
use App\Models\Producto;
use App\Models\Proveedor;
use Livewire\Component;

class RegistrarNotaCompraComponent extends Component
{

    public $fecha_hora;
    public $total = 0;
    public $proveedor_id;
    public $user_id;

    public $selectedProductos = [];
    public $cantidad = [];
    public $precioUnitario = [];

    public function updated($fields)
    {
        $this->total = 0; // reset the total
        foreach ($this->selectedProductos as $productoId => $selected) {
            if ($selected && isset($this->cantidad[$productoId]) && isset($this->precioUnitario[$productoId])) {
                $cantidad = is_numeric($this->cantidad[$productoId]) ? $this->cantidad[$productoId] : 0;
                $precioUnitario = is_numeric($this->precioUnitario[$productoId]) ? $this->precioUnitario[$productoId] : 0;
                $this->total += $cantidad * $precioUnitario;
            }
        }


        $this->validateOnly($fields, [
            'fecha_hora' => 'required',
            'total' => 'required',
            'proveedor_id' => 'required',
            'selectedProductos' => 'required',
            'cantidad' => 'required',
            'precioUnitario' => 'required',
        ]);
    }
    //En esta función, estás recorriendo todos los productos y comprobando si el producto no está seleccionado. Si no está seleccionado, eliminas su cantidad y su precio unitario.(para usar en storeCompra)
    public function cleanUnselectedProducts()
    {
        foreach ($this->selectedProductos as $productoId => $selected) {
            if (!$selected) {
                unset($this->cantidad[$productoId]);
                unset($this->precioUnitario[$productoId]);
            }
        }
    }

    public function storeCompra()
    {
        // Limpiar productos no seleccionados
        $this->cleanUnselectedProducts();

        // Comprobando que al menos un producto está seleccionado
        $productosSeleccionados = array_filter($this->selectedProductos);
        if (count($productosSeleccionados) == 0) {
            session()->flash('message', 'Por favor, seleccione al menos un producto.');
            return;
        }

        // Reglas de validación
        $this->validate([
            'fecha_hora' => 'required',
            'total' => 'required',
            'proveedor_id' => 'required',
            'selectedProductos' => 'required',
            'cantidad' => 'required',
            'precioUnitario' => 'required',
        ]);

        $nota_compra = new NotaCompra();
        $nota_compra->fecha_hora = $this->fecha_hora;
        $nota_compra->total = $this->total;
        $nota_compra->proveedor_id = $this->proveedor_id;
        $nota_compra->user_id = Auth::id();
        $nota_compra->save();
        Bitacora::Bitacora('C', 'Nota Compra', $nota_compra->id);
        $productosCantidad = [];
        foreach ($this->selectedProductos as $productoId => $selected) {
            if ($selected && isset($this->cantidad[$productoId]) && isset($this->precioUnitario[$productoId])) {
                $cantidad = $this->cantidad[$productoId];
                $precioUnitario = $this->precioUnitario[$productoId]; // Obtenemos el precio unitario
                $productosCantidad[$productoId] = ['cantidad' => $cantidad, 'precio_unitario' => $precioUnitario]; // Agregamos el precio unitario
            }
        }

        $nota_compra->productos()->sync($productosCantidad);
        return redirect(route('nota_compra.index'))->with('status', 'Nueva COMPRA registrada!');
    }


    //función para retroceder
    public function goBack()
    {
        // Lógica adicional si es necesario
        $this->redirect(route('nota_compra.index'));
    }

    public function render()
    {
        $productos = Producto::all();
        $proveedores = Proveedor::all();
        return view('livewire.nota-compra.registrar-nota-compra-component', compact('productos', 'proveedores'));
    }
}