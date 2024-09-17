<?php
  $title = "Agregar Venta";
  include 'header.php';  // Asegúrate de que el archivo 'header.php' esté en la misma carpeta o ajusta la ruta
?>
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow" style="width: 400px;">
        <h2 class="text-center mb-4">Agregar Venta</h2>
        <form action="procesarVenta.php" method="post">
            <!-- Campo para la Referencia -->
            <div class="mb-3">
                <label for="referencia" class="form-label">Referencia</label>
                <input type="text" name="referencia" id="referencia" class="form-control" required>
            </div>
            
            <!-- Campo para el Tipo de Gasolina -->
            <div class="mb-3">
                <label for="tipo_gasolina" class="form-label">Tipo de Gasolina</label>
                <input type="text" name="tipo_gasolina" id="tipo_gasolina" class="form-control" required>
            </div>
            
            <!-- Campo para la Cantidad -->
            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="number" name="cantidad" id="cantidad" class="form-control" required>
            </div>
            
            <!-- Campo para el Precio -->
            <div class="mb-4">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" step="0.01" name="precio" id="precio" class="form-control" required>
            </div>
            
            <!-- Botón de Envío -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
        </form>
        <!-- Enlace de vuelta a la lista de ventas -->
        <div class="text-center mt-4">
            <a href="listar_ventas.php" class="btn btn-secondary">Volver a la Lista de Ventas</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
