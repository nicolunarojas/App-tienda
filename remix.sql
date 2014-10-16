-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-10-2014 a las 10:27:43
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `remix`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `articulo` text COLLATE utf8_bin,
  `precios` decimal(9,2) NOT NULL,
  `url` varchar(250) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `articulo`, `precios`, `url`) VALUES
(1, 'JVC HA-EB75-A-E - Auriculares de clip, azul', '7.00', 'http://ecx.images-amazon.com/images/I/81HpT%2B9iZyL._SL1500_.jpg'),
(2, 'Sony MDR-ZX110 - Auriculares de diadema plegable, color blanco', '29.00', 'http://ecx.images-amazon.com/images/I/51qXUmTgvnL._SL1500_.jpg'),
(3, 'Sony MDRZX100W - Auriculares de diadema abiertos, blanco', '12.00', 'http://ecx.images-amazon.com/images/I/51aYq-MLVCL._SL1500_.jpg'),
(4, 'CSL - Auriculares In-Ear de aluminio 630 de gama alta', '6.00', 'http://ecx.images-amazon.com/images/I/81qcLEarbnL._SL1500_.jpg'),
(5, 'Philips SHS3200 - Auriculares con gancho flexible para la oreja', '10.00', 'http://ecx.images-amazon.com/images/I/71zM2MF7yfL._SL1500_.jpg'),
(6, 'Sennheiser HD 201 - Auriculares de diadema cerrados, negro', '18.00', 'http://ecx.images-amazon.com/images/I/71-CKdlemBL._SL1500_.jpg'),
(7, 'Sennheiser MX170 - Auriculares de botón', '7.00', 'http://ecx.images-amazon.com/images/I/61g43ygHVEL._SL1500_.jpg'),
(8, 'Philips SHB7000/10 - Auriculares de diadema cerrados (Bluetooth), Negro', '43.00', 'http://ecx.images-amazon.com/images/I/91tw8-qWvJL._SL1500_.jpg'),
(9, 'Sennheiser MX 375 - Auriculares de botón, Negro', '12.00', 'http://ecx.images-amazon.com/images/I/51kknIfQIeL._SL1500_.jpg'),
(10, 'Sony MDR-ZX110 - Auriculares de diadema plegable, negro', '29.00', 'http://ecx.images-amazon.com/images/I/71NQDRiNFYL._SL1500_.jpg'),
(11, 'Plantronics ML20 - Auricular manos libres Bluetooth para móvil, Negro', '18.00', 'http://ecx.images-amazon.com/images/I/517ASjFrH8L.jpg'),
(12, 'Sennheiser CX 300-II Pre.negro - Auriculares in-ear (reducción de ruido), negro', '34.00', 'http://ecx.images-amazon.com/images/I/61BwBdrDJOL._SL1500_.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) COLLATE utf8_bin NOT NULL,
  `correo` varchar(100) COLLATE utf8_bin NOT NULL,
  `password` varchar(250) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `correo`, `password`) VALUES
(1, 'nico', 'nicolunarojas@outlook.com', '827ccb0eea8a706c4c34a16891f84e7b');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
