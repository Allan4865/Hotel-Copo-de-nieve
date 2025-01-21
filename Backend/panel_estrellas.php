<?php
require_once("dbconnect.php"); // Archivo para conectar a la base de datos

header('Content-Type: application/json'); // Establecer encabezado JSON

try {
    // Consulta SQL para seleccionar todas las estrellas de la tabla comentarios
    $query = "SELECT ESTRELLAS FROM comentarios";

    // Ejecutar consulta
    $result = $conn->query($query);

    // Verificar si hay resultados
    if ($result && $result->num_rows > 0) {
        // Arreglo para almacenar las estrellas
        $starsArray = array();

        // Obtener cada fila de resultados y almacenar las estrellas en el arreglo
        while ($row = $result->fetch_assoc()) {
            $starsArray[] = (int)$row['ESTRELLAS']; // Convertir a entero
        }

        // Codificar el arreglo como JSON y enviarlo como respuesta
        echo json_encode($starsArray, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    } else {
        // Si no hay resultados, enviar un mensaje genérico
        http_response_code(404);
        echo json_encode(["error" => "No se encontraron datos de estrellas en la tabla de comentarios."]);
    }
} catch (Exception $e) {
    // Manejo de errores
    http_response_code(500);
    echo json_encode(["error" => "Ocurrió un error en el servidor.", "details" => $e->getMessage()]);
} finally {
    // Cerrar conexión a la base de datos
    $conn->close();
}
?>
