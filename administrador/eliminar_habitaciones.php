<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

include 'basedatos/basedatos.php';

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$alerta = ''; // Variable para mostrar alertas

// Verificar si se ha enviado una solicitud para borrar una habitación
if (isset($_GET['borrar_habitacion'])) {
    $id_habitacion = $_GET['borrar_habitacion'];
    $alerta = borrarHabitacion($id_habitacion, $conn);
}

// Obtener la lista de habitaciones
$habitaciones = obtenerHabitaciones($conn);

// Función para obtener la lista de habitaciones
function obtenerHabitaciones($conn) {
    $consulta = "SELECT * FROM HABITACIONES";
    $resultado = $conn->query($consulta);

    $habitaciones = array();
    while ($habitacion = $resultado->fetch_assoc()) {
        $habitaciones[] = $habitacion;
    }

    return $habitaciones;
}

// Función para borrar una habitación por ID
function borrarHabitacion($id_habitacion, $conn) {
    // Verificar si la habitación está reservada en la tabla habitacion_reserva
    $stmt_check = $conn->prepare("SELECT 1 FROM habitacion_reserva WHERE ID_HABITACION = ?");
    if (!$stmt_check) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    $stmt_check->bind_param("i", $id_habitacion);
    $stmt_check->execute();
    $stmt_check->store_result();

    // Si el resultado tiene alguna fila, significa que está reservada
    if ($stmt_check->num_rows > 0) {
        $stmt_check->close();
        return "<div class='alert alert-danger' role='alert'>No se puede eliminar la habitación, está reservada.</div>";
    }

    // Eliminar imágenes asociadas en imagenes_habitaciones
    $stmt2 = $conn->prepare("DELETE FROM imagenes_habitaciones WHERE id_habitacion = ?");
    $stmt2->bind_param("i", $id_habitacion);
    $stmt2->execute();
    $stmt2->close();

    // Eliminar la habitación
    $stmt_delete = $conn->prepare("DELETE FROM habitaciones WHERE ID_HABITACION = ?");
    $stmt_delete->bind_param("i", $id_habitacion);
    $stmt_delete->execute();
    $stmt_delete->close();

    // Redirigir a la misma página después de borrar
    header("Location: eliminar_habitaciones.php?borrado=1");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Habitaciones</title>
    <link rel="stylesheet" href="styles2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <a href="inicioCRUD.php" class="btn btn-primary position-absolute top-0 start-0 m-4">Regresar</a>
        <h1 class="text-center mt-4">Eliminar Habitaciones</h1>
        
        <!-- Mostrar las alertas si es necesario -->
        <?php
        if ($alerta) {
            echo $alerta;
        } else if (isset($_GET['borrado']) && $_GET['borrado'] == 1) {
            echo "<div class='alert alert-success' role='alert'>Habitación eliminada correctamente.</div>";
        }
        ?>

        <!-- Mostrar la lista de habitaciones -->
        <div class="table-responsive mt-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Descripción</th>
                        <th>Precio por Noche</th>
                        <th>Capacidad</th>
                        <th>Camas</th>
                        <th>Baño</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($habitaciones as $habitacion): ?>
                        <tr>
                            <td><?php echo $habitacion['ID_HABITACION']; ?></td>
                            <td><?php echo $habitacion['TIPO']; ?></td>
                            <td><?php echo $habitacion['DESCRIPCION']; ?></td>
                            <td><?php echo $habitacion['PRECIOPORNOCHE']; ?></td>
                            <td><?php echo $habitacion['CAPACIDAD']; ?></td>
                            <td><?php echo $habitacion['CAMAS']; ?></td>
                            <td><?php echo $habitacion['BANO']; ?></td>
                            <td>
                                <a href="?borrar_habitacion=<?php echo $habitacion['ID_HABITACION']; ?>" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas borrar esta habitación?')">Borrar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
