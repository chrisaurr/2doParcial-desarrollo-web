<?php
$title = "Agregar Poste";
include 'header.php';  // Asegúrate de que el archivo 'header.php' esté en la misma carpeta o ajusta la ruta
?>

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow" style="width: 400px;">
        <h2 class="text-center mb-4">Agregar Poste</h2>
        <form action="procesarPoste.php" method="post">
            <!-- Campo para el No. de Poste -->
            <div class="mb-3">
                <label for="no_poste" class="form-label">No. de Poste</label>
                <input type="text" name="no_poste" id="no_poste" class="form-control" required>
            </div>
            
            <!-- Campo para la Dirección -->
            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" name="direccion" id="direccion" class="form-control" required>
            </div>
            
            <!-- Campo para el Departamento -->
            <div class="mb-3">
                <label for="departamento" class="form-label">Departamento</label>
                <input type="text" name="departamento" id="departamento" class="form-control" required>
            </div>
            
            <!-- Campo para el Municipio -->
            <div class="mb-3">
                <label for="municipio" class="form-label">Municipio</label>
                <input type="text" name="municipio" id="municipio" class="form-control" required>
            </div>
            
            <!-- Campo para la Referencia -->
            <div class="mb-3">
                <label for="referencia" class="form-label">Referencia</label>
                <input type="text" name="referencia" id="referencia" class="form-control" required>
            </div>
            
            <!-- Campo para la Latitud -->
            <div class="mb-3">
                <label for="latitud" class="form-label">Latitud</label>
                <input type="text" name="latitud" id="latitud" class="form-control" required>
            </div>
            
            <!-- Campo para la Longitud -->
            <div class="mb-4">
                <label for="longitud" class="form-label">Longitud</label>
                <input type="text" name="longitud" id="longitud" class="form-control" required>
            </div>
            
            <!-- Botón de Envío -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
        </form>
        <!-- Enlace de vuelta a la lista de postes -->
        <div class="text-center mt-4">
            <a href="listar_postes.php" class="btn btn-secondary">Volver a la Lista de Postes</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
