<?php
$conexion = new mysqli('localhost', 'root', '', 'examen');

// Verifica la conexión
if ($conexion->connect_error) {
    die('No se puede conectar a la base de datos: ' . $conexion->connect_error);
}
?>
