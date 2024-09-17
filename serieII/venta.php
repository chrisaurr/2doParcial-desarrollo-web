<?php
include 'conexion.php';

class Venta {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    // Obtener una venta específica por ID
    public function obtenerUnaVenta($id_venta) {
        // Realiza una consulta SQL
        $query = "SELECT * FROM ventas WHERE id_venta = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id_venta);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $venta = $resultado->fetch_assoc();
            $resultado->free(); // Liberar el resultado
            return $venta;
        } else {
            echo "Error al obtener la venta: " . $this->conexion->error;
            return null;
        }
    }

    // Listar todas las ventas
    public function listarVentas() {
        $ventas = array();
        // Realiza una consulta SQL
        $query = "SELECT * FROM venta";
        $resultado = $this->conexion->query($query);

        if ($resultado) {
            while ($fila = $resultado->fetch_assoc()) {
                $ventas[] = $fila;
            }
            $resultado->free(); // Liberar el resultado
        } else {
            echo "Error al listar ventas: " . $this->conexion->error;
        }

        return $ventas;
    }

    // Agregar una nueva venta
    public function agregarVenta($referencia, $tipo_gasolina, $cantidad, $precio) {
        $query = "INSERT INTO venta (referencia, tipo_gasolina, cantidad, precio) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("ssii", $referencia, $tipo_gasolina, $cantidad, $precio);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error al agregar la venta: " . $stmt->error;
            return false;
        }
    }

    // Actualizar una venta existente
    public function actualizarVenta($id_venta, $referencia, $tipo_gasolina, $cantidad, $precio) {
        $query = "UPDATE ventas SET referencia = ?, tipo_gasolina = ?, cantidad = ?, precio = ? WHERE id_venta = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("ssiii", $referencia, $tipo_gasolina, $cantidad, $precio, $id_venta);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error al actualizar la venta: " . $stmt->error;
            return false;
        }
    }

    // Eliminar una venta
    public function eliminarVenta($id_venta) {
        $query = "DELETE FROM ventas WHERE id_venta = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id_venta);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error al eliminar la venta: " . $stmt->error;
            return false;
        }
    }
}
?>
