<?php
include '../../../basedatos/basedatos.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

// Recuperar la ID del pedido desde la URL (suponiendo que se pasa como parámetro)
$id_pedido = $_GET['id_pedido']; // Asegúrate de validar y sanitizar este valor

// Consulta SQL para obtener detalles de cliente, pedido y pago
$consultaPedido = "SELECT c.NOMBRE, c.APELLIDO, c.CELULAR, c.EMAIL, p.ID_PEDIDO, p.FECHA_PEDIDO, p.ESTADO_PEDIDO, pg.MONTO, pg.METODO_PAGO, pg.FECHA_PAGO
                   FROM cliente c
                   JOIN pedidos p ON c.ID_CLIENTE = p.ID_CLIENTE
                   LEFT JOIN pagos pg ON p.ID_PEDIDO = pg.ID_PEDIDO
                   WHERE p.ID_PEDIDO = ?";

// Usar consulta preparada para seguridad
$stmt = $mysqli->prepare($consultaPedido);
$stmt->bind_param("i", $id_pedido); // Usar el ID del pedido
$stmt->execute();

// Obtener resultados
$resultado = $stmt->get_result();
// Verificar si hay resultados
if ($resultado->num_rows > 0) {
  // Mostrar detalles de la reserva y número de habitación
  $pedido = $resultado->fetch_assoc();
  ?>
  
     
 
  <?php
} else {
  // No se encontraron resultados, manejar el caso según sea necesario
  echo "Error: No se encontraron detalles del pedido.";
}


// Cerrar la conexión y liberar recursos
$stmt->close();
$mysqli->close();
?>


<!-- icon list--><!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <!-- Site Title-->
    <title>Pedido exitoso</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="../images/favicon.ico" type="../image/x-icon">
    <link rel="stylesheet" href="../css/boton_hotel.css">
    <!-- Stylesheets-->
    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery (required for Bootstrap JS) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<!-- Popper.js (required for Bootstrap JS) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato:400,700,400italic%7CPoppins:300,400,500,700">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/header_footer.css">
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
    <style>
        .miniatura-item {
            transition: transform 0.2s ease-in-out;
        }

        .miniatura-item:hover {
            transform: scale(1.1);
        }
    </style>
     <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 50px;
        }

        h1 {
            color: #4CAF50;
        }

        .confirmation-container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        p {
            color: #333;
            font-size: 18px;
        }

        .thank-you-message {
            font-size: 24px;
            font-weight: bold;
            color: #4CAF50;
            margin-top: 20px;
        }
    </style>
    </head>
  <body>
    <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="../images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <!-- Page-->
    <div class="text-center page"><a class="banner banner-top" href="https://www.templatemonster.com/website-templates/monstroid2.html" target="_blank"><img src="../images/monstroid.jpg" alt="" height="0"></a>
      
        <!-- Page Header-->
      <!-- Page Header-->
      <header class="page-header" style="padding-bottom: 24px">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-default-with-top-panel" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fullwidth" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fullwidth" data-lg-device-layout="rd-navbar-fullwidth" data-md-stick-up-offset="90px" data-lg-stick-up-offset="150px" data-stick-up="true" data-sm-stick-up="true" data-md-stick-up="true" data-lg-stick-up="true">
            <div class="rd-navbar-top-panel rd-navbar-collapse">
              <div class="rd-navbar-top-panel-inner">
                <div class="left-side">
                 <!--iba redes-->
                 <div class="contact-info">
                  <div class="unit unit-middle unit-horizontal unit-spacing-xs">
                    <div class="unit__left"><span class="icon icon-primary text-middle mdi mdi-phone"></span></div>
                    <div class="unit__body"><a class="text-middle" href="tel:#">+ (593) 939798261</a></div>
                  </div>
                </div>
                </div>
                <div class="center-side">
                  <!-- RD Navbar Brand-->
                  <!--logo-->
                  <div class="rd-navbar-brand fullwidth-brand"><a class="brand-name" href="index.html"><img src="../imagenes/MARCA-CANS-Y-ROBOTIK-WORLD.png" alt="" width="400" height="400"/></a></div>
                </div>
                <div class="right-side">
                  <!-- Contact Info-->
                  <ul class="social">
    
                    <li class="social-item">
                      <a class="social-link" href="https://www.facebook.com/CansCapacitacionNacional?locale=es_LA"  target="_blank">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M9.19795 21.5H13.198V13.4901H16.8021L17.198 9.50977H13.198V7.5C13.198 6.94772 13.6457 6.5 14.198 6.5H17.198V2.5H14.198C11.4365 2.5 9.19795 4.73858 9.19795 7.5V9.50977H7.19795L6.80206 13.4901H9.19795V21.5Z" fill="currentColor"></path>
                        </svg>
                      </a>
                    </li>
                    <li class="social-item">
                      <a class="social-link" href="https://www.youtube.com/@corporacionacademicacans207" target="_blank">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M21.8 8.001c-.195-1.469-.762-2.745-1.989-3.413-1.992-1.097-9.811-1.097-9.811-1.097s-7.82 0-9.81 1.097C1.962 5.256 1.395 6.532 1.2 8.001.94 9.975.94 12.001.94 12.001s0 2.026.26 4c.195 1.469.762 2.745 1.989 3.413 1.992 1.097 9.81 1.097 9.81 1.097s7.82 0 9.811-1.097c1.227-.668 1.794-1.944 1.989-3.413.26-1.974.26-4 .26-4s0-2.026-.26-4zm-12.8 6.64V9.36l5.2 2.64-5.2 2.64z" fill="currentColor"></path>
                        </svg>
                      </a>
                    </li>
                    <li class="social-item">
                      <a class="social-link"  href="mailto:corpcans@cans-robotik.com"  target="_blank">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M6 12C6 15.3137 8.68629 18 12 18C14.6124 18 16.8349 16.3304 17.6586 14H12V10H21.8047V14H21.8C20.8734 18.5645 16.8379 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C15.445 2 18.4831 3.742 20.2815 6.39318L17.0039 8.68815C15.9296 7.06812 14.0895 6 12 6C8.68629 6 6 8.68629 6 12Z" fill="currentColor"></path>
                        </svg>
                      </a>
                    </li>
                    <li class="social-item">
                      <a class="social-link" href="https://www.instagram.com/cans_corporacion_academica/"  target="_blank">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M12 7C9.23858 7 7 9.23858 7 12C7 14.7614 9.23858 17 12 17C14.7614 17 17 14.7614 17 12C17 9.23858 14.7614 7 12 7ZM9 12C9 13.6569 10.3431 15 12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12Z" fill="currentColor"></path>
                          <path d="M18 5C17.4477 5 17 5.44772 17 6C17 6.55228 17.4477 7 18 7C18.5523 7 19 6.55228 19 6C19 5.44772 18.5523 5 18 5Z" fill="currentColor"></path>
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M5 1C2.79086 1 1 2.79086 1 5V19C1 21.2091 2.79086 23 5 23H19C21.2091 23 23 21.2091 23 19V5C23 2.79086 21.2091 1 19 1H5ZM19 3H5C3.89543 3 3 3.89543 3 5V19C3 20.1046 3.89543 21 5 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3Z" fill="currentColor"></path>
                        </svg>
                      </a>
                    </li>
                  </ul>

                </div>
              </div>
            </div>
            <div class="rd-navbar-inner">
              <!-- RD Navbar Panel-->
              <div class="rd-navbar-panel">
                <!-- RD Navbar Toggle-->
                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                <!-- RD Navbar collapse toggle-->
                <button class="rd-navbar-collapse-toggle" data-rd-navbar-toggle=".contact-info"><span></span></button>
                <!-- RD Navbar Brand-->
                <div class="rd-navbar-brand mobile-brand"><a class="brand-name" href="index.html"><img src="imagenes/MARCA-CANS-Y-ROBOTIK-WORLD.png" alt="" width="100" height="48"/></a></div>
              </div>
              <div class="rd-navbar-aside-right">
                <div class="rd-navbar-nav-wrap">
                  <div class="rd-navbar-nav-scroll-holder">
                    <ul class="rd-navbar-nav">
                      <li class="active"><a href="index.html">Inicio</a>
                      </li>
                      <li><a href="../about-us.html">Sobre Nosotros</a>
                      </li>
                      <li><a href="../galeria.html">Galeria</a></li>
                      <li><a href="../contacts.html">Contactanos</a>
                      </li>
                      <li><a href="../comentarios.html">Comentarios</a></li>
                      <li><a href="../productos.php">Productos</a>
                      </li>
                      <li><a href="../../../gestor/logger.php">Busca tu pedido</a></li>
                      <li><a href="../../../gestor/logger.php">Busca tu pedido</a></li>
                    </li>              
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>

      <div class="confirmation-container">
    <h1>¡Pedido Exitoso!</h1>
    <p>Tu pedido ha sido pagado con éxito.</p>
    <p>Los detalles del pedido han sido enviados a su correo electrónico.</p>

    <!-- Mostrar los detalles del cliente, pedido y pago -->
    <p><strong>Nombre:</strong> <?php echo $pedido['NOMBRE']; ?></p>
    <p><strong>Apellido:</strong> <?php echo $pedido['APELLIDO']; ?></p>
    <p><strong>Celular:</strong> <?php echo $pedido['CELULAR']; ?></p>
    <p><strong>Email:</strong> <?php echo $pedido['EMAIL']; ?></p>
    <p><strong>Código de tu pedido:</strong> <?php echo $pedido['ID_PEDIDO']; ?></p>
    <p><strong>Fecha de Pedido:</strong> <?php echo $pedido['FECHA_PEDIDO']; ?></p>
    <p><strong>Estado de Pedido:</strong> <?php echo $pedido['ESTADO_PEDIDO']; ?></p>
    <p><strong>Método de Pago:</strong> <?php echo $pedido['METODO_PAGO']; ?></p>
    <p><strong>Fecha de Pago:</strong> <?php echo $pedido['FECHA_PAGO']; ?></p>
    

    <div class="thank-you-message">¡Gracias por elegir nuestros productos!</div>

    <p>Regresa a nuestra página web pulsando aquí:</p>
    <button class="button" data-text="Awesome" onclick="window.location.href='../../site';">
        <span class="actual-text">&nbsp;RobotikWorld&nbsp;</span>
        <span aria-hidden="true" class="hover-text">&nbsp;Cans-robotik&nbsp;</span>
    </button>
</div>

    <?php
    // Configura la instancia de PHPMailer
$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // Cambia esto con la información de tu servidor SMTP
    $mail->SMTPAuth   = true;
    $mail->Username   = ''; // Cambia esto con tu dirección de correo
    $mail->Password   = ''; // Cambia esto con tu contraseña
    $mail->SMTPSecure = 'tls'; // Puedes cambiarlo a 'ssl' si es necesario
    $mail->Port       = 587; // Puedes cambiar el puerto según la configuración de tu servidor
    
   
    // Configuración del correo
    $mail->setFrom('adrianmolina410@gmail.com', 'Cans-robotik'); // Dirección de correo del remitente
    $mail->addAddress($pedido['EMAIL'], $pedido['NOMBRE']); // Dirección de correo del cliente

    $mail->Subject = 'Detalles de la reserva';
    $mail->Body = "Detalles de la reserva:\n\n"
            . "Nombre: " . $pedido['NOMBRE'] . "\n"
            . "Apellido: " . $pedido['APELLIDO'] . "\n"
            . "Celular: " . $pedido['CELULAR'] . "\n"
            . "Email: " . $pedido['EMAIL'] . "\n"
            . "Codigo del pedido: " . $pedido['ID_PEDIDO'] . "\n"
            . "Fecha del pedido: " . $pedido['FECHA_PEDIDO'] . "\n"
            . "Estado del pedido: " . $pedido['ESTADO_PEDIDO'] . "\n"
            . "Método de Pago: " . $pedido['METODO_PAGO'] . "\n"
            . "Fecha de Pago: " . $pedido['FECHA_PAGO'] . "\n";
    // Envía el correo
    $mail->send();
   
} catch (Exception $e) {
    echo 'Error al enviar el correo: ', $mail->ErrorInfo;
}
?>
   

  <!-- Page Footer-->
  <footer class="page-footer text-left text-sm-left"> 

        <div class="shell-wide">
        
            <div class="page-footer-minimal">
                <div class="shell-wide">
                    <div class="range range-50">
                        <div class="cell-sm-6 cell-md-3 cell-lg-4 wow fadeInUp" data-wow-delay=".1s">
                            <div class="page-footer-minimal-inner">
                                <h4 class="footer-h4">HORARIO DE APERTURA</h4>
                                <ul class="list-unstyled">
                                    <li>
                                        <div class="group-xs"> 
                                            <div>
                                                <dl class="list-desc">
                                                    <dt>Días laborables: </dt>
                                                    <dd class="text-gray-darker"><span>8:00–17:00</span></dd>
                                                </dl>
                                            </div>
                                            <div>
                                                <dl class="list-desc">
                                                    <dt>Fines de semana: </dt>
                                                    <dd class="text-gray-darker"><span>9:00–16:00</span></dd>
                                                </dl>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <p class="rights"><span>&copy;&nbsp;</span><span>2024</span><span>&nbsp;</span><span class="copyright-year"></span>Corporación Cans. Reservados todos los derechos.<br><br> Diseñado por:<br> &#9657; Allan Molina</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="cell-sm-6 cell-md-5 cell-lg-4 wow fadeInUp" data-wow-delay=".2s">
                            <div class="page-footer-minimal-inner">
                                <h4 class="footer-h4">DIRECCIÓN</h4>
                                <ul class="list-unstyled">
                                    <li>
                                        <dl class="list-desc">
                                            <dt><span class="icon icon-sm mdi mdi-phone"></span></dt>
                                            <dd class="text-gray-darker">Llamanos: <a class="link link-gray-darker" href="tel:#">+ (593) 0939798261</a>
                                            </dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl class="list-desc">
                                            <dt><span class="icon icon-sm mdi mdi-map-marker"></span></dt>
                                            <dd><a class="link link-gray-darker" href="#">AV. DE LOS SHYRIS Y ENRIQUE TELLO AV. DE LOS SHYRIS Y ENRIQUE TELLO AV. DE LOS SHYRIS, Y, Sangolquí</a></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <p></p>
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9489.27207359843!2d-78.4444580777004!3d-0.3415386443264915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d5bce8b0ff3b9d%3A0x28148d6f9b82f783!2sCANS%20Corporaci%C3%B3n%20Acad%C3%A9mica!5e0!3m2!1ses-419!2sec!4v1723264039646!5m2!1ses-419!2sec" width="300" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                        <!-- Nuevo div con los botones -->

                        <div class="cell-sm-6 cell-md-5 cell-lg-4 wow fadeInUp" data-wow-delay=".2s">
                            <div class="page-footer-minimal-inner">
                                <h4 class="footer-h4" >CONTACTANOS</h4>
                                <div class="main">
                                  <div class="up">
                                    <button class="card1" onclick="window.location.href='https://www.instagram.com/cans_corporacion_academica/'">
                                          <svg class="instagram" fill-rule="nonzero" height="30px" width="30px" viewBox="0,0,256,256" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                                              <g style="mix-blend-mode: normal" text-anchor="none" font-size="none" font-weight="none" font-family="none" stroke-dashoffset="0" stroke-dasharray="" stroke-miterlimit="10" stroke-linejoin="miter" stroke-linecap="butt" stroke-width="1" stroke="none" fill-rule="nonzero">
                                                  <g transform="scale(8,8)">
                                                      <path d="M11.46875,5c-3.55078,0 -6.46875,2.91406 -6.46875,6.46875v9.0625c0,3.55078 2.91406,6.46875 6.46875,6.46875h9.0625c3.55078,0 6.46875,-2.91406 6.46875,-6.46875v-9.0625c0,-3.55078 -2.91406,-6.46875 -6.46875,-6.46875zM11.46875,7h9.0625c2.47266,0 4.46875,1.99609 4.46875,4.46875v9.0625c0,2.47266 -1.99609,4.46875 -4.46875,4.46875h-9.0625c-2.47266,0 -4.46875,-1.99609 -4.46875,-4.46875v-9.0625c0,-2.47266 1.99609,-4.46875 4.46875,-4.46875zM21.90625,9.1875c-0.50391,0 -0.90625,0.40234 -0.90625,0.90625c0,0.50391 0.40234,0.90625 0.90625,0.90625c0.50391,0 0.90625,-0.40234 0.90625,-0.90625c0,-0.50391 -0.40234,-0.90625 -0.90625,-0.90625zM16,10c-3.30078,0 -6,2.69922 -6,6c0,3.30078 2.69922,6 6,6c3.30078,0 6,-2.69922 6,-6c0,-3.30078 -2.69922,-6 -6,-6zM16,12c2.22266,0 4,1.77734 4,4c0,2.22266 -1.77734,4 -4,4c-2.22266,0 -4,-1.77734 -4,-4c0,-2.22266 1.77734,-4 4,-4z"></path>
                                                  </g>
                                              </g>
                                          </svg>
                                      </button>
                                      <button class="card2" onclick="window.location.href='https://www.facebook.com/CansCapacitacionNacional'">
                                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="24" class="facebook" width="24">
                                              <path d="M9.19795 21.5H13.198V13.4901H16.8021L17.198 9.50977H13.198V7.5C13.198 6.94772 13.6457 6.5 14.198 6.5H17.198V2.5H14.198C11.4365 2.5 9.19795 4.73858 9.19795 7.5V9.50977H7.19795L6.80206 13.4901H9.19795V21.5Z"></path>
                                          </svg>
                                      </button>
                                  </div>
                                  <div class="down">
                                    <button class="card3" onclick="window.location.href='https://wa.me/0939798261'">
                                          <svg width="30" height="30" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="whatsapp">
                                              <path d="M19.001 4.908A9.817 9.817 0 0 0 11.992 2C6.534 2 2.085 6.448 2.08 11.908c0 1.748.458 3.45 1.321 4.956L2 22l5.255-1.377a9.916 9.916 0 0 0 4.737 1.206h.005c5.46 0 9.908-4.448 9.913-9.913A9.872 9.872 0 0 0 19 4.908h.001ZM11.992 20.15A8.216 8.216 0 0 1 7.797 19l-.3-.18-3.117.818.833-3.041-.196-.314a8.2 8.2 0 0 1-1.258-4.381c0-4.533 3.696-8.23 8.239-8.23a8.2 8.2 0 0 1 5.825 2.413 8.196 8.196 0 0 1 2.41 5.825c-.006 4.55-3.702 8.24-8.24 8.24Zm4.52-6.167c-.247-.124-1.463-.723-1.692-.808-.228-.08-.394-.123-.556.124-.166.246-.641.808-.784.969-.143.166-.29.185-.537.062-.247-.125-1.045-.385-1.99-1.23-.738-.657-1.232-1.47-1.38-1.716-.142-.247-.013-.38.11-.504.11-.11.247-.29.37-.432.126-.143.167-.248.248-.413.082-.167.043-.31-.018-.433-.063-.124-.557-1.345-.765-1.838-.2-.486-.404-.419-.557-.425-.142-.009-.309-.009-.475-.009a.911.911 0 0 0-.661.31c-.228.247-.864.845-.864 2.067 0 1.22.888 2.395 1.013 2.56.122.167 1.742 2.666 4.229 3.74.587.257 1.05.408 1.41.523.595.19 1.13.162 1.558.1.475-.072 1.464-.6 1.673-1.178.205-.58.205-1.075.142-1.18-.061-.104-.227-.165-.475-.29Z"></path>
                                          </svg>
                                      </button>
                                      <button class="card4" onclick="window.location.href='mailto:corpcans@cans-robotik.com?subject=Contacto%20desde%20la%20web'">
                                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="24" class="gmail" width="24">
                                              <path d="M6 12C6 15.3137 8.68629 18 12 18C14.6124 18 16.8349 16.3304 17.6586 14H12V10H21.8047V14H21.8C20.8734 18.5645 16.8379 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C15.445 2 18.4831 3.742 20.2815 6.39318L17.0039 8.68815C15.9296 7.06812 14.0895 6 12 6C8.68629 6 6 8.68629 6 12Z"></path>
                                          </svg>
                                      </button>
                                  </div>
                              </div>
                            </div>
                            <p id="textfooter">Encuentranos en todas nuestras redes, siguenos para estar informado de nuestras últimas novedades y ofertas</p>
                        </div>
                        <!-- Fin del nuevo div con los botones -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    </div>
    <!-- PANEL-->
    <!-- END PANEL-->
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- PhotoSwipe Gallery-->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="pswp__bg"></div>
      <div class="pswp__scroll-wrap">
        <div class="pswp__container">
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
          <div class="pswp__top-bar">
            <div class="pswp__counter"></div>
            <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
            <button class="pswp__button pswp__button--share" title="Share"></button>
            <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
            <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
            <div class="pswp__preloader">
              <div class="pswp__preloader__icn">
                <div class="pswp__preloader__cut">
                  <div class="pswp__preloader__donut"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
            <div class="pswp__share-tooltip"></div>
          </div>
          <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
          <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
          <div class="pswp__caption">
            <div class="pswp__caption__cent"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- Javascript-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-DcPgea9PSpwOM3EKiWLPgPUA/IwzXYBzTNn8UezZG6G8tL8foOZ//Cp82Ci9WqLg" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyO8k+5TIxg3jpuDHvjkoWw49tiSM+rL4N" crossorigin="anonymous"></script>
    <script>
        / Agregar efecto de clic a las miniaturas
        document.querySelectorAll('.miniatura-item').forEach(function(miniatura) {
            miniatura.addEventListener('click', function() {
               
            });
        });
    </script>
    
    <script src="../js/core.min.js"></script>
    <script src="../js/script.js"></script>

  </body>
</html>
