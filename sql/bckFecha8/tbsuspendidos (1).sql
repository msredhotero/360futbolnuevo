-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 25-04-2015 a las 19:56:38
-- Versión del servidor: 5.1.73-cll
-- Versión de PHP: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `wwwpredi_98nicolas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbsuspendidos`
--

CREATE TABLE IF NOT EXISTS `tbsuspendidos` (
  `idsuspendido` int(11) NOT NULL AUTO_INCREMENT,
  `refequipo` int(11) NOT NULL,
  `refjugador` int(11) NOT NULL,
  `motivos` varchar(130) DEFAULT NULL,
  `cantidadfechas` varchar(100) DEFAULT NULL,
  `fechacreacion` date DEFAULT NULL,
  `reffixture` int(11) NOT NULL,
  PRIMARY KEY (`idsuspendido`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Volcado de datos para la tabla `tbsuspendidos`
--

INSERT INTO `tbsuspendidos` (`idsuspendido`, `refequipo`, `refjugador`, `motivos`, `cantidadfechas`, `fechacreacion`, `reffixture`) VALUES
(23, 17, 681, 'Agresión con compañero', '3', '2015-04-25', 0),
(24, 17, 2201, 'Agresion con compañero', '3', '2015-04-25', 0),
(25, 39, 919, 'Roja Directa', '1', '2015-04-25', 0),
(26, 36, 878, 'Protesta', '1', '2015-04-25', 0),
(27, 77, 2391, 'Insulto al Juez', '3', '2015-04-25', 0),
(28, 77, 1829, 'Insulto al Juez', '3', '2015-04-25', 0),
(29, 93, 2188, 'Insultos Agravados', '4', '2015-04-25', 0),
(30, 71, 2646, 'Roja Directa', '2', '2015-04-25', 0),
(31, 96, 2167, 'Insulto al Juez', '3', '2015-04-25', 0),
(32, 81, 1890, 'Juego Brusco', '2', '2015-04-25', 0),
(33, 79, 2232, 'Juego Brusco', '2', '2015-04-25', 0),
(34, 61, 1545, 'Juego Brusco e Insulto al Juez', '5', '2015-04-25', 0),
(35, 41, 1036, 'Intento agresion a rival e insultos agravados', '8', '2015-04-25', 0),
(36, 49, 2647, 'Exceso Verbal', '1', '2015-04-25', 0),
(37, 52, 1216, 'Agresion a rival / Expulsado del Torneo Apertura 2015', '13', '2015-04-25', 0),
(38, 46, 2344, 'Insulto al Juez', '3', '2015-04-25', 0),
(39, 43, 2225, 'Doble Amarilla', '1', '2015-01-01', 0),
(40, 45, 1101, 'Doble Amarilla', '1', '2015-01-01', 0),
(41, 46, 2428, 'Doble Amarilla', '1', '2015-01-01', 0),
(42, 47, 1132, 'Doble Amarilla', '1', '2015-01-01', 0),
(43, 59, 1344, 'Doble Amarilla', '1', '2015-01-01', 0),
(44, 59, 2629, 'Doble Amarilla', '1', '2015-01-01', 0),
(45, 77, 1819, 'Doble Amarilla', '1', '2015-01-01', 0),
(46, 94, 2178, 'Doble Amarilla', '1', '2015-01-01', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
