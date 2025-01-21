<?php
include '../../../basedatos/basedatos.php';

// Verificar si se reciben los parámetros necesarios
if (isset($_GET['nombre']) && isset($_GET['descripcion']) && isset($_GET['precio'])) {
    $nombreKit = $_GET['nombre'];
    $descripcionKit = $_GET['descripcion'];
    $precioKit = $_GET['precio'];

    // Aquí puedes realizar cualquier lógica adicional que necesites

} else {
    // Si no se proporcionan los parámetros necesarios, manejar el error
    echo "Error: No se han proporcionado los parámetros necesarios para el pedido.";
    exit();
}

// Función para guardar el pedido en la base de datos
function guardarPedido($cliente_id, $nombreKit, $descripcionKit, $precioKit) {
    global $mysqli;

    // Insertar el pedido en la tabla 'pedidos'
    $query = "INSERT INTO pedidos (ID_CLIENTE, FECHA_PEDIDO, ESTADO_PEDIDO) VALUES (?, NOW(), 'PENDIENTE')";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $cliente_id);
    $stmt->execute();

    // Obtener el ID del pedido recién insertado
    $pedido_id = $mysqli->insert_id;

    // Insertar el detalle del pedido en 'detalle_pedidos'
    $queryDetalle = "INSERT INTO detalle_pedidos (ID_PEDIDO, ID_KIT, CANTIDAD) VALUES (?, (SELECT ID_KIT FROM kits WHERE NOMBRE = ?), 1)";
    $stmtDetalle = $mysqli->prepare($queryDetalle);
    $stmtDetalle->bind_param("is", $pedido_id, $nombreKit);
    $stmtDetalle->execute();

    // Registrar el pago si es necesario (aquí agregamos una suposición de pago)
    $queryPago = "INSERT INTO pagos (ID_PEDIDO, MONTO, METODO_PAGO, FECHA_PAGO) VALUES (?, ?, 'PayPal', NOW())";
    $stmtPago = $mysqli->prepare($queryPago);
    $stmtPago->bind_param("id", $pedido_id, $precioKit);
    $stmtPago->execute();

    return $pedido_id;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Pedido</title>
    <script src="https://www.paypal.com/sdk/js?client-id=AfqN64i5tt3K3cwlMxyxGxAqRWV17XV2pyGW7M-CZW_Hds9QhVXKuUcApmXhUo2wr-u8yLow5m33wWzl&currency=USD"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            text-align: center;
            box-sizing: border-box;
        }

        h1 {
            color: #007bff;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        label {
            display: block;
            margin-top: 15px;
            color: #555;
            font-size: 16px;
            text-align: left;
            width: 100%;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        #paypal-button-container {
            display: none; /* Inicialmente oculto */
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Confirmación de Pedido</h1>
        <p><strong>Kit:</strong> <?php echo $nombreKit; ?></p>
        <p><strong>Descripción:</strong> <?php echo $descripcionKit; ?></p>
        <p><strong>Precio:</strong> <?php echo $precioKit; ?></p>

        <!-- Formulario de detalles del cliente -->
        <form id="confirmarPedidoForm" method="post" action="procesar_pedido.php">
            <input type="hidden" name="nombre" value="<?php echo $nombreKit; ?>">
            <input type="hidden" name="descripcion" value="<?php echo $descripcionKit; ?>">
            <input type="hidden" name="precio" value="<?php echo $precioKit; ?>">

            <label for="nombre_cliente">Nombre:</label>
            <input type="text" name="nombre_cliente" required placeholder="Ingrese su nombre">

            <label for="apellido_cliente">Apellido:</label>
            <input type="text" name="apellido_cliente" required placeholder="Ingresa tu apellido">

            <label for="celular_cliente">Celular:</label>
            <input type="text" name="celular_cliente" required placeholder="Ingresa tu numero celular">

            <label for="email_cliente">Email:</label>
            <input type="email" name="email_cliente" required placeholder="alguien@gmail.com">

            <button type="button" onclick="validarYMostrarPaypal()">Confirmar Pedido</button>

            <!-- Campo oculto para indicar que el pago se realizó a través de PayPal -->
            <input type="hidden" name="paypal_payment" value="1">
        </form>

        <div id="paypal-button-container">
            <h4>Para confirmar su pedido, paga con:</h4>
        </div>
    </div>

    <script>
        function validarYMostrarPaypal() {
            if (validarFormulario()) {
                // Deshabilitar el botón después de la validación exitosa
                document.querySelector('#confirmarPedidoForm button').disabled = true;

                // Mostrar el botón de PayPal
                document.getElementById('paypal-button-container').style.display = 'block';

                // Iniciar el flujo de PayPal
                iniciarPaypal();
            }
        }

        function validarFormulario() {
            var inputs = document.querySelectorAll('#confirmarPedidoForm input[required]');
            for (var i = 0; i < inputs.length; i++) {
                if (!inputs[i].value.trim()) {
                    alert('Por favor, complete todos los campos antes de confirmar el pedido.');
                    return false;
                }
            }
            return true;
        }

        function iniciarPaypal() {
            paypal.Buttons({
                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: '<?php echo $precioKit; ?>'
                            }
                        }]
                    });
                },
                onApprove: function(data, actions) {
                    // Después de la aprobación de PayPal, enviar el formulario
                    document.getElementById('confirmarPedidoForm').submit();
                }
            }).render('#paypal-button-container');
        }
    </script>
</body>
</html>
