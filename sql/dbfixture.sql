-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-04-2015 a las 23:41:13
-- Versión del servidor: 5.1.36-community-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_predio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbfixture`
--

CREATE TABLE IF NOT EXISTS `dbfixture` (
  `Idfixture` int(11) NOT NULL AUTO_INCREMENT,
  `reftorneoge_a` int(11) DEFAULT NULL,
  `resultado_a` smallint(6) DEFAULT NULL,
  `reftorneoge_b` int(11) DEFAULT NULL,
  `resultado_b` smallint(6) DEFAULT NULL,
  `fechajuego` date NOT NULL DEFAULT '0000-00-00',
  `refFecha` int(11) NOT NULL,
  `Hora` time DEFAULT NULL,
  `cancha` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`Idfixture`),
  KEY `indices` (`reftorneoge_a`,`resultado_a`,`reftorneoge_b`,`resultado_b`,`refFecha`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4102 ;

--
-- Volcado de datos para la tabla `dbfixture`
--

INSERT INTO `dbfixture` (`Idfixture`, `reftorneoge_a`, `resultado_a`, `reftorneoge_b`, `resultado_b`, `fechajuego`, `refFecha`, `Hora`, `cancha`) VALUES
(4098, 2, NULL, 3, NULL, '2015-04-11', 28, '16:30:00', 'Cancha 9'),
(4099, 1, NULL, 1080, NULL, '2015-04-11', 28, '15:00:00', 'Cancha 9'),
(4100, 1079, NULL, 8, NULL, '2015-04-11', 28, '13:30:00', 'Cancha 9'),
(4101, 1005, NULL, 1000, NULL, '2015-04-11', 28, '12:00:00', 'Cancha 9');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
