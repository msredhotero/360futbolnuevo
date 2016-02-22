-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-05-2015 a las 00:50:35
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=71 ;

--
-- Volcado de datos para la tabla `tbconductabck2`
--

INSERT INTO `tbconductabck2` (`idconducta`, `refequipo`, `puntos`, `reffecha`) VALUES
(64, 45, 3, 32),
(65, 107, 3, 32),
(66, 64, 3, 32),
(67, 59, 3, 32),
(68, 55, 3, 32),
(69, 100, 3, 32);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
