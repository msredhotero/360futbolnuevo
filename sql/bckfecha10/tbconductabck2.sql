-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-05-2015 a las 00:35:08
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_prediobck4`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbconductabck2`
--

CREATE TABLE IF NOT EXISTS `tbconductabck2` (
  `idconducta` int(11) NOT NULL AUTO_INCREMENT,
  `refequipo` int(11) NOT NULL,
  `puntos` int(11) NOT NULL,
  `reffecha` smallint(6) NOT NULL,
  PRIMARY KEY (`idconducta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=64 ;

--
-- Volcado de datos para la tabla `tbconductabck2`
--

INSERT INTO `tbconductabck2` (`idconducta`, `refequipo`, `puntos`, `reffecha`) VALUES
(1, 44, 3, 32),
(2, 49, 3, 32),
(3, 45, 2, 32),
(4, 91, 3, 32),
(5, 83, 1, 32),
(6, 75, 1, 32),
(7, 70, 1, 32),
(8, 60, 2, 32),
(9, 107, 2, 32),
(10, 76, 5, 32),
(11, 95, 2, 32),
(12, 94, 3, 32),
(13, 64, 5, 32),
(14, 96, 3, 32),
(15, 74, 2, 32),
(16, 63, 1, 32),
(17, 85, 1, 32),
(18, 89, 2, 32),
(19, 86, 1, 32),
(20, 108, 1, 32),
(21, 81, 3, 32),
(22, 67, 2, 32),
(23, 87, 1, 32),
(24, 79, 2, 32),
(25, 69, 3, 32),
(26, 61, 1, 32),
(27, 59, 2, 32),
(28, 55, 2, 32),
(29, 92, 4, 32),
(30, 41, 2, 32),
(31, 101, 3, 32),
(32, 73, 3, 32),
(33, 105, 2, 32);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
