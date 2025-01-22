<?php

include '../basedatos/basedatos.php';

// Función para limpiar y validar la entrada del usuario
function limpiar_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Limpiar y validar los datos del formulario
    $email = limpiar_input($_POST["email"]);
    $cod_pedido = limpiar_input($_POST["cod_pedido"]);

    // Consulta para validar si el cliente existe y tiene ese pedido
    $sql = "SELECT p.ESTADO_PEDIDO, p.FECHA_PEDIDO
            FROM cliente c
            JOIN pedidos p ON c.ID_CLIENTE = p.ID_CLIENTE
            WHERE c.EMAIL = '$email' AND p.ID_PEDIDO = $cod_pedido;";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        // El pedido existe para este cliente
        $pedido = $result->fetch_assoc();
        $estado = $pedido['ESTADO_PEDIDO'];
        $fecha_pedido = $pedido['FECHA_PEDIDO'];
        
        // Redirigir a la página con los detalles del pedido
        header("Location: pedido/verPedido.php?cod_pedido=$cod_pedido&email=$email");
        exit();
    } else {
        // El pedido no existe o el correo no está asociado a un cliente con ese pedido
        $error_message = "No se encontró el pedido o el correo no está asociado con este pedido.";
    }
}

// Cerrar la conexión a la base de datos
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de la búsqueda</title>
</head>
<body>
    <?php if (isset($error_message)) { ?>
        <p><?php echo $error_message; ?></p>
        <button onclick="goBack()">Volver</button>
    <?php } ?>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
