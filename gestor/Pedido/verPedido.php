<?php
// basedatos.php
include '../../basedatos/basedatos.php';

if (isset($_GET['email']) && isset($_GET['cod_pedido'])) {
    $email = $_GET['email'];
    $cod_pedido = $_GET['cod_pedido'];

    // Aquí puedes utilizar $email y $cod_pedido según tus necesidades
} else {
    // Manejo de error si los parámetros no están presentes
    echo "Error: Parámetros faltantes.";
}
// Obtener todos los kits reservados
$kitsReservados = obtenerKitsReservados($email, $cod_pedido);

$clienteDatos = obtenerDatosCliente($email, $cod_pedido);

// Función para obtener los datos del cliente
function obtenerDatosCliente($email, $cod_pedido){
  global $mysqli;

  // Consulta SQL para obtener todos los datos del cliente
  $consultaDatosCliente = "SELECT pedidos.ID_PEDIDO, pedidos.ID_CLIENTE, pedidos.FECHA_PEDIDO, 
  cliente.NOMBRE, cliente.APELLIDO, cliente.EMAIL
  FROM pedidos
  JOIN cliente ON pedidos.ID_CLIENTE = cliente.ID_CLIENTE
  WHERE cliente.EMAIL = '$email'
  AND pedidos.ID_PEDIDO = $cod_pedido;";

  // Ejecutar la consulta
  $resultado = $mysqli->query($consultaDatosCliente);

  // Verificar si hay resultados
  if ($resultado) {
      // Obtener los datos del cliente como un array asociativo
      $cliente = $resultado->fetch_all(MYSQLI_ASSOC);

      // Liberar el resultado
      $resultado->free();

      return $cliente;
  } else {
      // Manejar el error si la consulta no fue exitosa
      echo "Error en la consulta: " . $mysqli->error;
      return [];
  }
}

// Función para obtener los kits reservados por el cliente
// Función para obtener los kits reservados por el cliente
// Función para obtener los kits reservados por el cliente
function obtenerKitsReservados($email, $cod_pedido) {
  global $mysqli;

  // Consulta SQL para obtener todos los kits reservados, incluyendo la cantidad y la imagen
  $consultaKitsReservados = "SELECT k.ID_KIT, k.NOMBRE, k.DESCRIPCION, k.PRECIO, k.STOCK, ik.URL AS IMAGEN, dp.CANTIDAD
  FROM cliente c
  JOIN pedidos p ON c.ID_CLIENTE = p.ID_CLIENTE
  JOIN detalle_pedidos dp ON p.ID_PEDIDO = dp.ID_PEDIDO
  JOIN kits k ON dp.ID_KIT = k.ID_KIT
  LEFT JOIN imagenes_kits ik ON k.ID_KIT = ik.ID_KIT
  WHERE c.EMAIL = '$email' AND p.ID_PEDIDO = $cod_pedido;";

  // Ejecutar la consulta
  $resultado = $mysqli->query($consultaKitsReservados);

  // Verificar si hay resultados
  if ($resultado) {
      // Obtener los kits reservados como un array asociativo
      $kits = $resultado->fetch_all(MYSQLI_ASSOC);

      // Liberar el resultado
      $resultado->free();

      return $kits;
  } else {
      // Manejar el error si la consulta no fue exitosa
      echo "Error en la consulta: " . $mysqli->error;
      return [];
  }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script>
        // Incluye el valor de $cod_pedido en el código JavaScript
        var cod_pedido = <?php echo json_encode($cod_pedido); ?>;
    </script>
    <style>
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    align-items: center;
    margin-top: 100px; /* Espacio pequeño en la parte superior */
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    height: 100vh;  /* Asegura que el body ocupe toda la pantalla */
    display: flex;
    justify-content: center;  /* Centra horizontalmente */
    align-items: center;  /* Centra verticalmente */
    flex-direction: column;  /* Asegura que los elementos se alineen en columna */
    margin: 0;
}

h2 {
    text-align: center;
    font-size: 2rem;
    color: #333;
    margin-bottom: 20px;
}

.contenedorDatos {
    display: inline-block;
    color: black;
    background: #76D7C4;
    border: solid 0.45rem black;
    border-radius: 15px;
    padding: 1.5rem;
    margin: 2rem auto;  /* Centra el contenedor y le da márgenes */
    text-align: center;
}

#boton_cancelar {
    font-size: 17px;
    padding: 0.5em 2em;
    border: transparent;
    box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4);
    background: #C0392B;
    color: white;
    margin: 2em;
    border-radius: 4px;
    display: inline-block;
}

#boton_cancelar:hover {
    background: #E74C3C;
}

#boton_cancelar:active {
    transform: translate(0em, 0.2em);
}

#modal {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: white;
    padding: 20px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    border-radius: 8px;
    text-align: center;
}

#overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
}

ul {
    list-style-type: none;
    padding: 0;
    margin: 20px auto;
    max-width: 900px;
}

li {
    background-color: #fff;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

img {
    max-width: 100%;
    width: 100%;
    object-fit: cover;
    transition: all 0.2s ease;
}

ul:is(:hover, :focus-within) img {
    opacity: calc(0.1 + (var(--active-lerp, 0) * 0.9));
    filter: grayscale(calc(1 - var(--active-lerp, 0)));
}

:root {
    --lerp-0: 1;
    --lerp-1: 0.5787037;
    --lerp-2: 0.2962963;
    --lerp-3: 0.125;
    --lerp-4: 0.037037;
    --lerp-5: 0.0046296;
    --lerp-6: 0;
}

a {
    outline-offset: 4px;
}

li {
    flex: calc(0.1 + (var(--active-lerp, 0) * 1));
    transition: flex 0.2s ease;
}

li:is(:hover, :focus-within) {
    --active-lerp: var(--lerp-0);
    z-index: 7;
}

li:has( + li:is(:hover, :focus-within)),
li:is(:hover, :focus-within) + li {
    --active-lerp: var(--lerp-1);
    z-index: 6;
}

li:has( + li + li:is(:hover, :focus-within)),
li:is(:hover, :focus-within) + li + li {
    --active-lerp: var(--lerp-2);
    z-index: 5;
}

li:has( + li + li + li:is(:hover, :focus-within)),
li:is(:hover, :focus-within) + li + li + li {
    --active-lerp: var(--lerp-3);
    z-index: 4;
}

li:has( + li + li + li + li:is(:hover, :focus-within)),
li:is(:hover, :focus-within) + li + li + li + li {
    --active-lerp: var(--lerp-4);
    z-index: 3;
}

li:has( + li + li + li + li + li:is(:hover, :focus-within)),
li:is(:hover, :focus-within) + li + li + li + li + li {
    --active-lerp: var(--lerp-5);
    z-index: 2;
}

li:has( + li + li + li + li + li + li:is(:hover, :focus-within)),
li:is(:hover, :focus-within) + li + li + li + li + li + li {
    --active-lerp: var(--lerp-6);
    z-index: 1;
}

.cta {
    --shadowColor: 187 60% 40%;
    display: flex;
    margin-left: 80px;
    background: hsl(187 70% 85%);
    width: 90%;
    box-shadow: 0.65rem 0.65rem 0 hsl(var(--shadowColor) / 1);
    border-radius: 0.8rem;
    overflow: hidden;
    border: 0.5rem solid;
}

.cta__text-column {
    font-family: 'Verdana';
    padding: min(2rem, 5vw) min(2rem, 5vw) min(2.5rem, 5vw);
    flex: 1 0 50%;
}

.cta__text-column > * + * {
    margin: min(1.5rem, 2.5vw) 0 0 0;
}

.cta a {
    display: inline-block;
    color: black;
    padding: 0.5rem 1rem;
    font-weight: 600;
    border-radius: 5rem;
    background: #52b1bc;
    transition: background-color 0.2s ease;
}

.cta a:hover {
    background: #149fa7;
}

h3 {
    font-size: 1.5rem;
    color: #2a2a2a;
    margin-bottom: 10px;
}

p {
    color: #555;
    font-size: 1rem;
    margin-bottom: 10px;
}

strong {
    color: #333;
}

img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin-top: 10px;
}

p.no-image {
    font-style: italic;
    color: #888;
}

img {
    display: block;
    margin: 10px 0;
    border-radius: 8px;
    width: 100%;
    max-width: 400px;
    height: auto;
}
#salir {
    background-color: #e74c3c; /* Color de fondo rojo */
    color: white; /* Texto blanco */
    font-size: 1.2rem; /* Tamaño de texto */
    padding: 12px 24px; /* Relleno alrededor del texto */
    border: none; /* Sin borde */
    border-radius: 8px; /* Bordes redondeados */
    cursor: pointer; /* Aparece el puntero al pasar por encima */
    transition: background-color 0.3s, transform 0.2s; /* Transiciones para los efectos */
}

#salir:hover {
    background-color: #c0392b; /* Color de fondo más oscuro al pasar el ratón */
}

#salir:active {
    transform: scale(0.98); /* Efecto de reducción al presionar */
}

#salir:focus {
    outline: none; /* Eliminar el contorno al hacer clic */
}


    </style>
    <title>Detalle del Pedido</title>
</head>
<body>
    <div class="contenedorDatos">
        <h2>Detalles del Pedido</h2>
        <?php if (!empty($clienteDatos)) : ?>
            <?php foreach ($clienteDatos as $cliente) : ?>
                <p><strong>Nombre:</strong> <?php echo $cliente['NOMBRE'] . " " . $cliente['APELLIDO']; ?></p>
                <p><strong>Email:</strong> <?php echo $cliente['EMAIL']; ?></p>
                <p><strong>Fecha de Pedido:</strong> <?php echo $cliente['FECHA_PEDIDO']; ?></p>
                <p><strong>ID Pedido:</strong> <?php echo $cliente['ID_PEDIDO']; ?></p>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No se encontraron datos del cliente.</p>
        <?php endif; ?>

        <h2>Kits Reservados</h2>
          <?php if (!empty($kitsReservados)) : ?>
              <ul>
                  <?php foreach ($kitsReservados as $kit) : ?>
                      <li>
                          <h3><?php echo $kit['NOMBRE']; ?></h3>
                          <p><strong>Descripción:</strong> <?php echo $kit['DESCRIPCION']; ?></p>
                          <p><strong>Precio:</strong> $<?php echo number_format($kit['PRECIO'], 2); ?></p>
                          <p><strong>Cantidad reservada:</strong> <?php echo $kit['CANTIDAD']; ?></p>
                          
                          <!-- Mostrar la imagen del kit -->
                          <?php if (!empty($kit['IMAGEN'])): ?>
                              <p><strong>Imagen:</strong></p>
                              <img src="<?php echo $kit['IMAGEN']; ?>" alt="<?php echo $kit['NOMBRE']; ?>" class="kit-image">
                          <?php else: ?>
                              <p class="no-image">No hay imagen disponible para este kit.</p>
                          <?php endif; ?>
                      </li>
                  <?php endforeach; ?>
              </ul>
          <?php else: ?>
              <p>No se encontraron kits reservados.</p>
          <?php endif; ?>

    </div>
    <button id="salir" onclick="window.location.href = '../../cansrobotik/site/index.html';">Salir</button>
    

</body>
</html>
