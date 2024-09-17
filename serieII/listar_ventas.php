<?php 
    include('venta.php');  // Asegúrate de que este archivo maneje la lógica para obtener ventas
    $venta = new Venta($conexion);
    $ventas = $venta->listarVentas();  // Método para listar ventas
    $title = "Lista de Ventas";
    include 'header.php';
?>

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header text-center">
            <h1>Lista de Ventas</h1>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID Venta</th>
                        <th>Referencia</th>
                        <th>Tipo de Gasolina</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Total</th>
                        <th>Adicional Agregado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ventas as $venta) { 
                        $precio = $venta['precio'];
                        $cantidad = $venta['cantidad'];
                        $total = $cantidad * $precio;
                        $adicional = ($cantidad < 100) ? 5 : 0;
                        $totalConAdicional = $total + $adicional;
                        $adicionalAgregado = ($adicional > 0) ? "Sí" : "No";
                    ?>
                    <tr>
                        <td><?php echo $venta['id_venta']; ?></td>
                        <td><?php echo $venta['referencia']; ?></td>
                        <td><?php echo $venta['tipo_gasolina']; ?></td>
                        <td><?php echo $cantidad; ?></td>
                        <td><?php echo number_format($precio, 2); ?></td>
                        <td><?php echo number_format($totalConAdicional, 2); ?></td>
                        <td><?php echo $adicionalAgregado; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer text-center">
            <a href="agregar_venta.php" class="btn btn-primary">Agregar Venta</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
