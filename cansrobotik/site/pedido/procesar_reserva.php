<?php
include '../../../basedatos/basedatos.php';

// Verificar si se ha recibido la confirmación de PayPal y los datos necesarios por POST
if (isset($_POST['paypal_payment']) && isset($_POST['nombreKit']) && isset($_POST['precioKit']) ) {
    // Recuperar los datos de la reserva
    $nombre = $_POST['nombreKit'];
    $descripcion = $_POST['descripcionKit'];
    $precio = $_POST['precioKit'];
    $id_kit = $_POST['id_kit'];
    $cantidad = $_POST['cantidadKit'];


    // Recuperar los detalles del cliente desde el formulario o la respuesta de PayPal
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];

    // Insertar datos en la tabla cliente
    $stmt = $mysqli->prepare("INSERT INTO cliente (NOMBRE, APELLIDO, CELULAR, EMAIL) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nombre, $apellido, $celular, $email);
    $stmt->execute();
    $id_cliente = $stmt->insert_id;
    $stmt->close();

      // Reducir el stock del kit
      $nuevo_stock = (int)$cantidad - 1;
      $update_stmt = $mysqli->prepare("UPDATE kits SET STOCK = ? WHERE ID_KIT = ?");
      $update_stmt->bind_param("ii", $nuevo_stock, $id_kit);
      $update_stmt->execute();
      $update_stmt->close();

      // Crear el pedido
      $stmt_pedido = $mysqli->prepare("INSERT INTO pedidos (ID_CLIENTE, FECHA_PEDIDO, ESTADO_PEDIDO) VALUES (?, NOW(), 'COMPLETADO')");
      $stmt_pedido->bind_param("i", $id_cliente);
      $stmt_pedido->execute();
      $id_pedido = $stmt_pedido->insert_id;
      $stmt_pedido->close();

      // Registrar el detalle del pedido
      $stmt_detalle = $mysqli->prepare("INSERT INTO detalle_pedidos (ID_PEDIDO, ID_KIT, CANTIDAD) VALUES (?, ?, 1)");
      $stmt_detalle->bind_param("ii", $id_pedido, $id_kit);
      $stmt_detalle->execute();
      $stmt_detalle->close();

      // Registrar el pago
      $stmt_pago = $mysqli->prepare("INSERT INTO pagos (ID_PEDIDO, MONTO, METODO_PAGO, FECHA_PAGO) VALUES (?, ?, 'PayPal', NOW())");
      $stmt_pago->bind_param("id", $id_pedido, $precio);
      $stmt_pago->execute();
      $stmt_pago->close();

      // Confirmar la transacción
      $mysqli->commit();

    // Redirigir a la página de reserva exitosa
    // Redirigir a la página de reserva exitosa con la ID de la reserva
        header("Location: reserva_exitosa.php?id_pedido=" . $id_pedido);
        exit();

} else {
    // Si no se reciben los datos necesarios o no hay confirmación de PayPal, redireccionar o manejar el error según sea necesario
    echo "Error: No se han proporcionado los datos necesarios o no se ha completado la transacción de PayPal.";
    // Añadir mensajes de depuración
    echo "<pre>";
    print_r($_POST); // Imprimir datos recibidos por POST para depuración
    echo "</pre>";
    exit();
}


?>
