<?php

namespace App\Http\Livewire\NotaCompra;

use App\Models\Bitacora;
use App\Models\NotaCompra;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditarNotaCompraComponent extends Component
{
    public $nota_compra_id;
    public $fecha_hora;
    public $total = 0;
    public $proveedor_id;
    public $user_id;

    public $selectedProductos = [];
    public $cantidad = [];
    public $precioUnitario = [];

    public function mount($compra_id)
    {
        $nota_compra = NotaCompra::find($compra_id);
        $this->nota_compra_id = $nota_compra->id;
        $this->fecha_hora = $nota_compra->fecha_hora;
        $this->total = $nota_compra->total;
        $this->proveedor_id = $nota_compra->proveedor_id;
        $this->user_id = $nota_compra->user_id;

        foreach ($nota_compra->productos as $producto) {
            $this->selectedProductos[$producto->id] = true;
            $this->cantidad[$producto->id] = $producto->pivot->cantidad;
            $this->precioUnitario[$producto->id] = $producto->pivot->precio_unitario;
        }
    }

    public function updated($fields)
    {
        $this->total = 0;
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

    public function cleanUnselectedProducts()
    {
        foreach ($this->selectedProductos as $productoId => $selected) {
            if (!$selected) {
                unset($this->cantidad[$productoId]);
                unset($this->precioUnitario[$productoId]);
            }
        }
    }

    public function updateCompra()
    {
        $this->cleanUnselectedProducts();

        $productosSeleccionados = array_filter($this->selectedProductos);
        if (count($productosSeleccionados) == 0) {
            session()->flash('message', 'Por favor, seleccione al menos un producto.');
            return;
        }

        $this->validate([
            'fecha_hora' => 'required',
            'total' => 'required',
            'proveedor_id' => 'required',
            'selectedProductos' => 'required',
            'cantidad' => 'required',
            'precioUnitario' => 'required',
        ]);

        $nota_compra = NotaCompra::find($this->nota_compra_id);
        $nota_compra->fecha_hora = $this->fecha_hora;
        $nota_compra->total = $this->total;
        $nota_compra->proveedor_id = $this->proveedor_id;
        $nota_compra->user_id = Auth::id();
        $nota_compra->save();
        Bitacora::Bitacora('U', 'Nota Compra', $nota_compra->id); 
        $productosCantidad = [];
        foreach ($this->selectedProductos as $productoId => $selected) {
            if ($selected && isset($this->cantidad[$productoId]) && isset($this->precioUnitario[$productoId])) {
                $cantidad = $this->cantidad[$productoId];
                $precioUnitario = $this->precioUnitario[$productoId];
                $productosCantidad[$productoId] = ['cantidad' => $cantidad, 'precio_unitario' => $precioUnitario];
            }
        }

        $nota_compra->productos()->sync($productosCantidad);
        return redirect(route('nota_compra.index'))->with('status', '¡COMPRA actualizada exitosamente!');
    }

    public function goBack()
    {
        $this->redirect(route('nota_compra.index'));
    }

    public function render()
    {
        $productos = Producto::all();
        $proveedores = Proveedor::all();
        return view('livewire.nota-compra.editar-nota-compra-component', compact('productos', 'proveedores'));
    }
}