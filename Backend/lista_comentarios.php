<?php
require_once("dbconnect.php");

// Crear un arreglo para almacenar los resultados
$record_set = array();

// Query ajustado para la tabla `comentarios`
$sql = "SELECT * FROM comentarios ORDER BY ID_COMENTARIO ASC";

$result = $conn->query($sql);

// Verificar si hay filas en el resultado
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Agregar cada fila al arreglo de resultados
        array_push($record_set, $row);
    }
}

// Devolver los datos como un JSON
echo json_encode($record_set);

// Cerrar conexión (opcional, buena práctica)
$conn->close();
?>
