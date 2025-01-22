<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.scss">
    <title>Busca tu Pedido</title>
    <style>
      body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: #f4f4f9; /* Fondo claro */
}

.login-form {
    background: #ffffff; /* Fondo blanco */
    padding: 2rem 3rem;
    border-radius: 10px; /* Bordes redondeados */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Sombra sutil */
    width: 100%;
    max-width: 400px;
    text-align: center;
}

h2 {
    font-size: 1.5rem;
    margin-bottom: 1.5rem;
    color: #333; /* Color del texto del título */
}

.flex-row {
    display: flex;
    align-items: center;
    margin-bottom: 1.5rem;
    position: relative;
}

.lf--label svg {
    position: absolute;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
}

.lf--input {
    width: 100%;
    padding: 12px 40px; /* Espacio para el ícono */
    border: 1px solid #ddd; /* Borde claro */
    border-radius: 5px; /* Bordes redondeados */
    font-size: 1rem;
    color: #333;
    background: #f9f9f9; /* Fondo ligero */
    transition: border 0.3s ease, box-shadow 0.3s ease;
}

.lf--input:focus {
    border-color: #3498db; /* Azul en focus */
    box-shadow: 0 0 5px rgba(52, 152, 219, 0.3); /* Sombra azul suave */
    outline: none;
}

.lf--submit {
    background: #3498db; /* Fondo azul */
    color: white;
    font-size: 1rem;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s ease, transform 0.2s ease;
}

.lf--submit:hover {
    background: #2980b9; /* Azul más oscuro al pasar */
}

.lf--submit:active {
    transform: scale(0.98); /* Efecto de clic */
}

    </style>
</head>
<body>
<form class="login-form" action="logval.php" method="post">
  <h2>Busca tu Pedido</h2>
  <div class="flex-row">
    <label class="lf--label" for="email">
      <svg x="0px" y="0px" width="12px" height="13px">
        <path fill="#B1B7C4" d="M8.9,7.2C9,6.9,9,6.7,9,6.5v-4C9,1.1,7.9,0,6.5,0h-1C4.1,0,3,1.1,3,2.5v4c0,0.2,0,0.4,0.1,0.7 C1.3,7.8,0,9.5,0,11.5V13h12v-1.5C12,9.5,10.7,7.8,8.9,7.2z M4,2.5C4,1.7,4.7,1,5.5,1h1C7.3,1,8,1.7,8,2.5v4c0,0.2,0,0.4-0.1,0.6 l0.1,0L7.9,7.3C7.6,7.8,7.1,8.2,6.5,8.2h-1c-0.6,0-1.1-0.4-1.4-0.9L4.1,7.1l0.1,0C4,6.9,4,6.7,4,6.5V2.5z M11,12H1v-0.5 c0-1.6,1-2.9,2.4-3.4c0.5,0.7,1.2,1.1,2.1,1.1h1c0.8,0,1.6-0.4,2.1-1.1C10,8.5,11,9.9,11,11.5V12z"/>
      </svg>
    </label>
    <input id="email" class="lf--input" placeholder="Correo Electrónico" type="text" name="email" required>
  </div>
  <div class="flex-row">
    <label class="lf--label" for="cod_pedido">
      <svg x="0px" y="0px" width="15px" height="5px">
        <g>
          <path fill="#B1B7C4" d="M6,2L6,2c0-1.1-1-2-2.1-2H2.1C1,0,0,0.9,0,2.1v0.8C0,4.1,1,5,2.1,5h1.7C5,5,6,4.1,6,2.9V3h5v1h1V3h1v2h1V3h1 V2H6z M5.1,2.9c0,0.7-0.6,1.2-1.3,1.2H2.1c-0.7,0-1.3-0.6-1.3-1.2V2.1c0-0.7,0.6-1.2,1.3-1.2h1.7c0.7,0,1.3,0.6,1.3,1.2V2.9z"/>
        </g>
      </svg>
    </label>
    <input id="cod_pedido" class="lf--input" placeholder="Código de Pedido" type="number" name="cod_pedido" required>
  </div>
  <input class="lf--submit" type="submit" value="Buscar Pedido">
</form>

</body>
</html>
