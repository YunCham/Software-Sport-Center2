<!DOCTYPE html>
<html>
<head>
    <title>Nota de Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h2, h3 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        th, td {
            border: 1px solid #000;
            padding: 5px 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Nota de Compra</h2>
    <p>Proveedor: {{ $nota_compra->proveedor->name }}</p>
    <p>Usuario: {{ $nota_compra->user->name }} - ID: {{$nota_compra->user->id}}000</p>
    <p>Fecha: {{ $nota_compra->fecha_hora }}</p>
    {{-- <p>Total: BS. {{ $nota_compra->total }}</p> --}}

    <h3>Productos</h3>
    <table>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Subtotal</th>
        </tr>
        @foreach($nota_compra->productos as $producto)
        <tr>
            <td>{{ $producto->descripcion }}</td>
            <td>{{ $producto->pivot->cantidad }}</td>
            <td>BS. {{ $producto->pivot->precio_unitario }}</td>
            <td>BS. {{ $producto->pivot->cantidad * $producto->pivot->precio_unitario }}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="3" style="text-align: right; font-weight: bold;">Total:</td>
            <td>BS. {{ $nota_compra->total }}</td>
        </tr>
    </table>
</body>
</html>
