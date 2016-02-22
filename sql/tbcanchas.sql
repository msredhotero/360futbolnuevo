-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-04-2015 a las 23:41:41
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
-- Estructura de tabla para la tabla `tbcanchas`
--

CREATE TABLE IF NOT EXISTS `tbcanchas` (
  `idcancha` int(11) NOT NULL AUTO_INCREMENT,
  `cancha` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idcancha`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `tbcanchas`
--

INSERT INTO `tbcanchas` (`idcancha`, `cancha`) VALUES
(1, 'Cancha 1A'),
(2, 'Cancha 2'),
(3, 'Cancha 3'),
(4, 'Cancha 4'),
(5, 'Cancha 5'),
(6, 'Cancha 6A'),
(7, 'Cancha 7'),
(8, 'Cancha 8'),
(9, 'Cancha 9'),
(10, 'Cancha 10'),
(11, 'Cancha 1B'),
(12, 'Cancha 6B');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
