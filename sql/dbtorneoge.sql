-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-04-2015 a las 23:41:24
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
-- Estructura de tabla para la tabla `dbtorneoge`
--

CREATE TABLE IF NOT EXISTS `dbtorneoge` (
  `IdTorneoGE` int(11) NOT NULL AUTO_INCREMENT,
  `refgrupo` int(11) NOT NULL,
  `reftorneo` int(11) NOT NULL,
  `refequipo` int(11) NOT NULL,
  `prioridad` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`IdTorneoGE`),
  KEY `indices` (`refgrupo`,`reftorneo`,`refequipo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1081 ;

--
-- Volcado de datos para la tabla `dbtorneoge`
--

INSERT INTO `dbtorneoge` (`IdTorneoGE`, `refgrupo`, `reftorneo`, `refequipo`, `prioridad`) VALUES
(1, 19, 34, 44, 4),
(2, 19, 34, 53, 9),
(3, 19, 34, 41, 2),
(4, 19, 34, 49, 4),
(5, 19, 34, 56, 6),
(6, 19, 34, 52, 5),
(7, 19, 34, 59, 0),
(8, 19, 34, 48, 1),
(997, 20, 34, 46, 5),
(998, 20, 34, 43, 5),
(999, 20, 34, 51, 5),
(1000, 20, 34, 42, 5),
(1001, 20, 34, 57, 5),
(1002, 20, 34, 54, 5),
(1003, 20, 34, 45, 5),
(1004, 20, 34, 47, 5),
(1005, 20, 34, 91, 5),
(1006, 20, 34, 92, 5),
(1007, 19, 35, 83, 4),
(1008, 19, 35, 70, 4),
(1009, 19, 35, 76, 4),
(1010, 19, 35, 75, 4),
(1011, 19, 35, 66, 4),
(1012, 19, 35, 60, 4),
(1013, 19, 35, 77, 4),
(1014, 19, 35, 93, 4),
(1015, 19, 35, 95, 4),
(1016, 19, 35, 94, 4),
(1017, 20, 35, 73, 6),
(1018, 20, 35, 71, 6),
(1019, 20, 35, 64, 6),
(1020, 20, 35, 85, 6),
(1021, 20, 35, 74, 6),
(1022, 20, 35, 89, 6),
(1023, 20, 35, 86, 6),
(1024, 20, 35, 63, 6),
(1025, 20, 35, 68, 6),
(1026, 21, 35, 87, 7),
(1027, 21, 35, 81, 7),
(1028, 21, 35, 79, 7),
(1029, 21, 35, 67, 7),
(1030, 21, 35, 69, 7),
(1031, 21, 35, 61, 7),
(1032, 21, 35, 88, 7),
(1033, 21, 35, 80, 7),
(1034, 21, 35, 90, 7),
(1035, 21, 35, 78, 7),
(1036, 20, 35, 96, 6),
(1039, 19, 36, 27, 8),
(1040, 19, 36, 23, 8),
(1041, 19, 36, 5, 8),
(1042, 19, 36, 25, 8),
(1043, 19, 36, 17, 8),
(1044, 19, 36, 29, 8),
(1045, 19, 36, 13, 8),
(1046, 19, 36, 18, 8),
(1047, 19, 36, 26, 8),
(1048, 19, 36, 40, 8),
(1049, 19, 36, 6, 8),
(1050, 19, 36, 31, 8),
(1051, 19, 36, 30, 8),
(1052, 19, 36, 8, 8),
(1053, 20, 36, 34, 3),
(1054, 20, 36, 10, 3),
(1055, 20, 36, 39, 3),
(1056, 20, 36, 20, 3),
(1057, 20, 36, 1, 3),
(1058, 20, 36, 4, 3),
(1059, 20, 36, 24, 3),
(1060, 20, 36, 15, 3),
(1061, 20, 36, 32, 3),
(1062, 20, 36, 12, 3),
(1063, 20, 36, 21, 3),
(1064, 20, 36, 22, 3),
(1065, 20, 36, 98, 3),
(1066, 20, 36, 97, 3),
(1067, 21, 36, 36, 2),
(1068, 21, 36, 11, 2),
(1069, 21, 36, 37, 2),
(1070, 21, 36, 35, 2),
(1071, 21, 36, 9, 2),
(1072, 21, 36, 28, 2),
(1073, 21, 36, 33, 2),
(1074, 21, 36, 14, 2),
(1075, 21, 36, 19, 2),
(1076, 21, 36, 3, 2),
(1077, 21, 36, 7, 2),
(1078, 21, 36, 99, 2),
(1079, 19, 34, 50, 4),
(1080, 19, 34, 55, 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
