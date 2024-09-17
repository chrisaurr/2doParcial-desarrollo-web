<?php 
include('conexion.php');  // Incluye el archivo de conexión para definir $conexion
include('poste.php');     // Incluye el archivo que define la clase Poste

// Asegúrate de que $conexion esté definido aquí
$poste = new Poste($conexion);
$postes = $poste->listarPostes();  // Método para listar postes

$title = "Lista de Postes";
include 'header.php';
?>

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header text-center">
            <h1>Lista de Postes</h1>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID Poste</th>
                        <th>No. de Poste</th>
                        <th>Dirección</th>
                        <th>Departamento</th>
                        <th>Municipio</th>
                        <th>Referencia</th>
                        <th>Latitud</th>
                        <th>Longitud</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($postes as $poste) { ?>
                    <tr>
                        <td><?php echo $poste['id_poste']; ?></td>
                        <td><?php echo $poste['no_poste']; ?></td>
                        <td><?php echo $poste['direccion']; ?></td>
                        <td><?php echo $poste['departamento']; ?></td>
                        <td><?php echo $poste['municipio']; ?></td>
                        <td><?php echo $poste['referencia']; ?></td>
                        <td><?php echo number_format($poste['latitud'], 6); ?></td>
                        <td><?php echo number_format($poste['longitud'], 6); ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer text-center">
            <a href="agregar_poste.php" class="btn btn-primary">Agregar Poste</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
