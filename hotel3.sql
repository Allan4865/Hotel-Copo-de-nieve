-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-01-2025 a las 06:54:44
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
-- Base de datos: `hotel3`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`ID_CLIENTE`, `NOMBRE`, `APELLIDO`, `CELULAR`, `EMAIL`) VALUES
(62, 'Cristina', 'Molina', '0959610758', 'cm22029@gmail.com'),
(63, 'Dylan', 'Villarroel', '0957144592', 'cm22029@gmail.com'),
(64, 'jair', 'sanchez', '0987297703', 'jair2002san@gmail.com'),
(72, 'Pablo', 'Perez', '0959610533', 'adrianmolina410@gmail.com'),
(73, 'Allan', 'Molina', '0959612588', 'adrianmolina410@gmail.com'),
(74, 'Cristina', 'Mol', '0987862033', 'adrianmolina410@gmail.com'),
(75, 'Carlos', 'Perez', '0982360244', 'adrianmolina410@gmail.com'),
(78, 'Allan', 'Molina', '0959610833', 'adrianmolina410@gmail.com'),
(79, 'Allan', 'Molina', '0959610833', 'adrianmolina410@gmail.com'),
(80, 'Allan', 'Molina', '0959610833', 'adrianmolina782@gmail.com'),
(81, 'Allan', 'Molina', '0959610833', 'adrianmolina782@gmail.com'),
(82, 'Allan', 'Molina', '0959610833', 'adrianmolina782@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `co_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `comentarios` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `comentario_nombre` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `stars` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`co_id`, `parent_id`, `comentarios`, `comentario_nombre`, `fecha`, `stars`) VALUES
(1, 0, 'Una experiencia increíble. El restaurante ofrece sabores deliciosos, el parqueadero es conveniente, el Wi-Fi es rápido y la sala de eventos es perfecta. Todo el personal es amable y atento.', 'Andrés Gutiérrez Mendoza', '2021-11-03 16:26:18', 3),
(2, 0, 'Increíble experiencia en el spa del hotel. Los tratamientos de belleza son fantásticos y el personal es muy profesional. Recomiendo especialmente la aromaterapia.', 'Juan Pérez', '2021-11-03 16:27:21', 4),
(3, 0, 'El servicio en el restaurante fue excepcional. La comida estaba deliciosa y el personal fue muy atento a todas nuestras necesidades. Definitivamente volveremos.', 'María Fernanda López', '2021-11-04 14:45:32', 5),
(4, 0, 'Nos encantó la habitación del hotel, estaba limpia y cómoda. El desayuno buffet tenía muchas opciones y todo estaba fresco. El personal del hotel fue amable y servicial.', 'Luis Ramírez', '2021-11-05 20:12:40', 4),
(5, 0, 'Pasamos un fin de semana maravilloso en el spa. Los masajes fueron relajantes y el ambiente era tranquilo. Definitivamente lo recomendaría para una escapada de relax.', 'Ana María Rodríguez', '2021-11-06 15:30:15', 5),
(6, 0, 'Excelente experiencia en el gimnasio del hotel. Las instalaciones son modernas y bien equipadas. Además, el personal del gimnasio es muy profesional y servicial.', 'Pedro González', '2021-11-07 19:20:05', 4),
(7, 0, 'El hotel está en una ubicación perfecta, cerca de muchos lugares de interés. El personal fue muy amable y servicial, y la habitación estaba limpia y cómoda.', 'Laura Martínez', '2021-11-08 13:55:22', 4),
(8, 0, 'La comida en el restaurante del hotel era deliciosa y bien presentada. El ambiente era acogedor y el servicio fue excelente. Sin duda volveremos en el futuro.', 'Carlos Sánchez', '2021-11-09 17:40:30', 5),
(9, 0, 'Mi estancia en el hotel fue perfecta. La habitación era espaciosa y cómoda, y el personal fue muy amable y atento en todo momento. Recomiendo este hotel a cualquiera que visite la zona.', 'Patricia Díaz', '2021-11-10 22:15:18', 5),
(10, 0, 'Disfruté mucho de mi tiempo en la piscina del hotel. El agua estaba limpia y la temperatura era perfecta. Además, el personal del área de la piscina fue muy servicial.', 'Roberto Hernández', '2021-11-11 18:25:45', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `ID_HABITACION` int(11) NOT NULL,
  `TIPO` varchar(255) NOT NULL,
  `DESCRIPCION` varchar(255) DEFAULT NULL,
  `PRECIOPORNOCHE` decimal(10,2) NOT NULL,
  `CAPACIDAD` int(11) NOT NULL,
  `CAMAS` int(11) DEFAULT NULL,
  `BANO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`ID_HABITACION`, `TIPO`, `DESCRIPCION`, `PRECIOPORNOCHE`, `CAPACIDAD`, `CAMAS`, `BANO`) VALUES
(1, 'individual', 'Habitación individual: Cómoda habitación con todas las comodidades necesarias para una estancia agradable. Incluye una cama individual, escritorio y baño privado. Ideal para viajeros solitarios.', 85.00, 1, 1, 1),
(2, 'individual', 'Habitación individual: Acogedora habitación diseñada para proporcionar tranquilidad y descanso. Dispone de una cama individual, área de trabajo y baño privado. Perfecta para viajeros que buscan privacidad.', 90.00, 1, 1, 1),
(3, 'individual', 'Habitación individual: Espacio íntimo y funcional para una estancia confortable. Cuenta con una cama individual, escritorio multifuncional y baño privado. Ideal para viajeros que valoran la comodidad.', 80.00, 1, 1, 1),
(4, 'individual', 'Habitación individual: Diseñada para ofrecer comodidad y funcionalidad a los huéspedes solitarios. Equipada con una cama individual, área de trabajo y baño privado. Perfecta para estancias cortas o prolongadas.', 95.00, 1, 1, 1),
(5, 'individual', 'Habitación individual: Espacio acogedor y bien iluminado para una estancia relajante. Dispone de una cama individual, escritorio y baño privado. Ideal para viajeros que buscan tranquilidad y confort.', 88.00, 1, 1, 1),
(6, 'estandar', 'Habitación estándar: Amplia habitación con todas las comodidades necesarias para una estancia placentera. Cuenta con una cómoda cama matrimonial, área de trabajo y baño privado. Perfecta para parejas o viajeros individuales.', 110.00, 2, 1, 1),
(7, 'estandar', 'Habitación estándar: Espaciosa y luminosa, ideal para una estancia confortable. Equipada con una cama matrimonial, zona de estar y baño privado. Perfecta para parejas o viajeros que buscan comodidad.', 115.00, 2, 1, 1),
(8, 'estandar', 'Habitación estándar: Diseñada para ofrecer confort y funcionalidad a los huéspedes. Dispone de una cama matrimonial, escritorio de trabajo y baño privado. Ideal para estancias cortas o prolongadas.', 105.00, 2, 1, 1),
(9, 'estandar', 'Habitación estándar: Espacio acogedor y bien equipado para una estancia agradable. Cuenta con una cama matrimonial, área de descanso y baño privado. Perfecta para parejas o viajeros individuales.', 120.00, 2, 1, 1),
(10, 'estandar', 'Habitación estándar: Confortable y funcional, ideal para una estancia relajante. Equipada con una cama matrimonial, área de trabajo y baño privado. Perfecta para parejas o viajeros en solitario.', 108.00, 2, 1, 1),
(11, 'dobles', 'Habitación doble: Amplio y cómodo espacio diseñado para parejas o amigos que viajan juntos. Equipada con dos camas individuales, área de descanso y baño privado. Perfecta para una estancia relajante.', 130.00, 2, 2, 1),
(12, 'dobles', 'Habitación doble: Espacio acogedor y bien iluminado para una estancia confortable. Dispone de dos camas individuales, área de trabajo y baño privado. Ideal para parejas o amigos que buscan comodidad.', 135.00, 2, 2, 1),
(13, 'dobles', 'Habitación doble: Confortable y funcional, ideal para dos personas. Equipada con dos camas individuales, escritorio de trabajo y baño privado. Perfecta para parejas o amigos que viajan juntos.', 140.00, 2, 2, 1),
(14, 'dobles', 'Habitación doble: Amplia y luminosa, diseñada para proporcionar comodidad y relajación. Dispone de dos camas individuales, zona de estar y baño privado. Perfecta para parejas o amigos.', 145.00, 2, 2, 1),
(16, 'ejecutiva', 'Habitación ejecutiva: Amplio y elegante espacio diseñado para viajeros de negocios. Equipada con una cama matrimonial, área de trabajo, sala de estar y baño privado. Perfecta para una estancia productiva y confortable.', 180.00, 2, 1, 1),
(17, 'ejecutiva', 'Habitación ejecutiva: Espacio moderno y funcional diseñado para satisfacer las necesidades de los viajeros de negocios. Cuenta con una cama matrimonial, escritorio de trabajo, sala de estar y baño privado.', 185.00, 2, 1, 1),
(18, 'ejecutiva', 'Habitación ejecutiva: Confort y lujo combinados para una experiencia de alojamiento excepcional. Dispone de una cama matrimonial, área de trabajo, sala de estar y baño privado con jacuzzi. Perfecta para viajeros exigentes.', 190.00, 2, 1, 1),
(19, 'ejecutiva', 'Habitación ejecutiva: Espacio elegante y bien equipado para viajeros que buscan comodidad y funcionalidad. Equipada con una cama matrimonial, escritorio de trabajo, área de estar y baño privado. Perfecta para estancias de negocios.', 195.00, 2, 1, 1),
(20, 'ejecutiva', 'Habitación ejecutiva: Diseñada para ofrecer un entorno de trabajo cómodo y relajante. Dispone de una cama matrimonial, área de trabajo, sala de estar y baño privado. Perfecta para viajeros de negocios.', 200.00, 2, 1, 1),
(21, 'cuadruples', 'Habitación cuádruple: Amplio espacio diseñado para grupos y familias. Equipada con cuatro camas individuales, zona de estar y baño privado. Ideal para una estancia divertida y confortable.', 220.00, 4, 4, 2),
(22, 'cuadruples', 'Habitación cuádruple: Espacio cómodo y funcional para grupos pequeños o familias. Dispone de cuatro camas individuales, área de descanso y baño privado. Perfecta para una estancia relajante.', 225.00, 4, 4, 2),
(23, 'cuadruples', 'Habitación cuádruple: Confortable y espaciosa, diseñada para grupos y familias. Cuenta con cuatro camas individuales, área de estar y baño privado. Ideal para una estancia divertida y relajante.', 230.00, 4, 4, 2),
(24, 'cuadruples', 'Habitación cuádruple: Amplio espacio para grupos y familias que buscan comodidad y funcionalidad. Equipada con cuatro camas individuales, zona de descanso y baño privado. Perfecta para una estancia en grupo.', 235.00, 4, 4, 2),
(25, 'cuadruples', 'Habitación cuádruple: Espacio acogedor y bien iluminado para grupos pequeños o familias. Dispone de cuatro camas individuales, área de trabajo y baño privado. Ideal para una estancia divertida y relajante.', 240.00, 4, 4, 2),
(26, 'suite', 'Suite: Exclusivo espacio diseñado para ofrecer la máxima comodidad y lujo. Equipada con una cama king size, sala de estar, baño privado con jacuzzi y todas las comodidades necesarias para una estancia inolvidable.', 260.00, 2, 1, 1),
(27, 'suite', 'Suite: Experiencia de alojamiento de lujo con amplios espacios y servicios exclusivos. Cuenta con una cama king size, área de descanso, baño privado con jacuzzi y todas las comodidades necesarias para una estancia placentera.', 265.00, 2, 1, 1),
(28, 'suite', 'Suite: Elegancia y confort combinados para una experiencia de alojamiento excepcional. Dispone de una cama king size, sala de estar, baño privado con jacuzzi y todas las comodidades necesarias para una estancia de lujo.', 270.00, 2, 1, 1),
(29, 'suite', 'Suite: Espacio exclusivo diseñado para ofrecer un ambiente de lujo y relajación. Equipada con una cama king size, área de estar, baño privado con jacuzzi y todas las comodidades necesarias para una estancia inolvidable.', 275.00, 2, 1, 1),
(30, 'suite', 'Suite: Exclusividad y confort en cada detalle para una estancia de lujo incomparable. Cuenta con una cama king size, sala de estar, baño privado con jacuzzi y todas las comodidades necesarias para una experiencia inolvidable.', 280.00, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion_reserva`
--

CREATE TABLE `habitacion_reserva` (
  `ID_HABITACION` int(11) NOT NULL,
  `ID_RESERVA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `habitacion_reserva`
--

INSERT INTO `habitacion_reserva` (`ID_HABITACION`, `ID_RESERVA`) VALUES
(3, 65),
(3, 66),
(3, 67),
(3, 81),
(4, 66),
(6, 75),
(6, 76),
(7, 77),
(8, 78);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_habitaciones`
--

CREATE TABLE `imagenes_habitaciones` (
  `id` int(11) NOT NULL,
  `id_habitacion` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `imagenes_habitaciones`
--

INSERT INTO `imagenes_habitaciones` (`id`, `id_habitacion`, `url`) VALUES
(1, 1, 'https://www.hoteltamboreal.com/uploads/rooms/gallery/2-080421114756-1717337588.jpg'),
(2, 1, 'https://www.hoteltamboreal.com/uploads/rooms/gallery/1-070421002210-1652671707.jpg'),
(3, 1, 'https://www.hoteltamboreal.com/uploads/rooms/gallery/4-070421003404-225083477.jpg'),
(4, 1, 'https://hoteltamboreal.com/uploads/rooms/habitacion-ejecutiva-queen-c-080421120023.jpg'),
(5, 1, 'https://hoteltamboreal.com/uploads/rooms/habitacion-suite-cama-king-c-220722185655.png'),
(6, 1, 'https://media-cdn.tripadvisor.com/media/photo-s/0d/4e/ac/fb/habitacion-moderna.jpg'),
(7, 1, 'https://media-cdn.tripadvisor.com/media/photo-s/06/d9/01/0c/turismo-hotel-casino.jpg'),
(8, 1, 'https://www.es.kayak.com/rimg/himg/4a/5b/3f/ice-142765-72158032_3XL-606579.jpg?width=1366&height=768&crop=true'),
(9, 1, 'https://webbox.imgix.net/images/tkzintxirlbyxpfq/187b18f2-aa87-431b-a508-4eb3a515d301.jpg?auto=format,compress&fit=crop&crop=entropy&w=600&h=450'),
(10, 1, 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/475699063.jpg?k=b7d4761d66be32c6e3896e361fb3a79a3028bbc900d1ed4e068b56c717a4b839&o=&hp=1'),
(11, 2, 'https://tysmagazine.com/wp-content/uploads/ropa_de_cama.jpg'),
(12, 2, 'https://hips.hearstapps.com/hmg-prod/images/conjunto-cama-zara-home-1631612897.jpeg'),
(13, 2, 'https://images.trvl-media.com/lodging/30000000/29970000/29964100/29964050/ca949c24.jpg?impolicy=fcrop&w=1200&h=800&p=1&q=medium'),
(14, 2, 'https://media-cdn.tripadvisor.com/media/photo-s/06/de/a5/91/radisson-blu-hotel-bamako.jpg'),
(15, 2, 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/14/f5/1f/c2/hotel-asian-blue.jpg?w=700&h=-1&s=1'),
(16, 2, 'https://media-cdn.tripadvisor.com/media/photo-s/06/de/a5/91/radisson-blu-hotel-bamako.jpg'),
(17, 2, 'https://img.remediosdigitales.com/4a894e/photo_967_20081008/450_1000.jpg'),
(18, 2, 'https://image.made-in-china.com/2f0j00kaMcJAbFeBoO/5-Star-Luxury-Modern-Hotel-Beds-Furniture-Hotel-Furniture.jpg'),
(19, 2, 'https://i0.wp.com/presidenteicpuebla.com/wp-content/uploads/2021/10/hoteles-de-lujo-en-puebla-clasica.jpg?fit=1075%2C695&ssl=1'),
(20, 2, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQQQ-V2p417lDE7Q_M92oJ8Urmv6Qsmx9y2HuZVvaS08nST9fzZ-50bRrfKb5MmERGgQh8&usqp=CAU'),
(21, 3, 'https://hips.hearstapps.com/hmg-prod/images/conjunto-cama-zara-home-1631612897.jpeg'),
(22, 3, 'https://www.swanscayhotel.com/wp-content/uploads/2022/05/hotel-en-bocas-del-toro-habitaciones-cuadruples-16.jpg'),
(23, 3, 'https://images.trvl-media.com/lodging/30000000/29970000/29964100/29964050/ca949c24.jpg?impolicy=fcrop&w=1200&h=800&p=1&q=medium'),
(24, 3, 'https://media-cdn.tripadvisor.com/media/photo-s/06/de/a5/91/radisson-blu-hotel-bamako.jpg'),
(25, 3, 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/14/f5/1f/c2/hotel-asian-blue.jpg?w=700&h=-1&s=1'),
(26, 3, 'https://media-cdn.tripadvisor.com/media/photo-s/06/de/a5/91/radisson-blu-hotel-bamako.jpg'),
(27, 3, 'https://img.remediosdigitales.com/4a894e/photo_967_20081008/450_1000.jpg'),
(28, 3, 'https://image.made-in-china.com/2f0j00kaMcJAbFeBoO/5-Star-Luxury-Modern-Hotel-Beds-Furniture-Hotel-Furniture.jpg'),
(29, 3, 'https://i0.wp.com/presidenteicpuebla.com/wp-content/uploads/2021/10/hoteles-de-lujo-en-puebla-clasica.jpg?fit=1075%2C695&ssl=1'),
(30, 3, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQQQ-V2p417lDE7Q_M92oJ8Urmv6Qsmx9y2HuZVvaS08nST9fzZ-50bRrfKb5MmERGgQh8&usqp=CAU'),
(31, 4, 'https://cdn.sklum.com/pt/wk/2667295-988x708/cama-e-borreguito-winselet.jpg?cf-resize=imgcat'),
(32, 4, 'https://hips.hearstapps.com/hmg-prod/images/conjunto-cama-zara-home-1631612897.jpeg'),
(33, 4, 'https://cdn.businessinsider.es/sites/navi.axelspringer.es/public/media/image/2022/08/cama-2780355.jpg'),
(34, 4, 'https://www.decorarhogar.es/wp-content/uploads/2013/04/zara-home-cama-cortina.jpg'),
(35, 4, 'https://hips.hearstapps.com/hmg-prod/images/conjunto-cama-zara-home-1631612897.jpeg'),
(36, 4, 'https://cdn.sklum.com/pt/wk/2667295-988x708/cama-e-borreguito-winselet.jpg?cf-resize=imgcat'),
(37, 4, 'https://cdn.businessinsider.es/sites/navi.axelspringer.es/public/media/image/2022/08/cama-2780355.jpg'),
(38, 4, 'https://www.shutterstock.com/image-photo/clean-bedding-sheets-pillow-on-600nw-1928427665.jpg'),
(39, 4, 'https://cdn.colombia.com/sdi/2016/06/01/como-tender-la-cama-como-en-un-gran-hotel-499490.jpg'),
(40, 4, 'https://elcomercio.pe/resizer/r1GV-zbrDHVTHF6gByiUuF3Hk2A=/1200x900/smart/filters:format(jpeg):quality(75)/arc-anglerfish-arc2-prod-elcomercio.s3.amazonaws.com/public/TKAZG57WWNBUTGN27MP64IQ5DU.jpg'),
(41, 5, 'https://cdn.colombia.com/sdi/2016/06/01/como-tender-la-cama-como-en-un-gran-hotel-499490.jpg'),
(42, 5, 'https://www.shutterstock.com/image-photo/clean-bedding-sheets-pillow-on-600nw-1928427665.jpg'),
(43, 5, 'https://cdn.colombia.com/sdi/2016/06/01/como-tender-la-cama-como-en-un-gran-hotel-499490.jpg'),
(44, 5, 'https://tysmagazine.com/wp-content/uploads/ropa_de_cama.jpg'),
(45, 5, 'https://habers.com.mx/wp-content/uploads/2018/06/Habitacio%CC%81n-Etoile-02-500x378.jpg'),
(46, 5, 'https://tysmagazine.com/wp-content/uploads/ropa_de_cama.jpg'),
(47, 5, 'https://cdn.colombia.com/sdi/2016/06/01/como-tender-la-cama-como-en-un-gran-hotel-499490.jpg'),
(48, 5, 'https://www.shutterstock.com/image-photo/clean-bedding-sheets-pillow-on-600nw-1928427665.jpg'),
(49, 5, 'https://www.fiaka.es/blog/wp-content/uploads/2019/05/decoacion-habitaciones-hoteles.jpg'),
(50, 5, 'https://www.conely.es/wp-content/uploads/2019/07/decoracion-habitacion-hotel.jpg'),
(51, 6, 'https://hips.hearstapps.com/hmg-prod/images/hotel-the-line-washington-dc-dormitorio-cama-manta-amarilla-sala-de-estar-1549880872.jpg?crop=0.566xw:1.00xh;0.253xw,0&resize=1200:*'),
(61, 7, 'https://www.hotelvaldorba.com/wp-content/uploads/2014/11/Habitacion-de-Hotel-rural-Valdorba-en-Navarra-1920x1080.jpg'),
(71, 8, 'https://t1.uc.ltmcdn.com/es/posts/1/9/2/guia_de_decoracion_para_habitaciones_de_hoteles_47291_orig.jpg'),
(81, 9, 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/461520760.jpg?k=51888d9342fca1055a0253c349ea8a67254999f470c31f52bb207229301282b2&o=&hp=1'),
(91, 10, 'https://images.mirai.com/INFOROOMS/100130992/Ace1b5nEM2QqVIR4bG3E/Ace1b5nEM2QqVIR4bG3E_large.jpg'),
(101, 11, 'https://mundodehoteles.com/wp-content/uploads/diferencia-habitacion-twin-y-doble.webp'),
(111, 12, 'https://media-cdn.tripadvisor.com/media/photo-s/07/be/b3/46/hotel-gaythering.jpg'),
(121, 13, 'https://www.ghlhoteles.com/cache/25/94/25942858c31f810f493869a34d74d64f.jpg'),
(131, 14, 'https://hotelcasaquebrada.mx/wp-content/uploads/2021/07/Quebrada_001-scaled.jpg'),
(151, 16, 'https://d1vp8nomjxwyf1.cloudfront.net/wp-content/uploads/sites/44/2016/10/01130913/EXEC-608-2_small1.jpg'),
(161, 17, 'https://www.myboutiquehotel.com/photos/107758/le-tsuba-hotel-paris-010-92856-1110x700.jpg'),
(171, 18, 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/94029868.jpg?k=bfe5c00c9ec38d02c54f60c2b692c6568a41d49136b8b1fe77927f04b9e62f1a&o=&hp=1'),
(181, 19, 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/16/c4/52/56/hotel-ejecutivo-express.jpg?w=600&h=-1&s=1'),
(191, 20, 'https://www.windsortower.com/wp-content/uploads/2015/04/1-1.jpg'),
(201, 21, 'https://www.hotellosalmendros.com/uploads/1/3/9/5/13959225/whatsapp-image-1018-07-02-at-6-50-29-am_3_orig.jpeg'),
(371, 22, 'https://www.swanscayhotel.com/wp-content/uploads/2022/05/hotel-en-bocas-del-toro-habitaciones-cuadruples-16.jpg'),
(381, 23, 'https://53b20a41c2.cbaul-cdnwnd.com/bc429e9705d589d7e52e3dc4234143aa/200000010-f00daf105e/hcuadruple.jpg'),
(391, 24, 'https://images.mirai.com/INFOROOMS/100364757/WYVAqKRlOBFMEU6OiN3H/WYVAqKRlOBFMEU6OiN3H_large.jpg'),
(401, 25, 'https://images.mirai.com/INFOROOMS/100028652/HDrlXXgeOraEjyKUvgZZ/HDrlXXgeOraEjyKUvgZZ_large.jpg'),
(411, 26, 'https://e00-elmundo.uecdn.es/assets/multimedia/imagenes/2022/03/11/16469896172304.jpg'),
(421, 27, 'https://www.windsortower.com/wp-content/uploads/2015/04/1-1.jpg'),
(431, 28, 'https://www.lavanguardia.com/files/article_gallery_microformat/uploads/2018/05/30/5fa437b2daf14.jpeg'),
(441, 29, 'https://lesroches.edu/wp-content/uploads/2023/03/siuites-1.png'),
(451, 30, 'https://technocio.com/wp-content/uploads/2019/09/Suite-2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `ID_PAGO` int(11) NOT NULL,
  `ID_RESERVA` int(11) DEFAULT NULL,
  `MONTO` decimal(10,2) NOT NULL,
  `ESTADOPAGO` varchar(20) NOT NULL,
  `METODOPAGO` varchar(50) NOT NULL,
  `FECHAPAGO` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`ID_PAGO`, `ID_RESERVA`, `MONTO`, `ESTADOPAGO`, `METODOPAGO`, `FECHAPAGO`) VALUES
(36, 65, 80.00, 'Pagado', 'PayPal', '2024-02-13 03:37:45'),
(37, 66, 175.00, 'Pagado', 'PayPal', '2024-02-13 04:31:36'),
(38, 67, 80.00, 'Pagado', 'PayPal', '2024-02-14 05:02:19'),
(45, 75, 1500.00, 'Pagado', 'PayPal', '2024-02-28 19:27:38'),
(46, 76, 500.00, 'Pagado', 'PayPal', '2024-02-28 19:31:57'),
(47, 77, 700.00, 'Pagado', 'PayPal', '2024-02-28 20:21:11'),
(48, 78, 520.00, 'Pagado', 'PayPal', '2024-02-28 20:27:10'),
(51, 81, 160.00, 'Pagado', 'PayPal', '2025-01-20 02:28:19'),
(53, 83, 250.00, 'Pagado', 'PayPal', '2025-01-20 04:44:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `ID_RESERVA` int(11) NOT NULL,
  `ID_CLIENTE` int(11) DEFAULT NULL,
  `FECHACHECKIN` datetime NOT NULL,
  `FECHACHECKOUT` datetime NOT NULL,
  `ESTADORESERVA` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`ID_RESERVA`, `ID_CLIENTE`, `FECHACHECKIN`, `FECHACHECKOUT`, `ESTADORESERVA`) VALUES
(65, 62, '2024-02-14 00:00:00', '2024-02-15 00:00:00', 'Confirmada'),
(66, 63, '2024-02-12 00:00:00', '2024-02-13 00:00:00', 'Confirmada'),
(67, 64, '2024-02-16 00:00:00', '2024-02-17 00:00:00', 'Confirmada'),
(75, 72, '2024-02-28 00:00:00', '2024-03-05 00:00:00', 'Confirmada'),
(76, 73, '2024-03-06 00:00:00', '2024-03-08 00:00:00', 'Confirmada'),
(77, 74, '2024-02-28 00:00:00', '2024-03-06 00:00:00', 'Confirmada'),
(78, 75, '2024-03-01 00:00:00', '2024-03-05 00:00:00', 'Confirmada'),
(81, 78, '2025-01-22 00:00:00', '2025-01-24 00:00:00', 'Confirmada'),
(83, 80, '2025-01-26 00:00:00', '2025-01-28 00:00:00', 'Confirmada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`) VALUES
(1, 'jair', 'jair'),
(2, 'admin', 'admin');

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
  ADD PRIMARY KEY (`co_id`);

--
-- Indices de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD PRIMARY KEY (`ID_HABITACION`);

--
-- Indices de la tabla `habitacion_reserva`
--
ALTER TABLE `habitacion_reserva`
  ADD PRIMARY KEY (`ID_HABITACION`,`ID_RESERVA`),
  ADD KEY `FK_HABITACION_RESERVA2` (`ID_RESERVA`);

--
-- Indices de la tabla `imagenes_habitaciones`
--
ALTER TABLE `imagenes_habitaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_habitacion` (`id_habitacion`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`ID_PAGO`),
  ADD KEY `FK_PAGO_RESERVA` (`ID_RESERVA`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`ID_RESERVA`),
  ADD KEY `FK_CLIENTE_RESERVA` (`ID_CLIENTE`);

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
  MODIFY `ID_CLIENTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  MODIFY `ID_HABITACION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `imagenes_habitaciones`
--
ALTER TABLE `imagenes_habitaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=515;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `ID_PAGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `ID_RESERVA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `habitacion_reserva`
--
ALTER TABLE `habitacion_reserva`
  ADD CONSTRAINT `FK_HABITACION_RESERVA` FOREIGN KEY (`ID_HABITACION`) REFERENCES `habitaciones` (`ID_HABITACION`),
  ADD CONSTRAINT `FK_HABITACION_RESERVA2` FOREIGN KEY (`ID_RESERVA`) REFERENCES `reserva` (`ID_RESERVA`);

--
-- Filtros para la tabla `imagenes_habitaciones`
--
ALTER TABLE `imagenes_habitaciones`
  ADD CONSTRAINT `imagenes_habitaciones_ibfk_1` FOREIGN KEY (`id_habitacion`) REFERENCES `habitaciones` (`ID_HABITACION`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `FK_PAGO_RESERVA` FOREIGN KEY (`ID_RESERVA`) REFERENCES `reserva` (`ID_RESERVA`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `FK_CLIENTE_RESERVA` FOREIGN KEY (`ID_CLIENTE`) REFERENCES `cliente` (`ID_CLIENTE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
