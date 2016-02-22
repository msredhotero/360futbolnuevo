-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 25-04-2015 a las 19:56:20
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
-- Estructura de tabla para la tabla `tbconducta`
--

CREATE TABLE IF NOT EXISTS `tbconducta` (
  `idconducta` int(11) NOT NULL AUTO_INCREMENT,
  `refequipo` int(11) NOT NULL,
  `puntos` int(11) NOT NULL,
  PRIMARY KEY (`idconducta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=991 ;

--
-- Volcado de datos para la tabla `tbconducta`
--

INSERT INTO `tbconducta` (`idconducta`, `refequipo`, `puntos`) VALUES
(864, 41, 20),
(865, 42, 17),
(866, 43, 33),
(867, 44, 11),
(868, 45, 33),
(869, 46, 22),
(870, 47, 19),
(871, 48, 11),
(872, 49, 17),
(873, 51, 5),
(874, 52, 32),
(875, 53, 21),
(876, 55, 12),
(877, 56, 17),
(878, 57, 8),
(879, 59, 19),
(880, 91, 33),
(881, 92, 19),
(882, 100, 32),
(883, 101, 16),
(884, 60, 30),
(885, 61, 22),
(886, 63, 8),
(887, 64, 18),
(888, 66, 23),
(889, 67, 23),
(890, 68, 15),
(891, 69, 8),
(892, 70, 15),
(893, 71, 18),
(894, 73, 11),
(895, 74, 11),
(896, 75, 8),
(897, 76, 11),
(898, 77, 33),
(899, 78, 4),
(900, 79, 13),
(901, 80, 26),
(902, 81, 16),
(903, 83, 13),
(904, 85, 10),
(905, 86, 13),
(906, 87, 7),
(907, 88, 23),
(908, 89, 8),
(909, 90, 8),
(910, 93, 22),
(911, 94, 34),
(912, 95, 23),
(913, 96, 26),
(914, 1, 8),
(915, 4, 10),
(916, 5, 16),
(917, 6, 9),
(918, 7, 8),
(919, 8, 6),
(920, 9, 15),
(921, 10, 2),
(922, 11, 9),
(923, 12, 3),
(924, 13, 15),
(925, 14, 18),
(926, 15, 7),
(927, 17, 17),
(928, 18, 5),
(929, 20, 5),
(930, 21, 3),
(931, 23, 11),
(932, 24, 5),
(933, 25, 11),
(934, 26, 6),
(935, 27, 6),
(936, 28, 14),
(937, 29, 16),
(938, 30, 15),
(939, 31, 6),
(940, 32, 13),
(941, 33, 15),
(942, 34, 1),
(943, 35, 7),
(944, 36, 16),
(945, 37, 15),
(946, 39, 12),
(947, 40, 9),
(948, 97, 25),
(949, 98, 10),
(950, 99, 14),
(951, 102, 20),
(952, 103, 9),
(953, 104, 18);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
