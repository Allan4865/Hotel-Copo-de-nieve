<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    header("Location: index.php");
    exit;
}
include 'basedatos/basedatos.php';

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los registros de la tabla pago junto con el nombre y apellido del cliente
$sql = "
    SELECT p.ESTADOPAGO, p.FECHAPAGO, p.ID_PAGO, p.ID_RESERVA, p.METODOPAGO, p.MONTO, 
           c.NOMBRE AS cliente_nombre, c.APELLIDO AS cliente_apellido
    FROM pago p
    INNER JOIN reserva r ON p.ID_RESERVA = r.ID_RESERVA
    INNER JOIN cliente c ON r.ID_CLIENTE = c.ID_CLIENTE
";
$result = $conn->query($sql);

$pagos = array();
if ($result->num_rows > 0) {
    // Obtener cada fila de la tabla y agregarla a la lista de pagos
    while ($row = $result->fetch_assoc()) {
        $pagos[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Pagos</title>
    <link rel="stylesheet" href="styles2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <a href="inicioCRUD.php" class="btn btn-primary position-absolute top-0 start-0 m-4">Regresar</a>
    <div class="container">
        <h1 class="text-center mt-4">Tabla de Pagos</h1>
        <div class="table-responsive mt-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Estado de Pago</th>
                        <th>Fecha de Pago</th>
                        <th>ID de Pago</th>
                        <th>ID de Reserva</th>
                        <th>Método de Pago</th>
                        <th>Monto</th>
                        <th>Cliente</th> <!-- Nueva columna para el cliente -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pagos as $pago): ?>
                        <tr>
                            <td><?php echo $pago['ESTADOPAGO']; ?></td>
                            <td><?php echo $pago['FECHAPAGO']; ?></td>
                            <td><?php echo $pago['ID_PAGO']; ?></td>
                            <td><?php echo $pago['ID_RESERVA']; ?></td>
                            <td><?php echo $pago['METODOPAGO']; ?></td>
                            <td><?php echo $pago['MONTO']; ?></td>
                            <td><?php echo $pago['cliente_nombre'] . ' ' . $pago['cliente_apellido']; ?></td> <!-- Mostrar nombre y apellido del cliente -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
