-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-01-2025 a las 08:48:54
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `kits`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `ID_CLIENTE` int(11) NOT NULL,
  `NOMBRE` varchar(255) NOT NULL,
  `APELLIDO` varchar(255) NOT NULL,
  `CELULAR` varchar(20) NOT NULL,
  `EMAIL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`ID_CLIENTE`, `NOMBRE`, `APELLIDO`, `CELULAR`, `EMAIL`) VALUES
(1, 'Carlos', 'Ramírez', '0999999991', 'carlos.ramirez@email.com'),
(2, 'Lucía', 'Fernández', '0999999992', 'lucia.fernandez@email.com'),
(3, 'Pedro', 'González', '0999999993', 'pedro.gonzalez@email.com'),
(4, '', '', '', ''),
(5, 'Allan', 'Molina', '0959610833', 'adrianmolina782@gmail.com'),
(6, 'Allan', 'Molinari', '0959610833', 'adrianmolina782@gmail.com'),
(7, 'Allan', 'Molina', '0959610833', 'adrianmolina782@gmail.com'),
(8, 'Allan', 'Molina', '0959610833', 'adrianmolina782@gmail.com'),
(9, 'Adrian', 'Molina', '0959610758', 'adrianmolina410@gmail.com'),
(10, 'Allan', 'Molina', '0959610758', 'adrianmolina410@gmail.com'),
(11, 'Allan', 'Molinari', '0959610758', 'adrianmolina782@gmail.com'),
(12, 'Allan', 'Molina', '0959610833', 'adrianmolina782@gmail.com'),
(13, 'Allan', 'Molina', '0959610833', 'adrianmolina782@gmail.com'),
(14, 'Cristina', 'Molina', '0959610758', 'adrianmolina782@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `ID_COMENTARIO` int(11) NOT NULL,
  `COMENTARIO` text NOT NULL,
  `COMENTARIO_NOMBRE` varchar(255) NOT NULL,
  `FECHA` datetime NOT NULL DEFAULT current_timestamp(),
  `ESTRELLAS` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`ID_COMENTARIO`, `COMENTARIO`, `COMENTARIO_NOMBRE`, `FECHA`, `ESTRELLAS`) VALUES
(7, 'El producto es excelente, cumple con lo prometido.', 'Juan Pérez', '2025-01-20 10:30:00', 5),
(8, 'Buena calidad, pero el precio podría ser más bajo.', 'María López', '2025-01-19 14:45:00', 4),
(9, 'No me gustó, la descripción no coincide con lo recibido.', 'Carlos García', '2025-01-18 18:20:00', 2),
(10, 'Entrega rápida y producto en buen estado, recomendado.', 'Ana Martínez', '2025-01-17 12:00:00', 5),
(11, 'Es funcional, aunque me hubiera gustado más opciones.', 'Luis Gómez', '2025-01-16 09:15:00', 3),
(12, 'Excelente servicio y calidad, compraré nuevamente.', 'Sofía Ramírez', '2025-01-15 16:50:00', 5),
(13, 'El producto llegó tarde, pero funciona bien.', 'Miguel Torres', '2025-01-14 11:10:00', 3),
(14, 'No lo recomendaría, muy baja calidad.', 'Paula Fernández', '2025-01-13 20:30:00', 1),
(15, 'Buen precio y buena calidad, muy satisfecho.', 'Diego Castro', '2025-01-12 08:25:00', 4),
(16, 'Regular, no es tan bueno como esperaba.', 'Laura Hernández', '2025-01-11 15:40:00', 3),
(17, 'Buenos productos', 'Carlos Perez', '2025-01-22 06:38:39', 5),
(18, 'No tan bueno', 'Carlos Lopez', '2025-01-22 08:19:25', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedidos`
--

CREATE TABLE `detalle_pedidos` (
  `ID_PEDIDO` int(11) NOT NULL,
  `ID_KIT` int(11) NOT NULL,
  `CANTIDAD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_pedidos`
--

INSERT INTO `detalle_pedidos` (`ID_PEDIDO`, `ID_KIT`, `CANTIDAD`) VALUES
(1, 1, 2),
(1, 5, 1),
(2, 8, 1),
(2, 12, 1),
(3, 15, 3),
(6, 6, 1),
(7, 2, 1),
(8, 3, 1),
(9, 2, 1),
(10, 2, 1),
(11, 2, 1),
(12, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_kits`
--

CREATE TABLE `imagenes_kits` (
  `ID_IMAGEN` int(11) NOT NULL,
  `ID_KIT` int(11) NOT NULL,
  `URL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imagenes_kits`
--

INSERT INTO `imagenes_kits` (`ID_IMAGEN`, `ID_KIT`, `URL`) VALUES
(37, 1, 'https://m.media-amazon.com/images/I/71l2WOj-MQL._AC_SL1500_.jpg'),
(38, 2, 'https://http2.mlstatic.com/D_NQ_NP_761458-MLU74487866755_022024-O.webp'),
(39, 3, 'https://electronilab.co/wp-content/uploads/2024/01/Kit-Carro-Robot-Seguidor-De-Linea-5.webp'),
(40, 4, 'https://nyerekatech.com/wp-content/uploads/2023/04/038449ca0f21b70496cb9e76e3531d6c.jpg'),
(41, 5, 'https://www.szks-kuongshun.com/uploads/202310680/esp32-basic-starter-kit-wifi-iot-developmentfadfe475-b02b-4fa6-86e2-4ecb4c6705da.jpg'),
(42, 6, 'https://m.media-amazon.com/images/I/71RGTGzvYRL._AC_SL1442_.jpg'),
(43, 7, 'https://jdhlabstech.com/jdhshop/451-thickbox_default/starter-kit-electronica-basico-kit-principiantes-con-proto-sensores-y-componentes.jpg'),
(44, 8, 'https://thumbs.dreamstime.com/z/espacio-blanco-en-y-cierre-de-componentes-electr%C3%B3nicos-unidad-pieza-diagrama-circuito-equipo-inform%C3%A1tico-microchip-digital-kit-161344064.jpg'),
(45, 9, 'https://www.mechatronicstore.cl/wp-content/uploads/57b8ac2dcd.jpg'),
(46, 10, 'https://mipanelsolar.com/img/kit-solar/eco-worthy-kit-placa-solar-10w-01-710x473.webp'),
(47, 11, 'https://www.viasolar.es/wp-content/uploads/2018/10/50w-eco.jpg'),
(48, 12, 'https://m.media-amazon.com/images/I/71qgFqcXhnL.jpg'),
(49, 13, 'https://m.media-amazon.com/images/I/61vMvI7uayL.jpg'),
(50, 14, 'https://http2.mlstatic.com/D_NQ_NP_748782-MCO54721540832_032023-O.webp'),
(51, 15, 'https://images-cdn.ubuy.co.in/6350c63f33f9de632f2852e5-rustark-40-piece-3d-printer-accessories.jpg'),
(52, 16, 'https://www.ubuy.ec/productimg/?image=aHR0cHM6Ly9tLm1lZGlhLWFtYXpvbi5jb20vaW1hZ2VzL0kvODFoQjFhRlAyOEwuX0FDX1NMMTUwMF8uanBn.jpg'),
(53, 17, 'https://m.media-amazon.com/images/I/712SKo+fQFL.jpg'),
(54, 18, 'https://m.media-amazon.com/images/I/51Z-5V7gMLL._AC_UF894,1000_QL80_.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kits`
--

CREATE TABLE `kits` (
  `ID_KIT` int(11) NOT NULL,
  `NOMBRE` varchar(255) NOT NULL,
  `DESCRIPCION` text NOT NULL,
  `PRECIO` decimal(10,2) NOT NULL,
  `STOCK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `kits`
--

INSERT INTO `kits` (`ID_KIT`, `NOMBRE`, `DESCRIPCION`, `PRECIO`, `STOCK`) VALUES
(1, 'Kit Arduino Básico', 'Incluye Arduino UNO, cables y sensores básicos', 50.00, 10),
(2, 'Kit Arduino Avanzado', 'Incluye Arduino MEGA, motores y sensores avanzados', 80.00, -1),
(3, 'Kit Robot Seguidor de Línea', 'Componentes para armar un robot autónomo', 100.00, -1),
(4, 'Kit IoT con ESP8266', 'Placa ESP8266 con sensores para IoT', 60.00, 10),
(5, 'Kit IoT con ESP32', 'Placa ESP32 con sensores y conectividad avanzada', 75.00, 8),
(6, 'Kit Smart Home', 'Sensores y actuadores para domótica', 120.00, -1),
(7, 'Kit de Electrónica Básica', 'Resistencias, capacitores, LEDs y más', 30.00, 15),
(8, 'Kit de Electrónica Intermedia', 'Incluye transistores y circuitos integrados', 45.00, 12),
(9, 'Kit de Electrónica Avanzada', 'Osciloscopio portátil y componentes avanzados', 90.00, 6),
(10, 'Kit Panel Solar 10W', 'Panel solar con controlador de carga', 40.00, 10),
(11, 'Kit Panel Solar 50W', 'Panel solar con batería y regulador', 90.00, 7),
(12, 'Kit Energía Solar Completo', 'Panel solar, batería y controlador MPPT', 150.00, 5),
(13, 'Kit Impresora 3D DIY', 'Componentes para ensamblar una impresora 3D', 200.00, 3),
(14, 'Kit Filamentos 3D', 'Pack de filamentos PLA, ABS y PETG', 60.00, 10),
(15, 'Kit Herramientas de Impresión 3D', 'Pinturas, adhesivos y herramientas', 35.00, 15),
(16, 'Kit Raspberry Pi Básico', 'Incluye Raspberry Pi, cables y carcasa', 70.00, 10),
(17, 'Kit Raspberry Pi Intermedio', 'Incluye sensores y pantalla táctil', 110.00, 7),
(18, 'Kit Raspberry Pi Avanzado', 'Incluye cámara y módulos avanzados', 150.00, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `ID_PAGO` int(11) NOT NULL,
  `ID_PEDIDO` int(11) NOT NULL,
  `MONTO` decimal(10,2) NOT NULL,
  `METODO_PAGO` varchar(50) NOT NULL,
  `FECHA_PAGO` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`ID_PAGO`, `ID_PEDIDO`, `MONTO`, `METODO_PAGO`, `FECHA_PAGO`) VALUES
(1, 2, 135.00, 'Tarjeta de Crédito', '2025-01-19 15:00:00'),
(2, 6, 0.00, 'PayPal', '2025-01-21 23:19:28'),
(3, 7, 0.00, 'PayPal', '2025-01-21 23:40:36'),
(4, 8, 0.00, 'PayPal', '2025-01-21 23:56:37'),
(5, 9, 0.00, 'PayPal', '2025-01-22 00:20:26'),
(6, 10, 0.00, 'PayPal', '2025-01-22 00:28:12'),
(7, 11, 0.00, 'PayPal', '2025-01-22 00:44:59'),
(8, 12, 0.00, 'PayPal', '2025-01-22 02:21:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `ID_PEDIDO` int(11) NOT NULL,
  `ID_CLIENTE` int(11) NOT NULL,
  `FECHA_PEDIDO` datetime NOT NULL,
  `ESTADO_PEDIDO` enum('PENDIENTE','COMPLETADO','CANCELADO') DEFAULT 'PENDIENTE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`ID_PEDIDO`, `ID_CLIENTE`, `FECHA_PEDIDO`, `ESTADO_PEDIDO`) VALUES
(1, 1, '2025-01-20 10:30:00', 'PENDIENTE'),
(2, 2, '2025-01-19 14:45:00', 'COMPLETADO'),
(3, 3, '2025-01-18 09:15:00', 'CANCELADO'),
(4, 6, '2025-01-21 23:17:44', 'PENDIENTE'),
(5, 7, '2025-01-21 23:18:45', 'PENDIENTE'),
(6, 8, '2025-01-21 23:19:28', 'PENDIENTE'),
(7, 9, '2025-01-21 23:40:36', 'PENDIENTE'),
(8, 10, '2025-01-21 23:56:37', 'PENDIENTE'),
(9, 11, '2025-01-22 00:20:26', 'COMPLETADO'),
(10, 12, '2025-01-22 00:28:12', 'COMPLETADO'),
(11, 13, '2025-01-22 00:44:59', 'COMPLETADO'),
(12, 14, '2025-01-22 02:21:34', 'COMPLETADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123'),
(2, 'user1', 'password1'),
(3, 'user2', 'password2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ID_CLIENTE`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`ID_COMENTARIO`);

--
-- Indices de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD PRIMARY KEY (`ID_PEDIDO`,`ID_KIT`),
  ADD KEY `ID_KIT` (`ID_KIT`);

--
-- Indices de la tabla `imagenes_kits`
--
ALTER TABLE `imagenes_kits`
  ADD PRIMARY KEY (`ID_IMAGEN`),
  ADD KEY `ID_KIT` (`ID_KIT`);

--
-- Indices de la tabla `kits`
--
ALTER TABLE `kits`
  ADD PRIMARY KEY (`ID_KIT`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`ID_PAGO`),
  ADD KEY `ID_PEDIDO` (`ID_PEDIDO`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`ID_PEDIDO`),
  ADD KEY `ID_CLIENTE` (`ID_CLIENTE`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ID_CLIENTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `ID_COMENTARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `imagenes_kits`
--
ALTER TABLE `imagenes_kits`
  MODIFY `ID_IMAGEN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `kits`
--
ALTER TABLE `kits`
  MODIFY `ID_KIT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `ID_PAGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `ID_PEDIDO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD CONSTRAINT `detalle_pedidos_ibfk_1` FOREIGN KEY (`ID_PEDIDO`) REFERENCES `pedidos` (`ID_PEDIDO`),
  ADD CONSTRAINT `detalle_pedidos_ibfk_2` FOREIGN KEY (`ID_KIT`) REFERENCES `kits` (`ID_KIT`);

--
-- Filtros para la tabla `imagenes_kits`
--
ALTER TABLE `imagenes_kits`
  ADD CONSTRAINT `imagenes_kits_ibfk_1` FOREIGN KEY (`ID_KIT`) REFERENCES `kits` (`ID_KIT`);

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`ID_PEDIDO`) REFERENCES `pedidos` (`ID_PEDIDO`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`ID_CLIENTE`) REFERENCES `cliente` (`ID_CLIENTE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
