<?php
class Poste {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    // Agregar un nuevo poste
    public function agregarPoste($no_poste, $direccion, $departamento, $municipio, $referencia, $latitud, $longitud) {
        $query = "INSERT INTO postes (no_poste, direccion, departamento, municipio, referencia, latitud, longitud) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
        
        if ($stmt === false) {
            echo "Error en prepare(): " . $this->conexion->error;
            return false;
        }

        $stmt->bind_param("sssssss", $no_poste, $direccion, $departamento, $municipio, $referencia, $latitud, $longitud);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error al agregar el poste: " . $stmt->error;
            return false;
        }
    }

    // Listar todos los postes
    public function listarPostes() {
        $postes = array();
        $query = "SELECT * FROM postes";
        $resultado = $this->conexion->query($query);

        if ($resultado) {
            while ($fila = $resultado->fetch_assoc()) {
                $postes[] = $fila;
            }
            $resultado->free(); // Liberar el resultado
        } else {
            echo "Error al listar postes: " . $this->conexion->error;
        }

        return $postes;
    }

    // Obtener un poste específico por ID
    public function obtenerUnPoste($id_poste) {
        $query = "SELECT * FROM postes WHERE id_poste = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id_poste);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $poste = $resultado->fetch_assoc();
            $resultado->free(); // Liberar el resultado
            return $poste;
        } else {
            echo "Error al obtener el poste: " . $this->conexion->error;
            return null;
        }
    }

    // Actualizar un poste existente
    public function actualizarPoste($id_poste, $no_poste, $direccion, $departamento, $municipio, $referencia, $latitud, $longitud) {
        $query = "UPDATE postes SET no_poste = ?, direccion = ?, departamento = ?, municipio = ?, referencia = ?, latitud = ?, longitud = ? WHERE id_poste = ?";
        $stmt = $this->conexion->prepare($query);
        
        if ($stmt === false) {
            echo "Error en prepare(): " . $this->conexion->error;
            return false;
        }

        $stmt->bind_param("sssssssi", $no_poste, $direccion, $departamento, $municipio, $referencia, $latitud, $longitud, $id_poste);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error al actualizar el poste: " . $stmt->error;
            return false;
        }
    }

    // Eliminar un poste
    public function eliminarPoste($id_poste) {
        $query = "DELETE FROM postes WHERE id_poste = ?";
        $stmt = $this->conexion->prepare($query);
        
        if ($stmt === false) {
            echo "Error en prepare(): " . $this->conexion->error;
            return false;
        }

        $stmt->bind_param("i", $id_poste);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error al eliminar el poste: " . $stmt->error;
            return false;
        }
    }
}
?>
