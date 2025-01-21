<?php
require_once("dbconnect.php");

// Verifica si se enviaron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"]) || empty($_POST["comment"])) {
        echo "error";
    } else {
        $name = $_POST["name"];
        $comment = $_POST["comment"];
        $stars = isset($_POST["stars"]) ? intval($_POST["stars"]) : 0;

        // Validar entrada
        if (!preg_match("/^[a-zA-Z ]*$/", $name) || !preg_match("/^[a-zA-Z0-9,.!? ]*$/", $comment)) {
            echo "error";
        } else {
            $date = date('Y-m-d H:i:s');

            // Inserta el comentario
            $query = "INSERT INTO comentarios (COMENTARIO, COMENTARIO_NOMBRE, FECHA, ESTRELLAS) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sssi", $comment, $name, $date, $stars);

            if ($stmt->execute()) {
                echo "success";
            } else {
                echo "Error al guardar el comentario: " . $stmt->error;
            }
        }
    }
} else {
    echo "error";
}
?>
