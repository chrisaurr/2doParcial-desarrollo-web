<?php 
require 'venta.php';  // Asegúrate de que este archivo maneje la lógica para ventas
require 'conexion.php';

$venta = new Venta($conexion);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $referencia = $_POST["referencia"];
    $tipo_gasolina = $_POST["tipo_gasolina"];
    $cantidad = $_POST["cantidad"];
    $precio = $_POST["precio"];

    if ($venta->agregarVenta($referencia, $tipo_gasolina, $cantidad, $precio)) {
        // La venta se agregó correctamente, redirecciona a la lista de ventas
        header("Location: listar_ventas.php");
        exit();
    } else {
        // Hubo un error al agregar la venta, muestra un mensaje de error
        echo "Error al agregar la venta.";
    }
} else {
    echo "Error al agregar la venta.";
}
?>
