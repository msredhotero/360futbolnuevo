-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 01-03-2016 a las 11:42:02
-- Versión del servidor: 5.6.26-cll-lve
-- Versión de PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sportsco_tressesentafutbol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bck-tbamonestados`
--

CREATE TABLE IF NOT EXISTS `bck-tbamonestados` (
  `idamonestado` int(11) NOT NULL AUTO_INCREMENT,
  `apellido` varchar(100) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `equipo` varchar(100) DEFAULT NULL,
  `amarillas` int(11) DEFAULT NULL,
  `refTorneo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idamonestado`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bck-tbconducta`
--

CREATE TABLE IF NOT EXISTS `bck-tbconducta` (
  `idconducta` int(11) NOT NULL AUTO_INCREMENT,
  `refequipo` int(11) NOT NULL,
  `puntos` int(11) NOT NULL,
  `refTorneo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idconducta`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bck-tbsuspendidos`
--

CREATE TABLE IF NOT EXISTS `bck-tbsuspendidos` (
  `idsuspendido` int(11) NOT NULL AUTO_INCREMENT,
  `apellido` varchar(100) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `equipo` varchar(100) DEFAULT NULL,
  `motivos` varchar(200) DEFAULT NULL,
  `refTorneo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idsuspendido`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bcktbgoleadores`
--

CREATE TABLE IF NOT EXISTS `bcktbgoleadores` (
  `idgoleador` int(11) NOT NULL AUTO_INCREMENT,
  `apellido` varchar(100) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `equipo` varchar(100) DEFAULT NULL,
  `goles` int(11) DEFAULT NULL,
  `grupo` varchar(10) NOT NULL,
  `refTorneo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idgoleador`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `copia_dbgruposequipos`
--

CREATE TABLE IF NOT EXISTS `copia_dbgruposequipos` (
  `idgrupoequipocopia` int(11) NOT NULL AUTO_INCREMENT,
  `IdGrupoEquipo` int(11) NOT NULL,
  `refEquipo` int(11) NOT NULL,
  `refGrupo` int(11) NOT NULL,
  `refTorneo` int(11) NOT NULL,
  PRIMARY KEY (`idgrupoequipocopia`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `copia_dbtorneoge`
--

CREATE TABLE IF NOT EXISTS `copia_dbtorneoge` (
  `IdTorneoGE` int(11) NOT NULL,
  `refGrupoEquipo` int(11) NOT NULL,
  `refTorneo` int(11) NOT NULL,
  PRIMARY KEY (`IdTorneoGE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbacumuladoamonestados`
--

CREATE TABLE IF NOT EXISTS `dbacumuladoamonestados` (
  `idacumuladoamonestado` int(11) NOT NULL AUTO_INCREMENT,
  `refjugador` int(11) NOT NULL,
  `refequipo` int(11) NOT NULL,
  `cantidad` smallint(6) NOT NULL,
  PRIMARY KEY (`idacumuladoamonestado`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbcontactos`
--

CREATE TABLE IF NOT EXISTS `dbcontactos` (
  `IdContacto` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `Apellido` varchar(100) NOT NULL,
  `Asunto` varchar(100) NOT NULL,
  `Mensaje` varchar(300) NOT NULL,
  `Telefono` bigint(20) DEFAULT NULL,
  `Mail` varchar(100) NOT NULL,
  `Domicilio` varchar(200) DEFAULT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`IdContacto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbequipos`
--

CREATE TABLE IF NOT EXISTS `dbequipos` (
  `IdEquipo` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `nombrecapitan` varchar(60) DEFAULT NULL,
  `telefonocapitan` varchar(45) DEFAULT NULL,
  `facebookcapitan` varchar(45) DEFAULT NULL,
  `nombresubcapitan` varchar(60) DEFAULT NULL,
  `telefonosubcapitan` varchar(45) DEFAULT NULL,
  `facebooksubcapitan` varchar(45) DEFAULT NULL,
  `emailcapitan` varchar(70) DEFAULT NULL,
  `emailsubcapitan` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`IdEquipo`),
  KEY `idcontacto` (`nombrecapitan`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Volcado de datos para la tabla `dbequipos`
--

INSERT INTO `dbequipos` (`IdEquipo`, `Nombre`, `nombrecapitan`, `telefonocapitan`, `facebookcapitan`, `nombresubcapitan`, `telefonosubcapitan`, `facebooksubcapitan`, `emailcapitan`, `emailsubcapitan`) VALUES
(1, 'Son Negocios', 'Yael Amarilla', '-', '-', '-', '-', '-', '-', '-'),
(2, 'Millonarios FC', '-', '-', '-', '-', '-', '-', '-', '-'),
(3, 'PKM', '-', '-', '-', '', '', '', '', ''),
(4, 'Cosa Nostra', '', '', '', '', '', '', '', ''),
(5, 'Pipiolos', '', '', '', '', '', '', '', ''),
(6, 'Villa Norcenter', '', '', '', '', '', '', '', ''),
(7, 'Buscamos Botineras', '', '', '', '', '', '', '', ''),
(8, 'Beccar City', 'Facundo Gallo', '1522700887', '', '', '', '', '', ''),
(9, 'Demut Und Herz', 'Sebatian Szewczuk', '15-3069-3535', '', '', '15-5462-3440', '', '', ''),
(10, 'Leon FC', 'Adrian Gorgone', '15-3071-0383', '', '15-3160-0094', '', '', '', ''),
(11, 'BVB', 'Sebastián Gonzalez', '15-3575-0932', '', '', '', '', '', ''),
(12, 'Bratislava', 'Gonzalo MabragaÃ??Ã?Â±a', '1551045459', '', '', '15-5181-2285', '', '', ''),
(13, 'Pato + 5', 'Gastón Merchan', '15-6448-3604', '', '', '', '', '', ''),
(14, 'Batatta FC', 'Alvaro Vena', '15-2315-8070', '', '', '15-*6609-0999', '', '', ''),
(15, 'La Naranja Mecánica', 'Cesar Alvarado', '', '', '', '', '', '', ''),
(16, 'Desprolijos Futebol', 'Facundo Barone', '1539313343', '', '', '', '', '', ''),
(17, 'Volando Bajito', 'Gerardo Giadanes', '1553441956', '', '', '', '', '', ''),
(18, 'La EG3', 'Gastón Ríos', '1541990963', '', '', '', '', '', ''),
(30, 'Gata Flora', 'Agustina Vigliotta', '1153699626', '', '', '', '', '', ''),
(20, 'Deportivo Quequen ', 'Luciano Bonaventura', '1122582272', '', '', '', '', '', ''),
(21, 'Nopoli', '', '', '', '', '', '', '', ''),
(22, 'Nombre a confirmar - F8SC', '', '', '', '', '', '', '', ''),
(23, 'Ghillighan', '', '', '', '', '', '', '', ''),
(24, 'EBDA', 'Jonatan Saavedra', '15-3672-0545', '', '', '', '', '', ''),
(25, 'Los Natalia Natalia', 'Pablo Gomez', '15-5123-3701', '', '', '', '', '', ''),
(26, 'Villa Tacho', '', '', '', '', '', '', '', ''),
(27, 'Pulpa SJ', 'Rodrigo Souto', '15-5056-1297', '', '', '', '', '', ''),
(28, 'Old School', 'Andres Almandos', '15-6195-7873', '', '', '', '', '', ''),
(29, 'Atigraditos', 'Andrea Werner', '', '', '', '', '', '', ''),
(31, 'Desamparadas de Hurlingham', 'Veronica Bravo', '1530362339', '', '', '', '', '', ''),
(32, 'Tampones de Punta', 'Sofia Seelig', '1540483732', '', '', '', '', '', ''),
(33, 'Villa 31', 'Giuliana Merello', '155953613', '', '', '', '', '', ''),
(34, 'Lalo FC', 'Antonella Aiello', '1140258908', '', '', '', '', '', '');

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
  `cancha` varchar(12) CHARACTER SET latin1 DEFAULT NULL,
  `chequeado` bit(1) NOT NULL,
  PRIMARY KEY (`Idfixture`),
  KEY `indices` (`reftorneoge_a`,`resultado_a`,`reftorneoge_b`,`resultado_b`,`refFecha`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=106 ;

--
-- Volcado de datos para la tabla `dbfixture`
--

INSERT INTO `dbfixture` (`Idfixture`, `reftorneoge_a`, `resultado_a`, `reftorneoge_b`, `resultado_b`, `fechajuego`, `refFecha`, `Hora`, `cancha`, `chequeado`) VALUES
(18, 2, NULL, 4, NULL, '2016-02-04', 25, '00:00:00', '1', b'1'),
(17, 1, NULL, 3, NULL, '2016-02-04', 25, '00:00:00', '1', b'1'),
(16, 3, NULL, 2, NULL, '2016-01-28', 24, '00:00:00', '1', b'1'),
(13, 1, NULL, 2, NULL, '2016-01-21', 23, '00:00:00', '1', b'1'),
(14, 4, NULL, 3, NULL, '2016-01-21', 23, '00:00:00', '1', b'1'),
(15, 1, NULL, 4, NULL, '2016-01-28', 24, '00:00:00', '1', b'1'),
(21, 11, NULL, 9, NULL, '2016-01-28', 24, '00:00:00', '1', b'1'),
(20, 9, NULL, 10, NULL, '2016-01-21', 23, '00:00:00', '1', b'1'),
(19, 11, NULL, 12, NULL, '2016-01-21', 23, '00:00:00', '1', b'1'),
(22, 10, NULL, 12, NULL, '2016-01-28', 24, '00:00:00', '1', b'1'),
(23, 11, NULL, 10, NULL, '2016-02-04', 25, '00:00:00', '1', b'1'),
(24, 12, NULL, 9, NULL, '2016-02-04', 25, '00:00:00', '1', b'1'),
(49, 33, NULL, 31, NULL, '2016-02-11', 26, '00:00:00', '1', b'0'),
(50, 32, NULL, 28, NULL, '2016-02-11', 26, '00:00:00', '1', b'0'),
(48, 28, NULL, 27, NULL, '2016-02-04', 25, '00:00:00', '1', b'1'),
(47, 32, NULL, 31, NULL, '2016-02-04', 25, '00:00:00', '1', b'1'),
(46, 33, NULL, 30, NULL, '2016-02-04', 25, '00:00:00', '1', b'1'),
(45, 28, NULL, 31, NULL, '2016-01-28', 24, '00:00:00', '1', b'1'),
(44, 32, NULL, 30, NULL, '2016-01-28', 24, '00:00:00', '1', b'1'),
(43, 33, NULL, 27, NULL, '2016-01-28', 24, '00:00:00', '1', b'1'),
(42, 31, NULL, 30, NULL, '2016-01-21', 23, '00:00:00', '1', b'1'),
(41, 32, NULL, 27, NULL, '2016-01-21', 23, '00:00:00', '1', b'1'),
(40, 33, NULL, 28, NULL, '2016-01-21', 23, '00:00:00', '1', b'1'),
(51, 27, NULL, 30, NULL, '2016-02-11', 26, '00:00:00', '1', b'0'),
(52, 33, NULL, 32, NULL, '2016-02-18', 27, '00:00:00', '1', b'1'),
(53, 28, NULL, 30, NULL, '2016-02-18', 27, '00:00:00', '1', b'1'),
(54, 31, NULL, 27, NULL, '2016-02-18', 27, '00:00:00', '1', b'0'),
(55, 8, 1, 6, 0, '2016-01-25', 23, '00:00:00', '1', b'1'),
(56, 5, 2, 7, 1, '2016-01-25', 23, '00:00:00', '1', b'1'),
(57, 8, 1, 5, 2, '2016-01-25', 24, '00:00:00', '1', b'1'),
(58, 7, 4, 6, 6, '2016-01-25', 24, '00:00:00', '1', b'1'),
(59, 8, 3, 7, 3, '2016-01-25', 25, '00:00:00', '1', b'1'),
(60, 6, 2, 5, 7, '2016-01-25', 25, '00:00:00', '1', b'1'),
(61, 34, NULL, 37, NULL, '2016-01-30', 23, '00:00:00', '1', b'1'),
(62, 35, NULL, 36, NULL, '2016-01-30', 23, '00:00:00', '1', b'1'),
(74, 34, NULL, 35, NULL, '2016-01-23', 24, '00:00:00', '1', b'1'),
(64, 36, NULL, 37, NULL, '2016-01-23', 24, '00:00:00', '1', b'1'),
(65, 34, 0, 36, 2, '2016-02-06', 25, '00:00:00', '1', b'1'),
(66, 37, NULL, 35, NULL, '2016-02-06', 25, '00:00:00', '1', b'1'),
(67, 41, NULL, 40, NULL, '2016-01-23', 23, '00:00:00', '1', b'1'),
(93, 39, 5, 38, 0, '2016-02-13', 23, '00:00:00', '1', b'1'),
(69, 41, NULL, 39, NULL, '2016-01-30', 24, '00:00:00', '1', b'1'),
(70, 38, NULL, 40, NULL, '2016-01-30', 24, '00:00:00', '1', b'1'),
(71, 41, NULL, 38, NULL, '2016-02-06', 25, '00:00:00', '1', b'1'),
(72, 40, NULL, 39, NULL, '2016-02-06', 25, '00:00:00', '1', b'1'),
(75, 47, NULL, 48, NULL, '2016-02-12', 23, '00:00:00', '1', b'1'),
(76, 49, NULL, 46, NULL, '2016-02-12', 23, '00:00:00', '1', b'1'),
(77, 47, 0, 49, 0, '2016-02-12', 24, '00:00:00', '1', b'1'),
(78, 46, 0, 48, 0, '2016-02-12', 24, '00:00:00', '1', b'1'),
(79, 47, NULL, 46, NULL, '2016-02-12', 25, '00:00:00', '1', b'1'),
(80, 48, NULL, 49, NULL, '2016-02-12', 25, '00:00:00', '1', b'1'),
(81, 53, NULL, 51, NULL, '2016-02-12', 23, '00:00:00', '1', b'1'),
(82, 52, NULL, 50, NULL, '2016-02-12', 23, '00:00:00', '1', b'1'),
(83, 53, NULL, 52, NULL, '2016-02-12', 24, '00:00:00', '1', b'1'),
(84, 50, 0, 51, 5, '2016-02-12', 24, '00:00:00', '1', b'1'),
(85, 53, NULL, 50, NULL, '2016-02-12', 25, '00:00:00', '1', b'1'),
(86, 51, NULL, 52, NULL, '2016-02-12', 25, '00:00:00', '1', b'1'),
(87, 54, NULL, 55, NULL, '2016-02-15', 23, '00:00:00', '1', b'1'),
(88, 56, NULL, 57, NULL, '2016-02-15', 23, '00:00:00', '1', b'1'),
(89, 54, NULL, 56, NULL, '2016-02-22', 24, '00:00:00', '1', b'1'),
(90, 57, NULL, 55, NULL, '2016-02-22', 24, '00:00:00', '1', b'1'),
(91, 54, NULL, 57, NULL, '2016-02-29', 25, '00:00:00', '1', b'1'),
(92, 55, NULL, 56, NULL, '2016-02-29', 25, '00:00:00', '1', b'1'),
(94, 64, 5, 65, 0, '2016-02-24', 23, '12:00:00', '1', b'1'),
(95, 67, NULL, 66, NULL, '2016-02-24', 23, '12:00:00', '1', b'1'),
(96, 64, NULL, 67, NULL, '2016-03-03', 24, '12:00:00', '1', b'0'),
(97, 66, NULL, 65, NULL, '2016-03-03', 24, '12:00:00', '1', b'0'),
(98, 64, NULL, 66, NULL, '2016-03-10', 25, '12:00:00', '1', b'0'),
(99, 65, NULL, 67, NULL, '2016-03-10', 25, '12:00:00', '1', b'0'),
(100, 74, NULL, 76, NULL, '2016-02-29', 23, '00:00:00', '1', b'1'),
(101, 77, NULL, 78, NULL, '2016-02-29', 23, '00:00:00', '1', b'0'),
(102, 74, NULL, 77, NULL, '2016-03-06', 24, '00:00:00', '1', b'0'),
(103, 78, NULL, 76, NULL, '2016-03-06', 24, '00:00:00', '1', b'0'),
(104, 74, NULL, 78, NULL, '2016-03-13', 25, '00:00:00', '1', b'0'),
(105, 76, NULL, 77, NULL, '2016-03-13', 25, '00:00:00', '1', b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbgrupos`
--

CREATE TABLE IF NOT EXISTS `dbgrupos` (
  `IdGrupo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  PRIMARY KEY (`IdGrupo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Volcado de datos para la tabla `dbgrupos`
--

INSERT INTO `dbgrupos` (`IdGrupo`, `nombre`) VALUES
(19, 'Grupo A'),
(20, 'Grupo B'),
(21, 'Primera C'),
(22, 'Copa de Oro'),
(23, 'Copa de Plata '),
(24, '2da Ronda - G. A'),
(25, 'Zona H'),
(26, 'Grupo A'),
(27, 'Grupo B'),
(28, 'Grupo A'),
(29, 'Grupo A'),
(30, 'Primera Z'),
(31, 'Copa de Oro'),
(32, 'Copa de Plata'),
(33, 'Copa de Oro'),
(34, 'Copa de Oro'),
(35, 'Primera A - Copa de Oro'),
(36, 'Copa de Oro'),
(37, 'Primera D'),
(38, 'Primera A - Grupo 1'),
(39, 'Primera A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbjugadores`
--

CREATE TABLE IF NOT EXISTS `dbjugadores` (
  `idjugador` int(11) NOT NULL AUTO_INCREMENT,
  `apellido` varchar(60) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `idequipo` int(11) NOT NULL DEFAULT '0',
  `dni` int(11) NOT NULL,
  `invitado` bit(1) DEFAULT b'0',
  `expulsado` bit(1) DEFAULT b'0',
  `email` varchar(120) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idjugador`),
  KEY `dni` (`dni`),
  KEY `idequipo` (`idequipo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=174 ;

--
-- Volcado de datos para la tabla `dbjugadores`
--

INSERT INTO `dbjugadores` (`idjugador`, `apellido`, `nombre`, `idequipo`, `dni`, `invitado`, `expulsado`, `email`, `facebook`) VALUES
(1, 'Merica', 'Pablo', 2, 0, b'0', b'0', '', ''),
(2, 'Lopez', 'Facundo', 3, 2147483647, b'0', b'0', '', ''),
(3, 'Bustamante', 'Sergio', 8, 30456158, b'0', b'0', '', ''),
(4, 'Scarelle', 'Fabio', 8, 34504693, b'0', b'0', '', ''),
(5, 'Gallo', 'Facundo', 8, 35338117, b'0', b'0', '', ''),
(6, 'Dirino', 'Juan', 8, 32556498, b'0', b'0', '', ''),
(7, 'Ramirez', 'Facundo', 8, 33574172, b'0', b'0', '', ''),
(8, 'Perez', 'Mario', 8, 34504445, b'0', b'0', '', ''),
(9, 'Gomez', 'Juan', 8, 33676253, b'0', b'0', '', ''),
(10, 'Moyano', 'Yamil', 8, 35391705, b'0', b'0', '', ''),
(11, 'Francolino', 'Daniel', 6, 35799019, b'0', b'0', '', ''),
(12, 'Cabral', 'Jonatan Damián', 6, 33084818, b'0', b'0', '', ''),
(13, 'Fournier', 'Ramón', 6, 29153302, b'0', b'0', '', ''),
(14, 'Almada', 'Federico', 6, 39529588, b'0', b'0', '', ''),
(15, 'Araya', 'Facundo', 6, 39921725, b'0', b'0', '', ''),
(16, 'Toledo', 'Franco', 6, 37894337, b'0', b'0', '', ''),
(17, 'Ziella', 'Santiago', 5, 35427580, b'0', b'0', '', ''),
(18, 'Zucchi', 'Federico', 5, 35201832, b'0', b'0', '', ''),
(19, 'Muñoz', 'Joan', 5, 35218593, b'0', b'0', '', ''),
(20, 'López', 'Enrique', 5, 33689302, b'0', b'0', '', ''),
(21, 'Sartore', 'Rodrigo', 5, 35605831, b'0', b'0', '', ''),
(22, 'Vazquez', 'Leonardo', 5, 36567012, b'0', b'0', '', ''),
(23, 'Garagorri', 'Bernardo', 5, 34695775, b'0', b'0', '', ''),
(24, 'Morbelli', 'Omar', 5, 32649330, b'0', b'0', '', ''),
(25, 'Hernandez', 'Nicolás', 5, 37246570, b'0', b'0', '', ''),
(26, 'Monasterio', 'Nicolás', 7, 30218047, b'0', b'0', '', ''),
(27, 'Roscher', 'Daniel', 7, 31865625, b'0', b'0', '', ''),
(28, 'Rossi', 'Ezequiel', 7, 29393587, b'0', b'0', '', ''),
(29, 'Monasterio', 'Pablo', 7, 32386491, b'0', b'0', '', ''),
(30, 'Wasiuk', 'Sergio', 7, 32178926, b'0', b'0', '', ''),
(31, 'Rempel', 'Martin Fernando', 4, 28695158, b'0', b'0', '', ''),
(32, 'Yance', 'Leonardo', 4, 28474041, b'0', b'0', '', ''),
(33, 'Aybar', 'Matias', 4, 31649575, b'0', b'0', '', ''),
(34, 'Aybar', 'Pablo', 4, 34522057, b'0', b'0', '', ''),
(35, 'Mangudo', 'Lucas', 4, 30651947, b'0', b'0', '', ''),
(36, 'Reggi', 'Patricio', 4, 30978178, b'0', b'0', '', ''),
(37, 'Amarilla', 'Yael', 1, 33910800, b'0', b'0', '', ''),
(38, 'Canteros', 'Martin', 1, 38167086, b'0', b'0', '', ''),
(39, 'Nabal', 'Facundo', 1, 38665813, b'0', b'0', '', ''),
(40, 'Accoroni', 'Juan', 1, 33803483, b'0', b'0', '', ''),
(41, 'Valente', 'Sebastián', 1, 27330876, b'0', b'0', '', ''),
(42, 'Corsini', 'Mariano', 1, 33525137, b'0', b'0', '', ''),
(43, 'Pena', 'Nicolás', 3, 31519536, b'0', b'0', '', ''),
(44, 'Lopez', 'Facundo', 3, 31407397, b'0', b'0', '', ''),
(45, 'Veira', 'Joan', 3, 31660254, b'0', b'0', '', ''),
(46, 'Soler', 'Gonzalo', 3, 30460566, b'0', b'0', '', ''),
(47, 'Alvarez', 'Jeremías', 3, 29656926, b'0', b'0', '', ''),
(48, 'Anacona', 'Cristian', 2, 37849995, b'0', b'0', '', ''),
(49, 'Merica', 'Pablo', 2, 28984074, b'0', b'0', '', ''),
(50, 'Carrizo', 'Maximiliano', 2, 34430830, b'0', b'0', '', ''),
(51, 'Morales', 'Lucas', 2, 31076720, b'0', b'0', '', ''),
(52, 'Cantero', 'Matias', 2, 34798530, b'0', b'0', '', ''),
(53, 'Lerner', 'Andrés', 5, 34755199, b'0', b'0', '', ''),
(54, 'Ponti', 'Federico', 14, 31083631, b'0', b'0', '', ''),
(55, 'Vena', 'Alvaro', 14, 31552295, b'0', b'0', '', ''),
(56, 'Dalla Cia', 'Juan Pablo', 14, 30784061, b'0', b'0', '', ''),
(57, 'Falcone ', 'Franco', 14, 32699720, b'0', b'0', '', ''),
(58, 'Bustamante', 'Guillermo', 14, 30391830, b'0', b'0', '', ''),
(59, 'Lopez', 'Matias', 14, 34304050, b'0', b'0', '', ''),
(60, 'Merchan', 'Patricio', 13, 32800124, b'0', b'0', '', ''),
(61, 'Merchan', 'Martin', 13, 34535387, b'0', b'0', '', ''),
(62, 'Merchan', 'Gaston', 13, 31708330, b'0', b'0', '', ''),
(63, 'Arevalo', 'Fernando', 13, 27284915, b'0', b'0', '', ''),
(64, 'Caputti', 'Roberto', 13, 23864206, b'0', b'0', '', ''),
(65, 'Merchan', 'Facundo', 13, 37766543, b'0', b'0', '', ''),
(66, 'Mabragaña', 'Gonzalo', 12, 32515361, b'0', b'0', '', ''),
(67, 'Ferreyra', 'Lucas', 12, 36170028, b'0', b'0', '', ''),
(68, 'Aranda', 'Juan Cruz', 12, 30393495, b'0', b'0', '', ''),
(69, 'Pierro', 'Humberto', 12, 32890826, b'0', b'0', '', ''),
(70, 'Vandomselaar', 'Axel', 12, 29192895, b'0', b'0', '', ''),
(71, 'Tomicha', 'Diego', 12, 93966101, b'0', b'0', '', ''),
(72, 'Sanchez', 'Oscar', 12, 29361024, b'0', b'0', '', ''),
(73, 'Gonzalez', 'Sebastian', 11, 33992735, b'0', b'0', '', ''),
(74, 'Gargiulo', 'Javier', 11, 33442938, b'0', b'0', '', ''),
(75, 'Torazini', 'Fernando', 11, 33298636, b'0', b'0', '', ''),
(76, 'Dominguez', 'Ezequiel', 11, 33557783, b'0', b'0', '', ''),
(77, 'Pascual', 'Pablo', 11, 32191676, b'0', b'0', '', ''),
(78, 'Szewczuk', 'Sebastián', 9, 32678703, b'0', b'0', '', ''),
(79, 'Del Torto', 'Gastón', 9, 35989665, b'0', b'0', '', ''),
(80, 'Quinteros', 'Facundo', 9, 36636231, b'0', b'0', '', ''),
(81, 'Artidi', 'Pablo', 9, 35363250, b'0', b'0', '', ''),
(82, 'Grimoldi', 'Maximiliano', 9, 36153770, b'0', b'0', '', ''),
(83, 'Artesi', 'Matías', 9, 30743344, b'0', b'0', '', ''),
(84, 'Gorgone', 'Adrián', 10, 35232826, b'0', b'0', '', ''),
(85, 'Vargas', 'Hernán', 10, 37057586, b'0', b'0', '', ''),
(86, 'Braun', 'Alejandro', 10, 36901373, b'0', b'0', '', ''),
(87, 'Fernandez', 'Ezequiel', 10, 34498142, b'0', b'0', '', ''),
(88, 'Alvarez', 'Ezequiel', 10, 33897487, b'0', b'0', '', ''),
(89, 'Ovejero', 'Santiago', 10, 35350216, b'0', b'0', '', ''),
(90, 'Lino', 'Antonio', 15, 72553196, b'0', b'0', '', ''),
(91, 'Pantero', 'Mario', 15, 9585393, b'0', b'0', '', ''),
(92, 'Portilla', 'Jorge', 16, 30952191, b'0', b'0', '', ''),
(93, 'Romero', 'Eduardo', 16, 29133587, b'0', b'0', '', ''),
(94, 'Gomez', 'Nicolás', 16, 41127776, b'0', b'0', '', ''),
(95, 'Valdarino', 'Alexis', 16, 34682961, b'0', b'0', '', ''),
(96, 'Chilavert', 'Gastón', 16, 35253495, b'0', b'0', '', ''),
(97, 'Silva', 'Ricardo', 16, 30943710, b'0', b'0', '', ''),
(98, 'Tirabassi', 'Hernán', 18, 34304422, b'0', b'0', '', ''),
(99, 'Marischi', 'Patricio', 18, 29152127, b'0', b'0', '', ''),
(100, 'Wassouf', 'Juan Manuel', 18, 29544873, b'0', b'0', '', ''),
(101, 'Mastronicola', 'Ariel', 18, 24563014, b'0', b'0', '', ''),
(102, 'Wengerowsky', 'Yair', 18, 34705262, b'0', b'0', '', ''),
(121, 'Giadanes', 'Gerardo', 17, 29153649, b'0', b'0', '', ''),
(104, 'Garcia', 'Facundo', 17, 41414144, b'0', b'0', '', ''),
(105, 'Farias ', 'Sebastian', 10, 36882246, b'0', b'0', '', ''),
(106, 'Ganin ', 'Nicolas', 14, 28577760, b'0', b'0', '', ''),
(107, 'Bruno', 'Mauro', 8, 36415337, b'0', b'0', '', ''),
(108, 'Vadillo', 'Juan', 6, 38255540, b'0', b'0', '', ''),
(109, 'Barone', 'Facundo', 16, 32267797, b'0', b'0', '', ''),
(110, 'Barone', 'Francisco', 16, 35374692, b'0', b'0', '', ''),
(111, 'Scaricabarozzi', 'Hugo', 21, 30887848, b'0', b'0', '', ''),
(112, 'Oyhenard', 'Pablo', 21, 30649888, b'0', b'0', '', ''),
(113, 'Coronas', 'Mariano', 21, 27259398, b'0', b'0', '', ''),
(114, 'Lacona', 'Sebastian', 21, 31977617, b'0', b'0', '', ''),
(115, 'Castro', 'Matias', 21, 32952713, b'0', b'0', '', ''),
(116, 'Gil Dalco', 'Julian', 16, 36530131, b'0', b'0', '', ''),
(117, 'Bonaventura', 'Luciano', 20, 33698654, b'0', b'0', '', ''),
(118, 'Fernandez', 'Javier', 20, 35755478, b'0', b'0', '', ''),
(119, 'Salaño', 'Emiliano', 18, 29698456, b'0', b'0', '', ''),
(120, 'Perez', 'Maxi', 18, 32064285, b'0', b'0', '', ''),
(122, 'Esparza', 'Christian', 12, 32384053, b'0', b'0', '', ''),
(123, 'Esparza', 'Matias', 12, 35325731, b'0', b'0', '', ''),
(124, 'Mara', 'Rodrigo', 12, 30223721, b'0', b'0', '', ''),
(125, 'Tripa', 'Fernando', 12, 30606051, b'0', b'0', '', ''),
(126, 'Velasco', 'Gonzalo', 15, 30749576, b'0', b'0', '', ''),
(127, 'De Angeli', 'Alexis', 23, 35712851, b'0', b'0', '', ''),
(128, 'Cassia', 'Stefano', 23, 35972138, b'0', b'0', '', ''),
(129, 'De Lorenzo', 'Patricio', 9, 35972549, b'0', b'0', '', ''),
(130, 'Alvarez', 'Gaston', 10, 34037019, b'0', b'0', '', ''),
(131, 'Jacomelli', 'Raul', 13, 22819713, b'0', b'0', '', ''),
(132, 'Sanzone', 'Juan', 11, 33298513, b'0', b'0', '', ''),
(133, 'Di Santi', 'Tomas', 1, 34512568, b'0', b'0', '', ''),
(134, 'Branciari', 'Esteban', 3, 31344607, b'0', b'0', '', ''),
(135, 'Pan', 'Nicolas', 7, 40762413, b'0', b'0', '', ''),
(136, 'Alonso', 'Rodrigo', 7, 29592165, b'0', b'0', '', ''),
(137, 'Fraga', 'Rodrigo', 4, 31854854, b'0', b'0', '', ''),
(138, 'Grizzo ', 'Federico', 9, 35962213, b'0', b'0', '', ''),
(139, 'Nieva', 'Matias', 9, 37804755, b'0', b'0', '', ''),
(140, 'Jacomelli', 'Martin', 13, 35274922, b'0', b'0', '', ''),
(141, 'Reynobuch', 'Juan', 1, 35349829, b'0', b'0', '', ''),
(142, 'Pan', 'Fernando', 7, 30226201, b'0', b'0', '', ''),
(143, 'Saavedra', 'Aaron', 24, 35137234, b'0', b'0', '', ''),
(144, 'Saavedra', 'Jonatan', 24, 32421741, b'0', b'0', '', ''),
(145, 'Gomez', 'Pablo', 25, 27382752, b'0', b'0', '', ''),
(146, 'Anriquez', 'Walter', 25, 28151579, b'0', b'0', '', ''),
(147, 'Gomez', 'Marcos', 25, 33026941, b'0', b'0', '', ''),
(148, 'Mendez', 'Leandro', 25, 33896946, b'0', b'0', '', ''),
(149, 'Castellucci', 'Jorge', 25, 37685978, b'0', b'0', '', ''),
(150, 'Fontanella', 'Facundo', 26, 38857950, b'0', b'0', '', ''),
(151, 'Castelo', 'Emiliano', 26, 35167014, b'0', b'0', '', ''),
(152, 'Perez', 'Gustavo', 26, 36644320, b'0', b'0', '', ''),
(153, 'Collazo', 'Diego', 27, 31722263, b'0', b'0', '', ''),
(154, 'Souto', 'Rodrigo', 27, 34535719, b'0', b'0', '', ''),
(155, 'Sosa', 'Julian', 27, 40252054, b'0', b'0', '', ''),
(156, 'Rios', 'Gaston', 18, 27540452, b'0', b'0', '', ''),
(157, 'Bainrtemy', 'Yago', 18, 396644441, b'0', b'0', '', ''),
(158, 'Zapota ', 'Gabriel', 12, 35569191, b'0', b'0', '', ''),
(159, 'Tejera', 'Federico', 17, 29042514, b'0', b'0', '', ''),
(160, 'Beck', 'Gustavo', 17, 30445358, b'0', b'0', '', ''),
(161, 'Varano', 'Cristian', 20, 32187718, b'0', b'0', '', ''),
(162, 'Piatenasi', 'Juan', 20, 27997734, b'0', b'0', '', ''),
(163, 'Romero', 'Daniel', 16, 34630190, b'0', b'0', '', ''),
(164, 'Villafante', 'Juan', 23, 35168672, b'0', b'0', '', ''),
(165, 'Coronas', 'Javier', 21, 31208311, b'0', b'0', '', ''),
(166, 'Zuni', 'Matias', 21, 35227053, b'0', b'0', '', ''),
(167, 'Deacom', 'Malcom', 7, 32665603, b'0', b'0', '', ''),
(168, 'Panizza', 'Ezequiel', 2, 32783050, b'0', b'0', '', ''),
(169, 'Barboza', 'Juan', 6, 40735092, b'0', b'0', '', ''),
(170, 'Vigliotta', 'Agustina', 30, 35718405, b'0', b'0', '', ''),
(171, 'Labanca', 'Mariela', 31, 34102180, b'0', b'0', '', ''),
(172, 'Ramos', 'Mariela', 31, 32259679, b'0', b'0', '', ''),
(173, 'Gonzalez', 'Camila', 31, 39960452, b'0', b'0', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbnoticiapredio`
--

CREATE TABLE IF NOT EXISTS `dbnoticiapredio` (
  `idnoticiapredio` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(150) NOT NULL,
  `noticiapredio` varchar(1000) DEFAULT NULL,
  `fechacreacion` datetime DEFAULT NULL,
  PRIMARY KEY (`idnoticiapredio`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbnoticiaprincipal`
--

CREATE TABLE IF NOT EXISTS `dbnoticiaprincipal` (
  `idnoticiaprincipal` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(150) NOT NULL,
  `noticiaprincipal` varchar(1000) DEFAULT NULL,
  `fechacreacion` datetime DEFAULT NULL,
  PRIMARY KEY (`idnoticiaprincipal`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbnoticias`
--

CREATE TABLE IF NOT EXISTS `dbnoticias` (
  `idnoticia` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `parrafo` varchar(10000) DEFAULT NULL,
  `fechacreacion` datetime DEFAULT NULL,
  `galeria` bit(1) DEFAULT NULL,
  PRIMARY KEY (`idnoticia`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbpagos`
--

CREATE TABLE IF NOT EXISTS `dbpagos` (
  `idpago` int(11) NOT NULL AUTO_INCREMENT,
  `refequipo` bigint(20) NOT NULL,
  `reftorneo` int(11) NOT NULL,
  `refzona` int(11) NOT NULL,
  `reffecha` int(11) NOT NULL,
  `importe` decimal(10,2) NOT NULL DEFAULT '0.00',
  `observacion` varchar(400) DEFAULT NULL,
  `fechacreacion` date DEFAULT NULL,
  PRIMARY KEY (`idpago`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `dbpagos`
--

INSERT INTO `dbpagos` (`idpago`, `refequipo`, `reftorneo`, `refzona`, `reffecha`, `importe`, `observacion`, `fechacreacion`) VALUES
(1, 8, 1, 19, 23, '500.00', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbplayoff`
--

CREATE TABLE IF NOT EXISTS `dbplayoff` (
  `idplayoff` int(11) NOT NULL AUTO_INCREMENT,
  `reftorneo` int(11) NOT NULL,
  `refzona` int(11) NOT NULL,
  `refequipo` int(11) NOT NULL,
  `fechacreacion` date NOT NULL,
  PRIMARY KEY (`idplayoff`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `dbplayoff`
--

INSERT INTO `dbplayoff` (`idplayoff`, `reftorneo`, `refzona`, `refequipo`, `fechacreacion`) VALUES
(1, 4, 19, 12, '2016-01-30'),
(2, 4, 19, 17, '2016-01-30'),
(3, 4, 19, 18, '2016-01-30'),
(4, 4, 19, 20, '2016-01-30'),
(5, 4, 23, 28, '2016-02-24'),
(6, 4, 23, 17, '2016-02-24'),
(7, 4, 23, 19, '2016-02-24'),
(8, 4, 23, 21, '2016-02-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbreemplazo`
--

CREATE TABLE IF NOT EXISTS `dbreemplazo` (
  `idreemplazo` int(11) NOT NULL AUTO_INCREMENT,
  `refequipo` int(11) NOT NULL,
  `refequiporeemplazado` int(11) NOT NULL,
  `puntos` smallint(6) NOT NULL DEFAULT '0',
  `golesencontra` smallint(6) NOT NULL DEFAULT '0',
  `reffecha` smallint(6) DEFAULT NULL,
  `reftorneo` int(11) NOT NULL,
  PRIMARY KEY (`idreemplazo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbreemplazovolvio`
--

CREATE TABLE IF NOT EXISTS `dbreemplazovolvio` (
  `idreemplazovolvio` int(11) NOT NULL AUTO_INCREMENT,
  `refreemplazo` int(11) NOT NULL,
  `refzona` int(11) NOT NULL,
  PRIMARY KEY (`idreemplazovolvio`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbresultados`
--

CREATE TABLE IF NOT EXISTS `dbresultados` (
  `IdResultado` int(11) NOT NULL AUTO_INCREMENT,
  `refGrupoEquipo` int(11) NOT NULL,
  `PJ` tinyint(4) NOT NULL DEFAULT '0',
  `PG` tinyint(4) NOT NULL DEFAULT '0',
  `PP` tinyint(4) NOT NULL DEFAULT '0',
  `PE` tinyint(4) NOT NULL DEFAULT '0',
  `GA` tinyint(4) NOT NULL DEFAULT '0',
  `GE` tinyint(4) NOT NULL DEFAULT '0',
  `PTS` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IdResultado`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbsuspendidosfechas`
--

CREATE TABLE IF NOT EXISTS `dbsuspendidosfechas` (
  `idsuspendidofecha` int(11) NOT NULL AUTO_INCREMENT,
  `refjugador` int(11) NOT NULL,
  `refequipo` int(11) NOT NULL,
  `reffecha` smallint(6) NOT NULL,
  `refsuspendido` int(11) NOT NULL,
  PRIMARY KEY (`idsuspendidofecha`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `dbsuspendidosfechas`
--

INSERT INTO `dbsuspendidosfechas` (`idsuspendidofecha`, `refjugador`, `refequipo`, `reffecha`, `refsuspendido`) VALUES
(4, 52, 2, 26, 3),
(3, 55, 14, 24, 2);

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
  `activo` bit(1) NOT NULL,
  PRIMARY KEY (`IdTorneoGE`),
  KEY `indices` (`refgrupo`,`reftorneo`,`refequipo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=79 ;

--
-- Volcado de datos para la tabla `dbtorneoge`
--

INSERT INTO `dbtorneoge` (`IdTorneoGE`, `refgrupo`, `reftorneo`, `refequipo`, `prioridad`, `activo`) VALUES
(1, 19, 1, 2, 1, b'0'),
(2, 19, 1, 3, 2, b'0'),
(3, 19, 1, 5, 3, b'0'),
(4, 19, 1, 7, 4, b'0'),
(5, 19, 2, 8, 0, b'0'),
(6, 19, 2, 7, 0, b'0'),
(7, 19, 2, 7, 0, b'0'),
(8, 19, 2, 4, 0, b'0'),
(9, 20, 1, 8, 7, b'0'),
(10, 20, 1, 6, 8, b'0'),
(11, 20, 1, 1, 5, b'0'),
(12, 20, 1, 4, 6, b'0'),
(34, 19, 4, 12, 1, b'0'),
(33, 19, 3, 9, 2, b'0'),
(30, 19, 3, 12, 0, b'0'),
(28, 19, 3, 10, 0, b'0'),
(31, 19, 3, 11, 0, b'0'),
(27, 19, 3, 13, 1, b'0'),
(32, 19, 3, 14, 0, b'0'),
(35, 19, 4, 20, 2, b'0'),
(36, 19, 4, 18, 3, b'0'),
(37, 19, 4, 17, 4, b'0'),
(38, 20, 4, 21, 5, b'0'),
(39, 20, 4, 23, 6, b'0'),
(40, 20, 4, 16, 7, b'0'),
(41, 20, 4, 15, 8, b'0'),
(48, 22, 6, 5, 0, b'0'),
(47, 22, 6, 2, 2, b'0'),
(49, 22, 6, 8, 0, b'0'),
(46, 22, 6, 6, 1, b'0'),
(50, 19, 7, 4, 1, b'0'),
(51, 19, 7, 3, 4, b'0'),
(52, 19, 7, 7, 2, b'0'),
(53, 19, 7, 1, 3, b'0'),
(54, 19, 8, 24, 1, b'0'),
(55, 19, 8, 25, 2, b'0'),
(56, 19, 8, 27, 3, b'0'),
(57, 19, 8, 26, 4, b'0'),
(58, 22, 4, 20, 1, b'0'),
(59, 22, 4, 18, 3, b'0'),
(60, 22, 4, 16, 2, b'0'),
(61, 23, 4, 19, 0, b'0'),
(62, 23, 4, 17, 0, b'0'),
(63, 23, 4, 28, 0, b'0'),
(64, 19, 10, 5, 0, b'0'),
(65, 19, 10, 8, 0, b'0'),
(66, 19, 10, 20, 3, b'0'),
(67, 19, 10, 23, 1, b'0'),
(78, 19, 12, 33, 0, b'0'),
(74, 19, 12, 30, 0, b'0'),
(70, 19, 4, 17, 0, b'0'),
(77, 19, 12, 34, 0, b'0'),
(72, 23, 4, 21, 0, b'0'),
(76, 19, 12, 31, 0, b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbtorneos`
--

CREATE TABLE IF NOT EXISTS `dbtorneos` (
  `IdTorneo` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(200) NOT NULL,
  `FechaCreacion` date NOT NULL,
  `Activo` bit(1) NOT NULL,
  `reftipotorneo` smallint(6) NOT NULL,
  PRIMARY KEY (`IdTorneo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `dbtorneos`
--

INSERT INTO `dbtorneos` (`IdTorneo`, `Nombre`, `FechaCreacion`, `Activo`, `reftipotorneo`) VALUES
(1, 'Torneo de Verano F5 Futbol Point', '0000-00-00', b'0', 1),
(2, 'Torneo Marcos Prueba', '2016-01-25', b'1', 7),
(3, 'F5 Jueves Torneo de Verano Capital 2016', '0000-00-00', b'1', 8),
(4, 'F8 Sábados Capital - Torneo de Verano 2016', '2016-01-23', b'1', 3),
(6, 'F5 Jueves Torneo de Verano Zona Norte 2016 - Copa de Oro', '0000-00-00', b'0', 1),
(7, 'F5 Jueves Torneo de Verano Zona Norte 2016 - Copa de Plata', '0000-00-00', b'1', 1),
(8, 'F6 Sábados ZN - Torneo de Verano 2016', '0000-00-00', b'1', 9),
(10, 'Apertura 2016', '2016-02-24', b'0', 1),
(11, 'Apertura Futbol Femenino', '2016-02-28', b'0', 4),
(12, 'Torneo de Verano Femenino Area Chica', '2016-02-28', b'1', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbtorneossedes`
--

CREATE TABLE IF NOT EXISTS `dbtorneossedes` (
  `idtorneosede` int(11) NOT NULL AUTO_INCREMENT,
  `reftorneo` int(11) NOT NULL,
  `refsede` int(11) NOT NULL,
  PRIMARY KEY (`idtorneosede`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=36 ;

--
-- Volcado de datos para la tabla `dbtorneossedes`
--

INSERT INTO `dbtorneossedes` (`idtorneosede`, `reftorneo`, `refsede`) VALUES
(1, 2, 3),
(6, 3, 4),
(7, 2, 3),
(8, 2, 3),
(9, 3, 4),
(10, 2, 3),
(11, 3, 4),
(12, 4, 4),
(13, 5, 3),
(18, 6, 3),
(15, 6, 3),
(16, 7, 3),
(17, 8, 5),
(19, 7, 3),
(20, 7, 3),
(21, 6, 3),
(22, 6, 3),
(23, 6, 3),
(24, 7, 3),
(25, 6, 3),
(26, 7, 3),
(27, 7, 3),
(28, 6, 3),
(29, 9, 3),
(30, 6, 3),
(31, 10, 5),
(32, 6, 3),
(33, 7, 3),
(34, 11, 5),
(35, 12, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbturnos`
--

CREATE TABLE IF NOT EXISTS `dbturnos` (
  `idturno` tinyint(4) NOT NULL AUTO_INCREMENT,
  `horario` varchar(20) DEFAULT NULL,
  `equipoa` varchar(200) DEFAULT NULL,
  `equipob` varchar(200) DEFAULT NULL,
  `cancha` varchar(20) DEFAULT NULL,
  `turno` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idturno`),
  KEY `cancha` (`cancha`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbturnosequiposprioridad`
--

CREATE TABLE IF NOT EXISTS `dbturnosequiposprioridad` (
  `iddbturnosequiposprioridad` int(11) NOT NULL AUTO_INCREMENT,
  `reftorneoge` int(11) NOT NULL,
  `refturno` int(11) NOT NULL,
  `valor` smallint(6) NOT NULL,
  PRIMARY KEY (`iddbturnosequiposprioridad`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `dbturnosequiposprioridad`
--

INSERT INTO `dbturnosequiposprioridad` (`iddbturnosequiposprioridad`, `reftorneoge`, `refturno`, `valor`) VALUES
(1, 64, 1, 1),
(2, 65, 1, 1),
(3, 66, 1, 1),
(4, 67, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbusuarios`
--

CREATE TABLE IF NOT EXISTS `dbusuarios` (
  `IdUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(30) NOT NULL,
  `refContacto` int(11) NOT NULL,
  `Pass` varchar(30) NOT NULL,
  `Activo` bit(1) NOT NULL,
  PRIMARY KEY (`IdUsuario`),
  KEY `idcontacto` (`refContacto`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoja1`
--

CREATE TABLE IF NOT EXISTS `hoja1` (
  `Grupo` varchar(255) DEFAULT NULL,
  `Hora` varchar(255) DEFAULT NULL,
  `EquipoA` varchar(255) DEFAULT NULL,
  `EquipoB` varchar(255) DEFAULT NULL,
  `resultadoa` varchar(255) DEFAULT NULL,
  `resultadob` varchar(255) DEFAULT NULL,
  `FechaJuego` varchar(255) DEFAULT NULL,
  `Fecha` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoja1jugadores`
--

CREATE TABLE IF NOT EXISTS `hoja1jugadores` (
  `Apellido` varchar(255) DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Equipo` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoja2`
--

CREATE TABLE IF NOT EXISTS `hoja2` (
  `Grupo` varchar(255) DEFAULT NULL,
  `Hora` varchar(255) DEFAULT NULL,
  `EquipoA` varchar(255) DEFAULT NULL,
  `nada` varchar(255) DEFAULT NULL,
  `EquipoB` varchar(255) DEFAULT NULL,
  `resultadoa` varchar(255) DEFAULT NULL,
  `nada1` varchar(255) DEFAULT NULL,
  `resultadob` varchar(255) DEFAULT NULL,
  `FechaJuego` varchar(255) DEFAULT NULL,
  `Fecha` varchar(255) DEFAULT NULL,
  `K` varchar(255) DEFAULT NULL,
  `L` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juagadoresnuevos`
--

CREATE TABLE IF NOT EXISTS `juagadoresnuevos` (
  `apellido` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dni` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `refequipo` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `predio_menu`
--

CREATE TABLE IF NOT EXISTS `predio_menu` (
  `idmenu` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `icono` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Orden` smallint(6) DEFAULT NULL,
  `hover` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `permiso` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idmenu`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `predio_menu`
--

INSERT INTO `predio_menu` (`idmenu`, `url`, `icono`, `nombre`, `Orden`, `hover`, `permiso`) VALUES
(1, '../torneos/', 'icotorneos', 'Torneos', 6, NULL, 'Administrador'),
(2, '../equipos/', 'icoequipos', 'Equipos', 7, NULL, 'Administrador'),
(3, '../zonas/', 'icozonas', 'Categorias', 8, NULL, 'Administrador'),
(4, '../zonasequipos/', 'icozonasequipos', 'Categorias-Equipos', 10, NULL, 'Administrador'),
(5, '../fixture/', 'icofixture', 'Fixture', 11, NULL, 'Administrador'),
(6, '../jugadores/', 'icojugadores', 'Jugadores', 9, NULL, 'Administrador'),
(7, '../estadisticas/', 'icochart', 'Estadisticas', 12, NULL, 'Marcos'),
(8, '../fairplay/', 'icofairplay', 'FairPlay', 13, NULL, 'Administrador'),
(10, '../suspendidos/', 'icosuspendidos', 'Suspendidos', 14, NULL, 'Administrador'),
(19, '../pagos/', 'icopagos', 'Pagos', 16, NULL, 'Administrador'),
(12, '../logout.php', 'icosalir', 'Salir', 30, NULL, 'Administrador, Empleado'),
(13, '../index.php', 'icodashboard', 'Dashboard', 1, NULL, 'Administrador, Empleado'),
(14, '../planillas/', 'icoreportes', 'Planillas', 17, NULL, 'Administrador'),
(20, '../playoff/', 'icoplayoff', 'PlayOff', 15, NULL, 'Administrador'),
(16, '../sedes/', 'icosedes', 'Sedes', 2, NULL, 'Administrador'),
(17, '../horarios/', 'icoturnos', 'Horarios', 3, NULL, 'Administrador'),
(18, '../canchas/', 'icocanchas', 'Canchas', 4, NULL, 'Administrador'),
(21, '../tipotorneo/', 'icotorneos', 'Tipo Torneo', 5, NULL, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `se_usuarios`
--

CREATE TABLE IF NOT EXISTS `se_usuarios` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(70) NOT NULL,
  `password` varchar(10) NOT NULL,
  `refroll` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nombrecompleto` varchar(70) NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `se_usuarios`
--

INSERT INTO `se_usuarios` (`idusuario`, `usuario`, `password`, `refroll`, `email`, `nombrecompleto`) VALUES
(1, 'info@tressesentafutbol.com', '123456', 'Administrador', 'info@tressesentafutbol.com', '360 Fútbol');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `table43`
--

CREATE TABLE IF NOT EXISTS `table43` (
  `Id` int(4) DEFAULT NULL,
  `APELLIDO Y NOMBRE` varchar(31) DEFAULT NULL,
  `DNI` varchar(9) DEFAULT NULL,
  `refid` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `table44`
--

CREATE TABLE IF NOT EXISTS `table44` (
  `Id1` int(2) DEFAULT NULL,
  `NombreEquipo` varchar(30) DEFAULT NULL,
  `capitan` varchar(21) DEFAULT NULL,
  `capitantelefono` varchar(15) DEFAULT NULL,
  `capitanemail` varchar(34) DEFAULT NULL,
  `capitanfacebook` varchar(26) DEFAULT NULL,
  `subcapitan` varchar(25) DEFAULT NULL,
  `subcapitantelefono` varchar(15) DEFAULT NULL,
  `subcapitanemail` varchar(32) DEFAULT NULL,
  `subcapitanfacebook` varchar(25) DEFAULT NULL,
  `id` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbamonestados`
--

CREATE TABLE IF NOT EXISTS `tbamonestados` (
  `idamonestado` int(11) NOT NULL AUTO_INCREMENT,
  `refjugador` int(11) NOT NULL,
  `refequipo` int(11) NOT NULL,
  `reffixture` int(11) NOT NULL,
  `amarillas` tinyint(4) DEFAULT NULL,
  `azul` tinyint(4) DEFAULT NULL,
  `rojas` tinyint(4) DEFAULT NULL,
  `jugo` bit(1) DEFAULT NULL,
  `cancha` tinyint(4) DEFAULT NULL,
  `arquero` tinyint(4) DEFAULT NULL,
  `puntos` tinyint(4) DEFAULT NULL,
  `mejor` bit(1) DEFAULT NULL,
  `goles` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`idamonestado`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=444 ;

--
-- Volcado de datos para la tabla `tbamonestados`
--

INSERT INTO `tbamonestados` (`idamonestado`, `refjugador`, `refequipo`, `reffixture`, `amarillas`, `azul`, `rojas`, `jugo`, `cancha`, `arquero`, `puntos`, `mejor`, `goles`) VALUES
(1, 1, 2, 1, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(2, 2, 3, 1, NULL, NULL, NULL, b'1', NULL, NULL, 9, b'0', 3),
(3, 51, 2, 13, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', 2),
(4, 48, 2, 13, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(5, 52, 2, 13, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'0', 2),
(6, 50, 2, 13, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(7, 49, 2, 13, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(8, 47, 3, 13, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(9, 44, 3, 13, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(10, 2, 3, 13, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(11, 45, 3, 13, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(12, 43, 3, 13, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'0', 2),
(13, 46, 3, 13, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(14, 26, 7, 14, 1, NULL, NULL, b'1', NULL, NULL, 5, b'1', NULL),
(15, 27, 7, 14, NULL, NULL, NULL, b'1', NULL, NULL, 9, b'1', 2),
(16, 28, 7, 14, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'1', 1),
(17, 30, 7, 14, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(18, 25, 5, 14, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(19, 53, 5, 14, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'1', 1),
(20, 20, 5, 14, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(21, 24, 5, 14, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(22, 19, 5, 14, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(23, 21, 5, 14, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(24, 22, 5, 14, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'1', 2),
(25, 18, 5, 14, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(26, 29, 7, 14, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(27, 3, 8, 20, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(28, 6, 8, 20, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(29, 5, 8, 20, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(30, 10, 8, 20, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(31, 8, 8, 20, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(32, 7, 8, 20, NULL, NULL, NULL, b'1', NULL, NULL, 10, b'1', 3),
(33, 4, 8, 20, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(34, 14, 6, 20, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(35, 15, 6, 20, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'0', 2),
(36, 13, 6, 20, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(37, 11, 6, 20, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(38, 16, 6, 20, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(39, 9, 8, 20, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(40, 12, 6, 20, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(41, 40, 1, 19, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(42, 38, 1, 19, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'1', 1),
(43, 39, 1, 19, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(44, 41, 1, 19, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(45, 33, 4, 19, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(46, 35, 4, 19, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(47, 36, 4, 19, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(48, 32, 4, 19, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(49, 37, 1, 19, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(50, 42, 1, 19, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(51, 34, 4, 19, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(52, 31, 4, 19, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(53, 76, 11, 42, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(54, 68, 12, 42, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(55, 67, 12, 42, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(56, 66, 12, 42, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(57, 69, 12, 42, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(58, 72, 12, 42, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(59, 71, 12, 42, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(60, 70, 12, 42, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(61, 74, 11, 42, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'0', 2),
(62, 73, 11, 42, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(63, 77, 11, 42, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(64, 75, 11, 42, NULL, NULL, NULL, b'1', NULL, NULL, 9, b'1', 2),
(65, 58, 14, 41, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(66, 56, 14, 41, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(67, 57, 14, 41, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(68, 59, 14, 41, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(69, 54, 14, 41, NULL, 1, NULL, b'1', NULL, NULL, 5, b'1', 1),
(70, 55, 14, 41, NULL, NULL, 1, b'1', NULL, NULL, 4, b'1', 1),
(71, 63, 13, 41, NULL, NULL, NULL, b'1', NULL, NULL, 9, b'1', 2),
(72, 64, 13, 41, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'1', 1),
(73, 65, 13, 41, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(74, 61, 13, 41, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(75, 60, 13, 41, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(76, 62, 13, 41, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(77, 83, 9, 40, NULL, NULL, NULL, b'1', NULL, NULL, 9, b'0', 3),
(78, 81, 9, 40, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(79, 79, 9, 40, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(80, 82, 9, 40, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(81, 80, 9, 40, NULL, NULL, NULL, b'1', NULL, NULL, -1, b'0', -7),
(82, 78, 9, 40, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(83, 88, 10, 40, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'0', 2),
(84, 86, 10, 40, NULL, NULL, NULL, b'1', NULL, NULL, 9, b'0', 3),
(85, 87, 10, 40, NULL, NULL, NULL, b'1', NULL, NULL, 10, b'1', 7),
(86, 84, 10, 40, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(87, 89, 10, 40, NULL, NULL, NULL, b'1', NULL, NULL, 9, b'0', 3),
(88, 85, 10, 40, NULL, NULL, NULL, b'1', NULL, NULL, 9, b'0', 3),
(89, 33, 4, 55, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', 1),
(90, 36, 4, 55, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', 1),
(91, 34, 4, 55, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', 1),
(92, 35, 4, 55, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', 1),
(93, 26, 7, 55, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', 1),
(94, 27, 7, 55, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', 3),
(95, 29, 7, 55, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', 1),
(96, 28, 7, 55, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', 1),
(97, 30, 7, 55, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', -7),
(98, 31, 4, 55, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', 1),
(99, 32, 4, 55, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(100, 90, 15, 67, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(101, 91, 15, 67, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(102, 96, 16, 67, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(103, 94, 16, 67, NULL, NULL, NULL, b'1', NULL, NULL, 10, b'1', 6),
(104, 92, 16, 67, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(105, 93, 16, 67, NULL, NULL, NULL, b'1', NULL, NULL, 9, b'0', 3),
(106, 97, 16, 67, NULL, NULL, NULL, b'1', NULL, NULL, 10, b'0', 5),
(107, 95, 16, 67, NULL, NULL, NULL, b'1', NULL, NULL, 9, b'0', 3),
(108, 99, 18, 64, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'1', 1),
(109, 101, 18, 64, 1, NULL, NULL, b'1', NULL, NULL, 5, b'1', NULL),
(110, 98, 18, 64, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'1', 1),
(111, 100, 18, 64, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'1', 1),
(112, 102, 18, 64, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'1', 1),
(113, 68, 12, 74, NULL, NULL, NULL, b'1', NULL, 0, 6, b'1', 1),
(114, 67, 12, 74, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(115, 66, 12, 74, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(116, 69, 12, 74, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(117, 72, 12, 74, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(118, 71, 12, 74, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(119, 70, 12, 74, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(120, 103, 20, 74, NULL, NULL, NULL, b'1', NULL, NULL, 10, b'1', 5),
(121, 104, 17, 64, NULL, NULL, NULL, b'1', NULL, 0, 6, b'1', 1),
(122, 88, 10, 45, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(123, 86, 10, 45, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'0', 2),
(124, 105, 10, 45, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(125, 87, 10, 45, NULL, NULL, NULL, b'1', NULL, NULL, 10, b'1', 3),
(126, 74, 11, 45, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(127, 73, 11, 45, NULL, NULL, NULL, b'1', NULL, NULL, 10, b'0', 4),
(128, 77, 11, 45, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(129, 75, 11, 45, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(130, 84, 10, 45, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(131, 85, 10, 45, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'0', 2),
(132, 76, 11, 45, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(133, 106, 14, 44, NULL, NULL, NULL, b'1', NULL, NULL, 10, b'1', 4),
(134, 54, 14, 44, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'0', 2),
(135, 55, 14, 44, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'0', 2),
(136, 70, 12, 44, NULL, NULL, NULL, b'1', NULL, NULL, 9, b'0', 3),
(137, 63, 13, 43, NULL, NULL, NULL, b'1', NULL, NULL, 10, b'1', 3),
(138, 62, 13, 43, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'1', 1),
(139, 80, 9, 43, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'0', 2),
(140, 78, 9, 43, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(141, 33, 4, 24, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(142, 34, 4, 24, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(143, 35, 4, 24, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(144, 36, 4, 24, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(145, 31, 4, 24, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(146, 32, 4, 24, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(147, 107, 8, 24, NULL, NULL, NULL, b'1', NULL, NULL, 10, b'1', 3),
(148, 3, 8, 24, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'0', 2),
(149, 6, 8, 24, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(150, 5, 8, 24, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(151, 9, 8, 24, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'0', 2),
(152, 8, 8, 24, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(153, 4, 8, 24, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(154, 40, 1, 23, 1, NULL, NULL, b'1', NULL, NULL, 6, b'1', 0),
(155, 37, 1, 23, 1, NULL, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(156, 38, 1, 23, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', 3),
(157, 42, 1, 23, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', 2),
(158, 39, 1, 23, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', 2),
(159, 41, 1, 23, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(160, 14, 6, 23, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', 1),
(161, 15, 6, 23, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', 4),
(162, 12, 6, 23, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(163, 13, 6, 23, 1, NULL, NULL, b'1', NULL, NULL, 6, b'1', 3),
(164, 11, 6, 23, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(165, 16, 6, 23, 1, NULL, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(166, 108, 6, 23, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', 2),
(167, 48, 2, 15, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(168, 50, 2, 15, 1, NULL, NULL, b'1', NULL, NULL, 10, b'0', 6),
(169, 1, 2, 15, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(170, 29, 7, 15, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(171, 27, 7, 15, NULL, NULL, NULL, b'1', NULL, NULL, 10, b'0', 6),
(172, 30, 7, 15, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(173, 52, 2, 15, 1, NULL, NULL, b'1', NULL, NULL, 7, b'0', 2),
(174, 28, 7, 15, 1, NULL, NULL, b'1', NULL, NULL, 8, b'0', 3),
(175, 49, 2, 15, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(176, 51, 2, 15, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(177, 26, 7, 15, 1, NULL, NULL, b'1', NULL, NULL, 5, b'0', NULL),
(178, 25, 5, 16, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(179, 53, 5, 16, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(180, 20, 5, 16, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(181, 24, 5, 16, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(182, 19, 5, 16, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(183, 21, 5, 16, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(184, 22, 5, 16, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(185, 17, 5, 16, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(186, 18, 5, 16, NULL, NULL, NULL, b'1', NULL, NULL, 9, b'1', 2),
(187, 47, 3, 16, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(188, 43, 3, 16, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(189, 46, 3, 16, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(190, 45, 3, 16, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(191, 115, 21, 70, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(192, 113, 21, 70, 1, NULL, NULL, b'1', NULL, NULL, 5, b'0', NULL),
(193, 112, 21, 70, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(194, 111, 21, 70, 1, NULL, NULL, b'1', NULL, NULL, 5, b'0', NULL),
(195, 110, 16, 70, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(196, 116, 16, 70, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(197, 92, 16, 70, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(198, 93, 16, 70, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(199, 97, 16, 70, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(200, 95, 16, 70, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(201, 114, 21, 70, NULL, 1, NULL, b'1', NULL, NULL, 4, b'0', NULL),
(202, 109, 16, 70, 1, NULL, NULL, b'1', NULL, NULL, 5, b'0', NULL),
(203, 96, 16, 70, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(204, 94, 16, 70, 1, NULL, NULL, b'1', NULL, NULL, 8, b'1', 2),
(205, 117, 20, 62, 1, NULL, NULL, b'1', NULL, NULL, 7, b'0', 2),
(206, 118, 20, 62, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(207, 99, 18, 62, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(208, 101, 18, 62, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(209, 120, 18, 62, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'0', 2),
(210, 119, 18, 62, 1, NULL, NULL, b'1', NULL, NULL, 5, b'0', NULL),
(211, 98, 18, 62, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(212, 100, 18, 62, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(213, 102, 18, 62, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(214, 68, 12, 61, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(215, 122, 12, 61, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'1', 1),
(216, 123, 12, 61, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(217, 124, 12, 61, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(218, 69, 12, 61, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(219, 72, 12, 61, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(220, 71, 12, 61, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(221, 125, 12, 61, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(222, 70, 12, 61, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(223, 104, 17, 61, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(224, 121, 17, 61, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(225, 67, 12, 61, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(226, 66, 12, 61, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(227, 90, 15, 69, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(228, 128, 23, 69, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'0', 2),
(229, 127, 23, 69, NULL, NULL, NULL, b'1', NULL, NULL, 10, b'1', 3),
(230, 91, 15, 69, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(231, 126, 15, 69, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'0', 2),
(232, 81, 9, 46, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'0', 2),
(233, 129, 9, 46, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(234, 79, 9, 46, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(235, 69, 12, 46, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(236, 70, 12, 46, NULL, NULL, NULL, b'1', NULL, NULL, 10, b'1', 5),
(237, 88, 10, 48, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'0', 2),
(238, 130, 10, 48, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(239, 105, 10, 48, NULL, NULL, NULL, b'1', NULL, NULL, 9, b'0', 3),
(240, 87, 10, 48, NULL, NULL, NULL, b'1', NULL, NULL, 10, b'0', 6),
(241, 63, 13, 48, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(242, 131, 13, 48, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(243, 62, 13, 48, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(244, 60, 13, 48, NULL, NULL, NULL, b'1', NULL, NULL, 9, b'0', 3),
(245, 86, 10, 48, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(246, 58, 14, 47, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(247, 57, 14, 47, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(248, 59, 14, 47, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(249, 76, 11, 47, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'0', 2),
(250, 74, 11, 47, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'0', 2),
(251, 73, 11, 47, NULL, NULL, NULL, b'1', NULL, NULL, 10, b'1', 3),
(252, 132, 11, 47, NULL, NULL, NULL, b'1', NULL, NULL, 9, b'0', 3),
(253, 48, 2, 17, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'0', 2),
(254, 52, 2, 17, NULL, 1, NULL, b'1', NULL, NULL, 4, b'0', NULL),
(255, 49, 2, 17, NULL, 1, NULL, b'1', NULL, NULL, 4, b'0', NULL),
(256, 25, 5, 17, NULL, NULL, NULL, b'1', NULL, NULL, 10, b'1', 4),
(257, 17, 5, 17, 1, NULL, NULL, b'1', NULL, NULL, 5, b'0', NULL),
(258, 18, 5, 17, NULL, 1, NULL, b'1', NULL, NULL, 5, b'0', 1),
(259, 50, 2, 17, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'0', 2),
(260, 53, 5, 17, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(261, 40, 1, 21, 1, NULL, NULL, b'1', NULL, NULL, 5, b'0', NULL),
(262, 42, 1, 21, NULL, NULL, NULL, b'1', NULL, NULL, 10, b'0', 4),
(263, 133, 1, 21, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(264, 5, 8, 21, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(265, 7, 8, 21, NULL, NULL, NULL, b'1', NULL, NULL, 10, b'1', 5),
(266, 37, 1, 21, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(267, 4, 8, 21, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(268, 134, 3, 18, 1, NULL, NULL, b'1', NULL, NULL, 6, b'0', 1),
(269, 136, 7, 18, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'0', 2),
(270, 29, 7, 18, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'0', 2),
(271, 135, 7, 18, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'0', 2),
(272, 27, 7, 18, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'0', 2),
(273, 28, 7, 18, NULL, NULL, NULL, b'1', NULL, NULL, 9, b'1', 2),
(274, 14, 6, 22, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'1', 2),
(275, 11, 6, 22, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'1', 1),
(276, 108, 6, 22, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'1', 2),
(277, 137, 4, 22, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'1', 2),
(278, 15, 6, 22, NULL, NULL, NULL, b'1', NULL, NULL, 10, b'1', 3),
(279, 16, 6, 22, NULL, NULL, NULL, b'1', NULL, NULL, 9, b'1', 3),
(280, 130, 10, 53, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'1', 2),
(281, 87, 10, 53, NULL, NULL, NULL, b'1', NULL, NULL, 10, b'1', 6),
(282, 66, 12, 53, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(283, 69, 12, 53, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(284, 70, 12, 53, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(285, 81, 9, 52, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'1', 1),
(286, 138, 9, 52, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'1', 1),
(287, 139, 9, 52, NULL, NULL, NULL, b'1', NULL, NULL, 10, b'1', 3),
(288, 58, 14, 52, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'1', 1),
(289, 56, 14, 52, NULL, NULL, NULL, b'1', NULL, NULL, 9, b'1', 3),
(290, 54, 14, 52, 1, NULL, NULL, b'1', NULL, NULL, 7, b'1', 0),
(291, 76, 11, 54, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'1', 1),
(292, 140, 13, 54, 1, NULL, NULL, b'1', NULL, NULL, 5, b'0', NULL),
(293, 131, 13, 54, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(294, 62, 13, 54, 1, NULL, NULL, b'1', NULL, NULL, 5, b'0', 0),
(295, 60, 13, 54, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(296, 74, 11, 54, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(297, 77, 11, 54, 1, NULL, NULL, b'1', NULL, NULL, 5, b'0', NULL),
(298, 132, 11, 54, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(299, 48, 2, 79, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(300, 52, 2, 79, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'0', 2),
(301, 50, 2, 79, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(302, 15, 6, 79, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(303, 12, 6, 79, 1, NULL, NULL, b'1', NULL, NULL, 5, b'0', NULL),
(304, 25, 5, 80, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', 1),
(305, 53, 5, 80, NULL, 1, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(306, 17, 5, 80, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', 2),
(307, 18, 5, 80, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', 1),
(308, 5, 8, 80, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', 2),
(309, 8, 8, 80, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', 2),
(310, 42, 1, 83, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'0', 2),
(311, 133, 1, 83, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'0', 2),
(312, 141, 1, 83, NULL, NULL, NULL, b'1', NULL, NULL, 10, b'1', 4),
(313, 142, 7, 83, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'0', 2),
(314, 135, 7, 83, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(315, 27, 7, 83, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'0', 2),
(316, 143, 24, 87, 1, NULL, NULL, b'1', NULL, NULL, 5, b'0', NULL),
(317, 147, 25, 87, NULL, NULL, NULL, b'1', NULL, NULL, 10, b'0', 4),
(318, 145, 25, 87, NULL, 1, NULL, b'1', NULL, NULL, 4, b'0', NULL),
(319, 144, 24, 87, NULL, 1, NULL, b'1', NULL, NULL, 4, b'0', NULL),
(320, 146, 25, 87, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(321, 149, 25, 87, 1, NULL, NULL, b'1', NULL, NULL, 9, b'0', 4),
(322, 148, 25, 87, NULL, NULL, NULL, b'1', NULL, NULL, 9, b'1', 2),
(323, 153, 27, 88, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(324, 155, 27, 88, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(325, 154, 27, 88, 0, NULL, NULL, b'1', NULL, NULL, 7, b'1', NULL),
(326, 151, 26, 88, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(327, 150, 26, 88, 1, NULL, NULL, b'1', NULL, NULL, 7, b'0', 2),
(328, 152, 26, 88, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(329, 158, 12, 65, 1, NULL, NULL, b'1', NULL, NULL, 5, b'1', NULL),
(330, 157, 18, 65, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'1', 1),
(331, 156, 18, 65, 1, NULL, NULL, b'1', NULL, NULL, 5, b'1', NULL),
(332, 102, 18, 65, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'1', 1),
(333, 68, 12, 65, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', 0),
(334, 160, 17, 66, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'0', 2),
(335, 121, 17, 66, 1, NULL, NULL, b'1', NULL, NULL, 5, b'0', NULL),
(336, 162, 20, 66, NULL, 1, NULL, b'1', NULL, NULL, 4, b'0', NULL),
(337, 161, 20, 66, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(338, 159, 17, 66, 1, NULL, NULL, b'1', NULL, NULL, 5, b'0', NULL),
(339, 117, 20, 66, NULL, NULL, NULL, b'1', NULL, NULL, 9, b'1', 2),
(340, 163, 16, 72, NULL, NULL, NULL, b'1', NULL, NULL, 9, b'1', 2),
(341, 164, 23, 72, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(342, 90, 15, 71, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'1', 2),
(343, 91, 15, 71, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'1', 1),
(344, 126, 15, 71, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'1', 1),
(345, 165, 21, 71, NULL, NULL, NULL, b'1', NULL, NULL, 10, b'1', 3),
(346, 166, 21, 71, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'1', 1),
(347, 115, 21, 71, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'1', 1),
(348, 128, 23, 68, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', 5),
(349, 127, 23, 68, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(350, 164, 23, 68, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(351, 115, 21, 68, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(352, 165, 21, 68, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(353, 113, 21, 68, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(354, 114, 21, 68, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(355, 112, 21, 68, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(356, 111, 21, 68, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(357, 166, 21, 68, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', NULL),
(358, 128, 23, 93, NULL, NULL, NULL, b'1', NULL, NULL, 10, b'0', 5),
(359, 127, 23, 93, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(360, 164, 23, 93, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(361, 115, 21, 93, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(362, 165, 21, 93, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(363, 113, 21, 93, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(364, 114, 21, 93, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(365, 112, 21, 93, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(366, 166, 21, 93, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(367, 111, 21, 93, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(368, 38, 1, 81, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(369, 141, 1, 81, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(370, 41, 1, 81, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(371, 47, 3, 81, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(372, 134, 3, 81, 1, NULL, NULL, b'1', NULL, NULL, 5, b'0', NULL),
(373, 44, 3, 81, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(374, 2, 3, 81, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(375, 43, 3, 81, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(376, 46, 3, 81, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(377, 45, 3, 81, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(378, 37, 1, 81, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(379, 133, 1, 81, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'0', 2),
(380, 40, 1, 81, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(381, 42, 1, 81, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'1', 1),
(382, 39, 1, 81, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(383, 136, 7, 82, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(384, 167, 7, 82, NULL, NULL, NULL, b'1', NULL, NULL, 10, b'1', 3),
(385, 26, 7, 82, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(386, 29, 7, 82, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(387, 142, 7, 82, 1, NULL, NULL, b'1', NULL, NULL, 7, b'0', 2),
(388, 135, 7, 82, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'0', 2),
(389, 27, 7, 82, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(390, 28, 7, 82, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(391, 30, 7, 82, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(392, 33, 4, 82, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(393, 34, 4, 82, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(394, 137, 4, 82, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(395, 35, 4, 82, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(396, 36, 4, 82, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(397, 31, 4, 82, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(398, 32, 4, 82, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(399, 48, 2, 75, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(400, 52, 2, 75, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(401, 50, 2, 75, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(402, 49, 2, 75, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(403, 1, 2, 75, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(404, 51, 2, 75, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(405, 168, 2, 75, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(406, 23, 5, 75, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(407, 25, 5, 75, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(408, 53, 5, 75, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(409, 20, 5, 75, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(410, 24, 5, 75, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(411, 19, 5, 75, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', 0),
(412, 21, 5, 75, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'0', 2),
(413, 22, 5, 75, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'0', 2),
(414, 17, 5, 75, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(415, 18, 5, 75, NULL, NULL, NULL, b'1', NULL, NULL, 9, b'1', 2),
(416, 107, 8, 76, NULL, NULL, NULL, b'1', NULL, NULL, 9, b'0', 3),
(417, 3, 8, 76, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(418, 6, 8, 76, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(419, 5, 8, 76, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(420, 9, 8, 76, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(421, 10, 8, 76, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(422, 8, 8, 76, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(423, 7, 8, 76, NULL, NULL, NULL, b'1', NULL, NULL, 10, b'0', 4),
(424, 4, 8, 76, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(425, 14, 6, 76, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(426, 15, 6, 76, NULL, NULL, NULL, b'1', NULL, NULL, 7, b'0', 1),
(427, 12, 6, 76, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(428, 169, 6, 76, NULL, NULL, NULL, b'1', NULL, NULL, 10, b'1', 3),
(429, 11, 6, 76, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(430, 16, 6, 76, 1, NULL, NULL, b'1', NULL, NULL, 6, b'0', 1),
(431, 108, 6, 76, NULL, NULL, NULL, b'1', NULL, NULL, 9, b'0', 3),
(432, 13, 6, 76, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(433, 128, 23, 95, 1, NULL, NULL, b'1', NULL, NULL, 5, b'0', NULL),
(434, 127, 23, 95, NULL, NULL, NULL, b'1', NULL, NULL, 8, b'0', NULL),
(435, 117, 20, 95, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(436, 118, 20, 95, NULL, 1, NULL, b'1', NULL, NULL, 4, b'0', NULL),
(437, 161, 20, 95, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(438, 164, 23, 95, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(439, 162, 20, 95, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'0', NULL),
(440, 170, 30, 100, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', 1),
(441, 173, 31, 100, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', 3),
(442, 172, 31, 100, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', 4),
(443, 171, 31, 100, NULL, NULL, NULL, b'1', NULL, NULL, 6, b'1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcanchas`
--

CREATE TABLE IF NOT EXISTS `tbcanchas` (
  `idcancha` int(11) NOT NULL AUTO_INCREMENT,
  `cancha` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idcancha`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbcanchas`
--

INSERT INTO `tbcanchas` (`idcancha`, `cancha`) VALUES
(1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbconducta`
--

CREATE TABLE IF NOT EXISTS `tbconducta` (
  `idconducta` int(11) NOT NULL AUTO_INCREMENT,
  `refequipo` int(11) NOT NULL,
  `puntos` int(11) NOT NULL,
  `reffecha` smallint(6) NOT NULL,
  `reftorneo` int(11) NOT NULL,
  PRIMARY KEY (`idconducta`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1382 ;

--
-- Volcado de datos para la tabla `tbconducta`
--

INSERT INTO `tbconducta` (`idconducta`, `refequipo`, `puntos`, `reffecha`, `reftorneo`) VALUES
(1, 1, 0, 0, 0),
(2, 2, 0, 0, 0),
(3, 3, 0, 0, 0),
(4, 4, 0, 0, 0),
(5, 5, 0, 0, 0),
(6, 6, 0, 0, 0),
(7, 7, 0, 0, 0),
(8, 8, 0, 0, 0),
(29, 3, 0, 23, 1),
(27, 2, 0, 23, 1),
(272, 4, 1, 23, 2),
(120, 11, 0, 23, 3),
(61, 8, 0, 23, 1),
(62, 6, 0, 23, 1),
(74, 1, 0, 23, 1),
(76, 4, 0, 23, 1),
(77, 9, 0, 0, 0),
(78, 10, 0, 0, 0),
(79, 11, 0, 0, 0),
(80, 12, 0, 0, 0),
(81, 13, 0, 0, 0),
(82, 14, 0, 0, 0),
(115, 12, 0, 23, 3),
(105, 7, 1, 23, 1),
(106, 5, 0, 23, 1),
(169, 9, 0, 23, 3),
(213, 14, 5, 23, 3),
(220, 13, 0, 23, 3),
(176, 10, 0, 23, 3),
(271, 4, 1, 23, 2),
(270, 4, 1, 23, 2),
(240, 8, 0, 23, 2),
(273, 7, 8, 23, 2),
(274, 15, 0, 0, 0),
(275, 16, 0, 0, 0),
(276, 17, 0, 0, 0),
(277, 18, 0, 0, 0),
(278, 19, 0, 0, 0),
(279, 20, 0, 0, 0),
(280, 21, 0, 0, 0),
(281, 22, 0, 0, 0),
(282, 23, 0, 0, 0),
(292, 16, 0, 23, 4),
(285, 15, 0, 23, 4),
(392, 11, 0, 24, 3),
(379, 17, 0, 24, 4),
(361, 12, 0, 24, 4),
(363, 20, 0, 24, 4),
(393, 10, 0, 24, 3),
(377, 18, 1, 24, 4),
(409, 12, 0, 24, 3),
(401, 14, 5, 24, 3),
(430, 9, 0, 24, 3),
(437, 13, 0, 24, 3),
(454, 8, 0, 25, 1),
(444, 4, 0, 25, 1),
(511, 2, 2, 24, 1),
(490, 1, 2, 25, 1),
(499, 6, 2, 25, 1),
(512, 7, 3, 24, 1),
(522, 5, 0, 24, 1),
(529, 3, 0, 24, 1),
(542, 21, 4, 24, 4),
(545, 16, 2, 24, 4),
(556, 20, 1, 23, 4),
(557, 18, 1, 23, 4),
(572, 12, 0, 23, 4),
(570, 17, 0, 23, 4),
(578, 15, 0, 24, 4),
(579, 23, 0, 24, 4),
(587, 9, 0, 25, 3),
(599, 12, 0, 25, 3),
(616, 13, 0, 25, 3),
(617, 10, 0, 25, 3),
(647, 14, 5, 25, 3),
(645, 11, 0, 25, 3),
(663, 2, 6, 25, 1),
(665, 5, 3, 25, 1),
(682, 1, 1, 24, 1),
(683, 8, 0, 24, 1),
(698, 3, 1, 25, 1),
(699, 7, 3, 25, 1),
(810, 6, 0, 24, 1),
(813, 4, 0, 24, 1),
(864, 10, 0, 27, 3),
(876, 12, 0, 27, 3),
(946, 11, 1, 27, 3),
(930, 14, 6, 27, 3),
(922, 9, 0, 27, 3),
(941, 13, 2, 27, 3),
(1028, 1, 0, 24, 7),
(976, 6, 1, 25, 6),
(968, 2, 0, 25, 6),
(1008, 5, 2, 25, 6),
(1018, 8, 0, 25, 6),
(1037, 7, 0, 24, 7),
(1038, 4, 0, 24, 7),
(1039, 3, 0, 24, 7),
(1040, 24, 0, 0, 0),
(1041, 25, 0, 0, 0),
(1042, 26, 0, 0, 0),
(1043, 27, 0, 0, 0),
(1049, 24, 3, 23, 8),
(1052, 25, 3, 23, 8),
(1059, 27, 0, 23, 8),
(1060, 26, 1, 23, 8),
(1187, 12, 1, 25, 4),
(1196, 18, 2, 25, 4),
(1116, 17, 2, 25, 4),
(1115, 20, 2, 25, 4),
(1134, 16, 2, 25, 4),
(1138, 23, 0, 25, 4),
(1209, 28, 0, 0, 0),
(1200, 15, 0, 25, 4),
(1276, 1, 0, 23, 7),
(1208, 21, 4, 25, 4),
(1251, 23, 0, 23, 4),
(1259, 21, 0, 23, 4),
(1271, 3, 1, 23, 7),
(1286, 7, 1, 23, 7),
(1294, 4, 0, 23, 7),
(1313, 5, 0, 23, 6),
(1302, 2, 0, 23, 6),
(1333, 2, 0, 24, 6),
(1323, 8, 0, 23, 6),
(1332, 6, 1, 23, 6),
(1334, 4, 1, 24, 2),
(1335, 5, 0, 24, 6),
(1336, 6, 1, 24, 6),
(1337, 7, 8, 24, 2),
(1338, 8, 0, 24, 2),
(1339, 24, 3, 24, 8),
(1340, 25, 3, 24, 8),
(1341, 26, 1, 24, 8),
(1342, 27, 0, 24, 8),
(1343, 8, 0, 24, 6),
(1344, 5, 0, 23, 10),
(1345, 8, 0, 23, 10),
(1356, 20, 2, 23, 10),
(1355, 23, 1, 23, 10),
(1357, 29, 0, 0, 0),
(1358, 30, 0, 0, 0),
(1359, 31, 0, 0, 0),
(1360, 32, 0, 0, 0),
(1361, 33, 0, 0, 0),
(1362, 34, 0, 0, 0),
(1377, 30, 0, 23, 12),
(1381, 31, 0, 23, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbconductabck`
--

CREATE TABLE IF NOT EXISTS `tbconductabck` (
  `idconductabck` int(11) NOT NULL AUTO_INCREMENT,
  `refequipo` int(11) NOT NULL,
  `puntos` int(11) NOT NULL,
  PRIMARY KEY (`idconductabck`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbetapas`
--

CREATE TABLE IF NOT EXISTS `tbetapas` (
  `idetapa` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `valor` int(11) NOT NULL,
  PRIMARY KEY (`idetapa`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `tbetapas`
--

INSERT INTO `tbetapas` (`idetapa`, `descripcion`, `valor`) VALUES
(1, 'PlayOff', 32),
(2, 'Octavos', 16),
(3, 'Cuartos', 8),
(4, 'SemiFinal', 4),
(5, 'Tercer', 2),
(6, 'Final', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbfechas`
--

CREATE TABLE IF NOT EXISTS `tbfechas` (
  `idfecha` int(11) NOT NULL AUTO_INCREMENT,
  `tipofecha` varchar(10) DEFAULT NULL,
  `resumen` mediumtext,
  PRIMARY KEY (`idfecha`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

--
-- Volcado de datos para la tabla `tbfechas`
--

INSERT INTO `tbfechas` (`idfecha`, `tipofecha`, `resumen`) VALUES
(23, 'Fecha 1', NULL),
(24, 'Fecha 2', NULL),
(25, 'Fecha 3', NULL),
(26, 'Fecha 4', NULL),
(27, 'Fecha 5', NULL),
(28, 'Fecha 6', NULL),
(29, 'Fecha 7', NULL),
(30, 'Fecha 8', NULL),
(31, 'Fecha 9', NULL),
(32, 'Fecha 10', NULL),
(33, 'Fecha 11', NULL),
(34, 'Fecha 12', NULL),
(35, 'Fecha 13', NULL),
(36, 'Fecha 14', NULL),
(37, 'Fecha 15', NULL),
(38, 'Fecha 16', NULL),
(39, 'Fecha 17', NULL),
(40, 'Fecha 18', NULL),
(41, 'Fecha 19', NULL),
(42, 'Fecha 20', NULL),
(43, 'Fecha 21', NULL),
(44, 'Fecha 22', NULL),
(45, 'Fecha 23', NULL),
(46, 'Fecha 24', NULL),
(47, 'Fecha 25', NULL),
(48, 'Fecha 26', NULL),
(49, 'Fecha 27', NULL),
(50, 'Fecha 28', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbgoleadores`
--

CREATE TABLE IF NOT EXISTS `tbgoleadores` (
  `idgoleador` int(11) NOT NULL AUTO_INCREMENT,
  `refequipo` int(11) NOT NULL,
  `reffixture` int(11) NOT NULL,
  `goles` int(11) NOT NULL,
  `refjugador` int(11) NOT NULL,
  PRIMARY KEY (`idgoleador`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=238 ;

--
-- Volcado de datos para la tabla `tbgoleadores`
--

INSERT INTO `tbgoleadores` (`idgoleador`, `refequipo`, `reffixture`, `goles`, `refjugador`) VALUES
(1, 2, 1, 1, 1),
(2, 3, 1, 3, 2),
(3, 2, 13, 2, 51),
(4, 2, 13, 2, 52),
(5, 2, 13, 1, 50),
(6, 2, 13, 1, 49),
(7, 3, 13, 1, 45),
(8, 3, 13, 2, 43),
(9, 7, 14, 2, 27),
(10, 7, 14, 1, 28),
(11, 5, 14, 1, 53),
(12, 5, 14, 2, 22),
(13, 8, 20, 1, 3),
(14, 8, 20, 1, 5),
(15, 8, 20, 1, 8),
(16, 8, 20, 3, 7),
(17, 6, 20, 1, 14),
(18, 6, 20, 2, 15),
(19, 1, 19, 1, 38),
(20, 1, 19, 1, 39),
(21, 1, 19, 1, 37),
(22, 1, 19, 1, 42),
(23, 12, 42, 1, 72),
(24, 12, 42, 1, 70),
(25, 11, 42, 2, 74),
(26, 11, 42, 1, 77),
(27, 11, 42, 2, 75),
(28, 14, 41, 1, 54),
(29, 14, 41, 1, 55),
(30, 13, 41, 2, 63),
(31, 13, 41, 1, 64),
(32, 9, 40, 3, 83),
(33, 10, 40, 2, 88),
(34, 10, 40, 3, 86),
(35, 10, 40, 7, 87),
(36, 10, 40, 3, 89),
(37, 10, 40, 3, 85),
(38, 4, 55, 1, 33),
(39, 4, 55, 1, 36),
(40, 4, 55, 1, 34),
(41, 4, 55, 1, 35),
(42, 7, 55, 1, 26),
(43, 7, 55, 3, 27),
(44, 7, 55, 1, 29),
(45, 7, 55, 1, 28),
(46, 4, 55, 1, 31),
(47, 15, 67, 1, 90),
(48, 15, 67, 1, 91),
(49, 16, 67, 1, 96),
(50, 16, 67, 6, 94),
(51, 16, 67, 1, 92),
(52, 16, 67, 3, 93),
(53, 16, 67, 5, 97),
(54, 16, 67, 3, 95),
(55, 18, 64, 1, 99),
(56, 18, 64, 1, 98),
(57, 18, 64, 1, 100),
(58, 18, 64, 1, 102),
(59, 20, 74, 5, 103),
(60, 10, 45, 1, 88),
(61, 10, 45, 2, 86),
(62, 10, 45, 1, 105),
(63, 10, 45, 3, 87),
(64, 11, 45, 1, 74),
(65, 11, 45, 4, 73),
(66, 11, 45, 1, 75),
(67, 10, 45, 2, 85),
(68, 11, 45, 1, 76),
(69, 14, 44, 4, 106),
(70, 14, 44, 2, 54),
(71, 14, 44, 2, 55),
(72, 12, 44, 3, 70),
(73, 13, 43, 3, 63),
(74, 13, 43, 1, 62),
(75, 9, 43, 2, 80),
(76, 9, 43, 1, 78),
(77, 4, 24, 1, 35),
(78, 8, 24, 3, 107),
(79, 8, 24, 2, 3),
(80, 8, 24, 1, 6),
(81, 8, 24, 1, 5),
(82, 8, 24, 2, 9),
(83, 1, 23, 3, 38),
(84, 1, 23, 2, 42),
(85, 1, 23, 2, 39),
(86, 6, 23, 1, 14),
(87, 6, 23, 4, 15),
(88, 6, 23, 3, 13),
(89, 6, 23, 2, 108),
(90, 2, 15, 1, 48),
(91, 2, 15, 6, 50),
(92, 7, 15, 6, 27),
(93, 2, 15, 2, 52),
(94, 7, 15, 3, 28),
(95, 2, 15, 1, 51),
(96, 5, 16, 1, 20),
(97, 5, 16, 1, 21),
(98, 5, 16, 2, 18),
(99, 21, 70, 1, 115),
(100, 21, 70, 1, 112),
(101, 16, 70, 1, 110),
(102, 16, 70, 1, 116),
(103, 16, 70, 2, 94),
(104, 20, 62, 2, 117),
(105, 20, 62, 1, 118),
(106, 18, 62, 2, 120),
(107, 12, 61, 1, 122),
(108, 12, 61, 1, 123),
(109, 12, 61, 1, 124),
(110, 12, 61, 1, 125),
(111, 17, 61, 1, 121),
(112, 23, 69, 2, 128),
(113, 23, 69, 3, 127),
(114, 15, 69, 2, 126),
(115, 9, 46, 2, 81),
(116, 9, 46, 1, 129),
(117, 9, 46, 1, 79),
(118, 12, 46, 1, 69),
(119, 12, 46, 5, 70),
(120, 10, 48, 2, 88),
(121, 10, 48, 1, 130),
(122, 10, 48, 3, 105),
(123, 10, 48, 6, 87),
(124, 13, 48, 1, 63),
(125, 13, 48, 1, 131),
(126, 13, 48, 1, 62),
(127, 13, 48, 3, 60),
(128, 10, 48, 1, 86),
(129, 14, 47, 1, 58),
(130, 14, 47, 1, 57),
(131, 14, 47, 1, 59),
(132, 11, 47, 2, 76),
(133, 11, 47, 2, 74),
(134, 11, 47, 3, 73),
(135, 11, 47, 3, 132),
(136, 2, 17, 2, 48),
(137, 5, 17, 4, 25),
(138, 5, 17, 1, 18),
(139, 2, 17, 2, 50),
(140, 5, 17, 1, 53),
(141, 1, 21, 4, 42),
(142, 1, 21, 1, 133),
(143, 8, 21, 1, 5),
(144, 8, 21, 5, 7),
(145, 1, 21, 1, 37),
(146, 8, 21, 1, 4),
(147, 3, 18, 1, 134),
(148, 7, 18, 2, 136),
(149, 7, 18, 2, 29),
(150, 7, 18, 2, 135),
(151, 7, 18, 2, 27),
(152, 7, 18, 2, 28),
(153, 6, 22, 2, 14),
(154, 6, 22, 1, 11),
(155, 6, 22, 2, 108),
(156, 4, 22, 2, 137),
(157, 6, 22, 3, 15),
(158, 6, 22, 3, 16),
(159, 10, 53, 2, 130),
(160, 10, 53, 6, 87),
(161, 12, 53, 1, 66),
(162, 12, 53, 1, 69),
(163, 12, 53, 1, 70),
(164, 9, 52, 1, 81),
(165, 9, 52, 1, 138),
(166, 9, 52, 3, 139),
(167, 14, 52, 1, 58),
(168, 14, 52, 3, 56),
(169, 14, 52, 0, 54),
(170, 11, 54, 1, 76),
(171, 13, 54, 1, 131),
(172, 13, 54, 1, 60),
(173, 11, 54, 1, 74),
(174, 11, 54, 1, 132),
(175, 2, 79, 1, 48),
(176, 2, 79, 2, 52),
(177, 2, 79, 1, 50),
(178, 6, 79, 1, 15),
(179, 5, 80, 1, 25),
(180, 5, 80, 2, 17),
(181, 5, 80, 1, 18),
(182, 8, 80, 2, 5),
(183, 8, 80, 2, 8),
(184, 1, 83, 2, 42),
(185, 1, 83, 2, 133),
(186, 1, 83, 4, 141),
(187, 7, 83, 2, 142),
(188, 7, 83, 1, 135),
(189, 7, 83, 2, 27),
(190, 25, 87, 4, 147),
(191, 25, 87, 1, 146),
(192, 25, 87, 4, 149),
(193, 25, 87, 2, 148),
(194, 27, 88, 1, 153),
(195, 27, 88, 1, 155),
(196, 26, 88, 1, 151),
(197, 26, 88, 2, 150),
(198, 26, 88, 1, 152),
(199, 18, 65, 1, 157),
(200, 18, 65, 1, 102),
(201, 17, 66, 2, 160),
(202, 20, 66, 1, 161),
(203, 20, 66, 2, 117),
(204, 16, 72, 2, 163),
(205, 23, 72, 1, 164),
(206, 15, 71, 2, 90),
(207, 15, 71, 1, 91),
(208, 15, 71, 1, 126),
(209, 21, 71, 3, 165),
(210, 21, 71, 1, 166),
(211, 21, 71, 1, 115),
(212, 23, 93, 5, 128),
(213, 3, 81, 1, 43),
(214, 3, 81, 1, 45),
(215, 1, 81, 2, 133),
(216, 1, 81, 1, 42),
(217, 7, 82, 1, 136),
(218, 7, 82, 3, 167),
(219, 7, 82, 2, 142),
(220, 7, 82, 2, 135),
(221, 4, 82, 1, 33),
(222, 4, 82, 1, 137),
(223, 2, 75, 1, 168),
(224, 5, 75, 1, 25),
(225, 5, 75, 1, 20),
(226, 5, 75, 2, 21),
(227, 5, 75, 2, 22),
(228, 5, 75, 2, 18),
(229, 8, 76, 3, 107),
(230, 8, 76, 4, 7),
(231, 6, 76, 1, 15),
(232, 6, 76, 3, 169),
(233, 6, 76, 1, 16),
(234, 6, 76, 3, 108),
(235, 31, 100, 3, 173),
(236, 31, 100, 4, 172),
(237, 31, 100, 1, 171);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbhorarioprincipal`
--

CREATE TABLE IF NOT EXISTS `tbhorarioprincipal` (
  `idhorarioprincipal` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idhorarioprincipal`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbhorarios`
--

CREATE TABLE IF NOT EXISTS `tbhorarios` (
  `idhorario` int(11) NOT NULL AUTO_INCREMENT,
  `horario` time NOT NULL,
  `reftipotorneo` smallint(6) NOT NULL,
  PRIMARY KEY (`idhorario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tbhorarios`
--

INSERT INTO `tbhorarios` (`idhorario`, `horario`, `reftipotorneo`) VALUES
(1, '12:00:00', 1),
(2, '08:30:00', 8),
(3, '08:30:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbimagenescargadas`
--

CREATE TABLE IF NOT EXISTS `tbimagenescargadas` (
  `idimagen` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(300) NOT NULL,
  `refnoticia` int(11) NOT NULL,
  PRIMARY KEY (`idimagen`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbletras`
--

CREATE TABLE IF NOT EXISTS `tbletras` (
  `Letra` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbletras`
--

INSERT INTO `tbletras` (`Letra`) VALUES
('A'),
('B'),
('C'),
('D'),
('E'),
('F'),
('G'),
('H'),
('I'),
('J'),
('K'),
('L'),
('M'),
('N'),
('O'),
('P'),
('Q'),
('R'),
('S'),
('T'),
('U'),
('V'),
('W'),
('X'),
('Y'),
('Z');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbplayoff`
--

CREATE TABLE IF NOT EXISTS `tbplayoff` (
  `idplayoff` int(11) NOT NULL AUTO_INCREMENT,
  `refplayoffequipo_a` int(11) NOT NULL,
  `refplayoffresultado_a` tinyint(4) NOT NULL,
  `refplayoffequipo_b` int(11) NOT NULL,
  `refplayoffresultado_b` tinyint(4) NOT NULL,
  `fechajuego` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `refcancha` int(11) DEFAULT NULL,
  `chequeado` bit(1) DEFAULT NULL,
  `refetapa` tinyint(4) NOT NULL,
  `penalesa` smallint(6) DEFAULT NULL,
  `penalesb` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`idplayoff`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `tbplayoff`
--

INSERT INTO `tbplayoff` (`idplayoff`, `refplayoffequipo_a`, `refplayoffresultado_a`, `refplayoffequipo_b`, `refplayoffresultado_b`, `fechajuego`, `hora`, `refcancha`, `chequeado`, `refetapa`, `penalesa`, `penalesb`) VALUES
(1, 1, 1, 1, 1, '2016-01-30', '00:00:00', 1, b'1', 4, 3, 2),
(2, 1, 3, 5, 1, '2016-02-20', '00:00:00', 1, b'1', 4, NULL, NULL),
(3, 8, 5, 6, 4, '2016-02-20', '00:00:00', 1, b'1', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbpremios`
--

CREATE TABLE IF NOT EXISTS `tbpremios` (
  `idpremio` int(11) NOT NULL AUTO_INCREMENT,
  `contenido` mediumtext,
  `fechaactualizacion` date DEFAULT NULL,
  PRIMARY KEY (`idpremio`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbpremios_bck`
--

CREATE TABLE IF NOT EXISTS `tbpremios_bck` (
  `idpremio` int(11) NOT NULL AUTO_INCREMENT,
  `contenido` mediumtext,
  `fechaactualizacion` date DEFAULT NULL,
  PRIMARY KEY (`idpremio`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbpuntosequipos`
--

CREATE TABLE IF NOT EXISTS `tbpuntosequipos` (
  `idpuntosequipo` int(11) NOT NULL AUTO_INCREMENT,
  `refequipo` int(11) NOT NULL,
  `puntos` int(11) DEFAULT NULL,
  `amarillas` tinyint(4) DEFAULT NULL,
  `azules` tinyint(4) DEFAULT NULL,
  `rojas` tinyint(4) DEFAULT NULL,
  `reffixture` int(11) NOT NULL,
  `reffecha` int(11) NOT NULL,
  `reftorneo` int(11) NOT NULL,
  `observacion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idpuntosequipo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=107 ;

--
-- Volcado de datos para la tabla `tbpuntosequipos`
--

INSERT INTO `tbpuntosequipos` (`idpuntosequipo`, `refequipo`, `puntos`, `amarillas`, `azules`, `rojas`, `reffixture`, `reffecha`, `reftorneo`, `observacion`) VALUES
(1, 3, 1, NULL, NULL, NULL, 1, 23, 1, ''),
(2, 2, 1, NULL, NULL, NULL, 1, 23, 1, ''),
(3, 2, 1, NULL, NULL, NULL, 13, 23, 1, ''),
(4, 3, 1, NULL, NULL, NULL, 13, 23, 1, ''),
(5, 7, 1, NULL, NULL, NULL, 14, 23, 1, ''),
(6, 5, 1, NULL, NULL, NULL, 14, 23, 1, ''),
(7, 8, 1, NULL, NULL, NULL, 20, 23, 1, ''),
(8, 6, 1, NULL, NULL, NULL, 20, 23, 1, ''),
(9, 1, 1, NULL, NULL, NULL, 19, 23, 1, ''),
(10, 4, 1, NULL, NULL, NULL, 19, 23, 1, ''),
(11, 12, 1, NULL, NULL, NULL, 42, 23, 3, ''),
(12, 11, 1, NULL, NULL, NULL, 42, 23, 3, ''),
(13, 14, 1, NULL, NULL, NULL, 41, 23, 3, ''),
(14, 13, 1, NULL, NULL, NULL, 41, 23, 3, ''),
(15, 9, 1, NULL, NULL, NULL, 40, 23, 3, ''),
(16, 10, 1, NULL, NULL, NULL, 40, 23, 3, ''),
(17, 4, 2, 1, NULL, NULL, 55, 23, 2, ''),
(18, 7, 1, 2, NULL, 2, 55, 23, 2, ''),
(19, 8, 1, NULL, NULL, NULL, 56, 23, 2, ''),
(20, 7, 1, NULL, NULL, NULL, 56, 23, 2, ''),
(21, 15, 1, NULL, NULL, NULL, 67, 23, 4, ''),
(22, 16, 1, NULL, NULL, NULL, 67, 23, 4, ''),
(23, 18, 1, NULL, NULL, NULL, 64, 24, 4, ''),
(24, 17, 1, NULL, NULL, NULL, 64, 24, 4, ''),
(25, 12, 1, NULL, NULL, NULL, 74, 24, 4, ''),
(26, 20, 1, NULL, NULL, NULL, 74, 24, 4, ''),
(27, 11, 1, NULL, NULL, NULL, 45, 24, 3, ''),
(28, 10, 1, NULL, NULL, NULL, 45, 24, 3, ''),
(29, 14, 1, NULL, NULL, NULL, 44, 24, 3, ''),
(30, 12, 1, NULL, NULL, NULL, 44, 24, 3, ''),
(31, 9, 1, NULL, NULL, NULL, 43, 24, 3, ''),
(32, 13, 1, NULL, NULL, NULL, 43, 24, 3, ''),
(33, 4, 1, NULL, NULL, NULL, 24, 25, 1, ''),
(34, 8, 1, NULL, NULL, NULL, 24, 25, 1, ''),
(35, 1, 1, NULL, NULL, NULL, 23, 25, 1, ''),
(36, 6, 1, NULL, NULL, NULL, 23, 25, 1, ''),
(37, 2, 1, NULL, NULL, NULL, 15, 24, 1, ''),
(38, 7, 1, NULL, NULL, NULL, 15, 24, 1, ''),
(39, 5, 1, NULL, NULL, NULL, 16, 24, 1, ''),
(40, 3, 1, NULL, NULL, NULL, 16, 24, 1, ''),
(41, 21, 1, NULL, NULL, NULL, 70, 24, 4, ''),
(42, 16, 1, NULL, NULL, NULL, 70, 24, 4, ''),
(43, 20, 1, NULL, NULL, NULL, 62, 23, 4, ''),
(44, 18, 1, NULL, NULL, NULL, 62, 23, 4, ''),
(45, 12, 1, NULL, NULL, NULL, 61, 23, 4, ''),
(46, 17, 1, NULL, NULL, NULL, 61, 23, 4, ''),
(47, 15, 1, NULL, NULL, NULL, 69, 24, 4, ''),
(48, 23, 1, NULL, NULL, NULL, 69, 24, 4, ''),
(49, 9, 1, NULL, NULL, NULL, 46, 25, 3, ''),
(50, 12, 1, NULL, NULL, NULL, 46, 25, 3, ''),
(51, 13, 1, NULL, NULL, NULL, 48, 25, 3, ''),
(52, 10, 1, NULL, NULL, NULL, 48, 25, 3, ''),
(53, 14, 1, NULL, NULL, NULL, 47, 25, 3, ''),
(54, 11, 1, NULL, NULL, NULL, 47, 25, 3, ''),
(55, 2, 1, NULL, NULL, NULL, 17, 25, 1, ''),
(56, 5, 1, NULL, NULL, NULL, 17, 25, 1, ''),
(57, 1, 1, NULL, NULL, NULL, 21, 24, 1, ''),
(58, 8, 1, NULL, NULL, NULL, 21, 24, 1, ''),
(59, 3, 1, NULL, NULL, NULL, 18, 25, 1, ''),
(60, 7, 1, NULL, NULL, NULL, 18, 25, 1, ''),
(61, 4, 1, NULL, NULL, NULL, 22, 24, 1, ''),
(62, 6, 1, NULL, NULL, NULL, 22, 24, 1, ''),
(63, 10, 1, NULL, NULL, NULL, 53, 27, 3, ''),
(64, 12, 1, NULL, NULL, NULL, 53, 27, 3, ''),
(65, 9, 1, NULL, NULL, NULL, 52, 27, 3, ''),
(66, 14, 1, NULL, NULL, NULL, 52, 27, 3, ''),
(67, 11, 1, NULL, NULL, NULL, 54, 27, 3, ''),
(68, 13, 1, NULL, NULL, NULL, 54, 27, 3, ''),
(69, 2, 0, NULL, NULL, NULL, 79, 25, 6, ''),
(70, 6, 1, NULL, NULL, NULL, 79, 25, 6, ''),
(71, 5, 1, NULL, NULL, NULL, 80, 25, 6, ''),
(72, 8, 1, NULL, NULL, NULL, 80, 25, 6, ''),
(73, 7, 1, NULL, NULL, NULL, 83, 24, 7, ''),
(74, 1, 1, NULL, NULL, NULL, 83, 24, 7, ''),
(75, 4, 0, NULL, NULL, NULL, 84, 24, 7, ''),
(76, 3, 1, NULL, NULL, NULL, 84, 24, 7, ''),
(77, 25, 1, NULL, NULL, NULL, 87, 23, 8, ''),
(78, 24, 1, NULL, NULL, NULL, 87, 23, 8, ''),
(79, 26, 1, NULL, NULL, NULL, 88, 23, 8, ''),
(80, 27, 1, NULL, NULL, NULL, 88, 23, 8, ''),
(81, 12, 1, NULL, NULL, NULL, 65, 25, 4, ''),
(82, 18, 1, NULL, NULL, NULL, 65, 25, 4, ''),
(83, 20, 1, NULL, NULL, NULL, 66, 25, 4, ''),
(84, 17, 1, NULL, NULL, NULL, 66, 25, 4, ''),
(85, 16, 1, NULL, NULL, NULL, 72, 25, 4, ''),
(86, 23, 1, NULL, NULL, NULL, 72, 25, 4, ''),
(87, 15, 1, NULL, NULL, NULL, 71, 25, 4, ''),
(88, 21, 1, NULL, NULL, NULL, 71, 25, 4, ''),
(89, 23, 1, NULL, NULL, NULL, 68, 23, 4, ''),
(90, 21, 1, NULL, NULL, NULL, 68, 23, 4, ''),
(91, 23, 1, NULL, NULL, NULL, 93, 23, 4, ''),
(92, 21, 1, NULL, NULL, NULL, 93, 23, 4, ''),
(93, 1, 1, NULL, NULL, NULL, 81, 23, 7, ''),
(94, 3, 1, NULL, NULL, NULL, 81, 23, 7, ''),
(95, 7, 1, NULL, NULL, NULL, 82, 23, 7, ''),
(96, 4, 1, NULL, NULL, NULL, 82, 23, 7, ''),
(97, 2, 1, NULL, NULL, NULL, 75, 23, 6, ''),
(98, 5, 1, NULL, NULL, NULL, 75, 23, 6, ''),
(99, 8, 1, NULL, NULL, NULL, 76, 23, 6, ''),
(100, 6, 1, NULL, NULL, NULL, 76, 23, 6, ''),
(101, 5, 1, NULL, NULL, NULL, 94, 23, 10, ''),
(102, 8, 1, NULL, NULL, NULL, 94, 23, 10, ''),
(103, 23, 1, NULL, NULL, NULL, 95, 23, 10, ''),
(104, 20, 1, NULL, NULL, NULL, 95, 23, 10, ''),
(105, 30, 1, NULL, NULL, NULL, 100, 23, 12, ''),
(106, 31, 1, NULL, NULL, NULL, 100, 23, 12, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbreglamento`
--

CREATE TABLE IF NOT EXISTS `tbreglamento` (
  `idreglamento` int(11) NOT NULL AUTO_INCREMENT,
  `contenido` mediumtext,
  `fechaactualizacion` date DEFAULT NULL,
  PRIMARY KEY (`idreglamento`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbreglamento_bck`
--

CREATE TABLE IF NOT EXISTS `tbreglamento_bck` (
  `idreglamento` int(11) NOT NULL AUTO_INCREMENT,
  `contenido` mediumtext,
  `fechaactualizacion` date DEFAULT NULL,
  PRIMARY KEY (`idreglamento`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbsedes`
--

CREATE TABLE IF NOT EXISTS `tbsedes` (
  `idsede` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idsede`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `tbsedes`
--

INSERT INTO `tbsedes` (`idsede`, `nombre`, `direccion`) VALUES
(3, 'Futbol Point', 'García Merou 2299, Martinez'),
(4, 'Grun Fútbol Club', 'Padre Canavery 1351'),
(5, 'Area Chica', 'Cuyo 1925, Martínez'),
(6, 'Parque Norte', 'Av. Cantilo y Guiraldes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbseleccion`
--

CREATE TABLE IF NOT EXISTS `tbseleccion` (
  `idseleccion` int(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(44) DEFAULT NULL,
  `grupo` varchar(6) DEFAULT NULL,
  `Equipo` varchar(50) DEFAULT NULL,
  `posicion` int(11) DEFAULT NULL,
  PRIMARY KEY (`idseleccion`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbservicios`
--

CREATE TABLE IF NOT EXISTS `tbservicios` (
  `idservicios` int(11) NOT NULL AUTO_INCREMENT,
  `planilleros` varchar(3000) DEFAULT NULL,
  `servmed` varchar(3000) DEFAULT NULL,
  `arbitraje` varchar(3000) DEFAULT NULL,
  `fechaactualizacion` date DEFAULT NULL,
  PRIMARY KEY (`idservicios`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbservicios_bck`
--

CREATE TABLE IF NOT EXISTS `tbservicios_bck` (
  `idservicios` int(11) NOT NULL AUTO_INCREMENT,
  `planilleros` varchar(3000) DEFAULT NULL,
  `servmed` varchar(3000) DEFAULT NULL,
  `arbitraje` varchar(3000) DEFAULT NULL,
  `fechaactualizacion` date DEFAULT NULL,
  PRIMARY KEY (`idservicios`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tbsuspendidos`
--

INSERT INTO `tbsuspendidos` (`idsuspendido`, `refequipo`, `refjugador`, `motivos`, `cantidadfechas`, `fechacreacion`, `reffixture`) VALUES
(3, 2, 52, 'Acumulación de 3 Amarillas', '1', '2016-02-10', 17),
(2, 14, 55, 'Insulto al árbitro', '1', '2016-01-22', 44);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtipotorneo`
--

CREATE TABLE IF NOT EXISTS `tbtipotorneo` (
  `idtipotorneo` int(11) NOT NULL AUTO_INCREMENT,
  `descripciontorneo` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idtipotorneo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `tbtipotorneo`
--

INSERT INTO `tbtipotorneo` (`idtipotorneo`, `descripciontorneo`) VALUES
(1, 'Futbol 5 Jueves Zona Norte'),
(2, 'Torneo Fútbol 6'),
(3, 'Torneo Fútbol 8'),
(4, 'Torneo Fútbol Femenino'),
(5, 'Nuevo'),
(6, 'La Iguana Fútbol 5 '),
(7, 'Torneo de Verano 2016'),
(8, 'Futbol 5 Jueves Capital'),
(9, 'Futbol 6 Sábados Zona Norte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneoexportado1`
--

CREATE TABLE IF NOT EXISTS `torneoexportado1` (
  `nombreequipo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `capitan` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `capitantelefono` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `capitanemail` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `capitanfacebook` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `subcapitan` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `subcapitantelefono` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `subcapitanemail` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `subcapitanfacebook` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `idexportar` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idexportar`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
