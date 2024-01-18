<p>Se ha generado el siguiente pedido:</p>
<p>Factura con fecha: {{ $factura->created_at }}</p>
<table>
    <thead>
        <th>Denominacion</th>
        <th>Cantidad</th>
        <th>Categoria</th>
        <th>Precio</th>
    </thead>
    <tbody>
        @foreach ($factura->articulos as $articulo)
            <tr>
                <td>{{ $articulo->denominacion }}</td>
                <td>{{ $articulo->pivot->cantidad }}<</td>
                <td>{{ $articulo->categoria }}<</td>
                <td>{{ $articulo->precio }}<</td>
            </tr>
    </tbody>
</table>
