<?php
require 'conexion.php';
require 'poste.php';

$poste = new Poste($conexion);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no_poste = $_POST["no_poste"];
    $direccion = $_POST["direccion"];
    $departamento = $_POST["departamento"];
    $municipio = $_POST["municipio"];
    $referencia = $_POST["referencia"];
    $latitud = $_POST["latitud"];
    $longitud = $_POST["longitud"];

    if ($poste->agregarPoste($no_poste, $direccion, $departamento, $municipio, $referencia, $latitud, $longitud)) {
        // El poste se agregó correctamente, redirecciona a la lista de postes
        header("Location: listar_postes.php");
        exit();
    } else {
        // Hubo un error al agregar el poste, muestra un mensaje de error
        echo "Error al agregar el poste.";
    }
} else {
    echo "Error al agregar el poste.";
}
?>
