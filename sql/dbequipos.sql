-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-04-2015 a las 23:41:03
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100 ;

--
-- Volcado de datos para la tabla `dbequipos`
--

INSERT INTO `dbequipos` (`IdEquipo`, `Nombre`, `nombrecapitan`, `telefonocapitan`, `facebookcapitan`, `nombresubcapitan`, `telefonosubcapitan`, `facebooksubcapitan`, `emailcapitan`, `emailsubcapitan`) VALUES
(1, '4 DE COPA', 'FRANCO VIVA', '3388-466335', 'FRANCOVIVA32', 'FRANCO CHAVES', '221-435-0603', 'FRANCOECHAVES', 'FRANCO.VIVA@HOTMAIL.ES', 'KAKO.CHAVES@GMAIL.COM'),
(2, 'A CONFIRMAR', 'MAXIMILIANO PINEIRO', '221-643-8003', '', 'LEONARDO ROSSER', '221-350-0125', '', '', ''),
(3, 'ATLETICO 78', 'ABEL MORALES', '221-5980883', '', 'JHON MORALES', '221-5475531', '', '', ''),
(4, 'AYACUCHO', 'CERESA EMILIANO', '221-6265286', 'Emiliano Ceresa', 'ACOSTA MATIAS', '221-5428776', 'Matias Matias', 'emilianoceresa@hotmail.com', 'matias_aya@hotmail.com'),
(5, 'BARRIO HIPODROMO', 'NICOLAS BERNAZA', '221-5079601', '', 'AG', '221-5765546', '', '', ''),
(6, 'CUALQUIER COSA FC', 'Ezequiel Mendoza', '221-596-8365', '', '', '', '', 'eduardoezequielmendoza@hotmail.com', ''),
(7, 'DE RABONA', 'Sergio Omar Criado', '221-4200053', '', 'Ivan Sibilio', '221-6681696', 'Ivan Sibilio', 'sercriado85@gmail.com', 'ivandariosibilio07@gmail.com'),
(8, 'DEPORTIVO INTENCION', 'Taulo Jos', '221-5935872', '', '', '', '', '', ''),
(9, 'DREAM TEAM', 'Marin Emiliano ', '221-438-3494', '', 'Victor Silvestre', '221-563-7768 ', '', '', ''),
(10, 'EL AREA BLANCA', 'JUAN MANUEL FIOL', '221-5610159', '', 'MONZOL ABEL', '221-5453121', '', '', ''),
(11, 'EL CARMEN', 'Cesar Taborda', '221-632-2387', '', '', '', '', '', ''),
(12, 'EL EBOLA', 'RODRIGO ARIEL CABRERA', '221-5406699', '', 'Facundo Palacios', '2945-531423', '', '', ''),
(13, 'EL MATADOR', 'EMILIO MARTINEZ', '221-5862006', '', 'PABLO LLONTOP', '221-4092206', '', '', ''),
(14, 'FAUSTO PAPETTI', 'Ruben Barreto', '221-6387171', '', 'Enrique Paez', '221-4772292', '', '', ''),
(15, 'GUARDA LA JARRA QUE VIENE LUIS', 'Luis', '221-4314774', '', 'Hugo', '221-4558843', '', '', ''),
(16, 'LA 15 FC', 'DARIO GARCIA', '221-4956409', '', 'MAXIMILIANO GARCIA', '4732664', '', '', '221-5749444'),
(17, 'LA 85', 'Rold', '221-5916539', '', 'Mat', '221-5952025', '', '', ''),
(18, 'LA ACADEMIA', 'LUCAS ZAPATA', '011-53141330', '', 'SEBASTIAN ZAPATA', '221-6497295', '', '', ''),
(19, 'LA RAMBLA FC', 'Jonatan Calder', '221-494-8319', 'Jc Calder', 'Franco Senta', '221-670-6311', 'Franco Mart', 'El_jone.ve@hotmail.com', 'Franco_megusta@hotmail.com'),
(20, 'LOS AMIGOS DE MESSI', 'Kevin Einschlag', '221-632-1307', 'einschlag kevin', 'Felipe Moreno', '221-655-3110', 'felipe moreno ', 'kevinela12@hotmail.com', ''),
(21, 'LOS BORBOTONES', 'MARIANO RIVERO', '221-6372352', '', 'LUCAS VALDEMOROS', '221-5755162', '', '', ''),
(22, 'LOS PERROS CHAKALES FC', 'Eber Nicolas Moyano', '221-6402601', '', 'Laureano Moreno', '221-5373063', '', '', ''),
(23, 'LOS PINIPONES', 'LOPEZ ENZO', '221-4194252', 'ENZO NAHUEL LOPEZ', 'LOPEZ HECTOR', '221-6186468', 'HECTOR LOPEZ', '', ''),
(24, 'LOS RANCIOS', 'Matias Morales ', '221-476-8745', '', 'Jose Vazquez ', '221-569-4314', '', '', ''),
(25, 'LOS RUSTICOS', 'Marcos Ricci', '11-663-65492 ', '', '', '', '', '', ''),
(26, 'MACHETE FC', 'Dimitri Ivaskevich', '221-610-4168', 'Dimitri Ivaskevich', 'Martin Zotti', '0221-498-7653', 'Martin Zotti', 'ariel9_@hotmail.com', 'martinzotti@hotmail.com'),
(27, 'MAS O MENOS', 'MARITO HERRERA', '2216225231', 'MARITO HERRERA', 'MATIAS TERREIN', '2215944405', 'MATIAS TERREIN', 'FELI_LA12_1@HOTMAIL.COM', 'TERREIN.MATIAS@YAHOO.COM'),
(28, 'MONASTERIO FC', 'Matias Rodriguez', '221-355-5670', '', 'Juan Rodriguez', '221-498-7475', '', '4527121', '4573510'),
(29, 'MUCHO FC', 'Lugli Franco', '221 3166590', 'Fran Lugli', 'Urrutipi, Ariel', '221 5938456', 'Ariel Urrutipi', 'franlugli@gmail.com', 'arielurrutipi@gmail.com'),
(30, 'NO COMPLETAN', 'Cristian Martinez', '221-6062051', '', 'Leonardo Caceres', '221-4116687', '', '', ''),
(31, 'PARA QUE TE TRAJE', 'Mariano Lopez', '221-6007472', 'Mariano Lopez', 'Facundo Pardo', '221-5582170', '', 'mlopez@eldia.com', ''),
(32, 'RESAKEADOS FC', 'LUCAS VALLEJO', '1132366432', 'LUCAS MANUEL', 'MAURICIO ALMIRON', '2214973415', 'MAURI ALMIRON', 'LUKS_PITU@HOTMAIL.COM', 'NI_LARENGA-11@HOTMAIL.COM'),
(33, 'ROJA DIRECTA', 'NAVARRO MARTIN', '221-4408811', '', '', '', '', 'MARTINIANO_NAVARRO@HOTMAIL.COM', ''),
(34, 'SHALKE 40', 'Alexis Barrios', '221-511-0710', 'Ezequiel Castelli', 'Fernando Quinhones', '221-505-3428', '', '221-632-8869', ''),
(35, 'SIN ENGANCHE', 'Heredia Marcos', '2216124230', 'Markitoss Heredia', 'Heredia Miguel', '2214186159', 'Miguel Angel Heredia', 'Markozz.94_lp@hotmail.com', 'Miguel_la_plata@hotmail.com'),
(36, 'SPORTIVO TORIBIO', 'Fernando Kogan', '2215739018', 'Fer Kogan', 'Rodrigo Miloslavsky', '2215234733', '', '', '221-5454875'),
(37, 'TITO FC', 'lettieri juan andres', '0221-15-5423914', 'juan andres lettieri', 'orlando, jeronimo', '0221-15-5421605', 'Martin Iriondo', 'andreslettieri@gmail.com', '0221-153172459'),
(38, 'UTV', 'Rene', '221-6377501', '', 'Diego', '221-4286336', '', '4860601', ''),
(39, 'VITESSE GONNET ', 'Juan Ignacio Ireba', '22115-556-0002', 'Pirru Ireba', 'Imanol Ireba', '022115-523-3050', 'Imanol Ireba', 'pirru09@hotmail.com', 'imanol.ireba@gmail.com'),
(40, 'YARARAS', 'Vi', '221428-9358', '', 'Luchetti Martin', '221626-0870', '', '', ''),
(41, 'ASTON BIRRA', 'LUIS CORVALAN', '2216075748', 'aston_birra@hotmail.com.ar', 'CHAVERO TOMAS', '2216079428', '', 'luiscorva12@gmail.com', ''),
(42, 'BARRIO UPCN', 'VICTOR TRIVI', '221-661-8504', 'VICTOR TRIVI', 'LEANDRO VERON', '221-596-3306', 'LEANDRO VERON', 'victor_pincha@hotmail.com', ''),
(43, 'BRANCA LEVERKUSEN', 'DESIO DAMIAN', '221-563-5702', '', 'JUAN', '221-569-9384', '', '', ''),
(44, 'BUSHIDO', 'DAVID BONY', '221-599-4219', '/david.bony', 'JUAN FERRI', '221-434-8526', '/juanmanuel.ferri.3', 'xram27@hotmail.com', 'jmf_pinchacapo@hotmail.com'),
(45, 'CATALAMA FC', 'SEBASTIAN HELO', '221-6567626', '', 'FERNANDO VEZZOSI', '221-6340075', 'Fernando Vezzosi', '', 'Fer_tano@hotmail.com'),
(46, 'CDC', 'LUCAS FERNANDEZ', '221-6052079', '', 'RUBEN', '221-5861822', '', '', ''),
(47, 'CIPOLLETI FC', 'STEFANO GRISANTI', '299-4524506', 'Marino Bonotti', 'EZEQUIEL BONOTTI', '299-4054484', '', '299-4681296', ''),
(48, 'DEPORTIVO NUBARRON', 'PEDRO GARGANTA', '221 606 2796', '', 'MARCO ANDREOLI', '221 542 3834', '', 'agus_elgomezmaly@hotmail.com', 'agusbasile_bba@hotmail.com'),
(49, 'FLAMINGO', 'ALVAREZ JERONIMO', '221-615-5495', 'alvarez jeronimo', 'CUERVO JONATAN', '221-434-5854', 'jonatan cuervo', 'alvarezj@hotmail.com.ar', ''),
(50, 'HIERBA BRAVA', 'ARMENTIA GONZALO', '221-564-7183', '', 'YAMIL RAIDAN', '221-438-6689', '', 'gonza22.lp@hotmail.com', ''),
(51, 'LOS APOSTOLES', 'RICO DIEGO MARTIN', '221-6062232', '', 'TOSCANI EMILIANO', '221-4197356', '', 'dmartor@hotmail.com', 'emitoscani@hotmail.com'),
(52, 'LOS VITANGA FC', 'AGUSTIN CHIMENTI', '221-6162884', '', 'DEFEIS MAXIMILIANO', '221-5225923', '', 'agustinchimenti@hotmail.com', 'maxidefeis@hotmail.com'),
(53, 'MERCADO FC', 'EZEQUIEL', '221-5087478', '', 'CRISTIAN SANTI', '221-579-7794', '', '', ''),
(54, 'MIRAFLORES', 'GOBELLO FELIPE', '221-354-9696', 'Felipe Gobello', 'BAZTARRICA JUAN', '221-508-8968', 'LAMBOGLIA SANTIAGO', 'feli.everton@hotmail.com ', '221-620-2135'),
(55, 'PARQUE CASTELLI', 'EZEQUIEL BARRADO', '221-5640 517', '', 'NICOLAS BELUCCI', '221-6559136', '', 'julianmercado90@hotmail.com ', 'nico22lp@hotmail.com'),
(56, 'PUNTA LARA FC', 'MARCOS MARTINEZ', '221-459-1345', 'Hector Fernandez', 'ISIDRO ALBERTO MARTINEZ', '221-357-0569', 'Fernandez Juan Manuel', '221-6003793/4660591', ''),
(57, 'SEBA Y LOS NIETOS', 'FERNANDO BAZZE', '221-6087835', '', 'EZEQUIEL FIDALGO', '', 'EZEQUIEL FIDALGO', 'ferbazze@gmail.com', 'cefidalgo@gmail.com'),
(58, 'SPORTING LP', 'GUSTAVO RIBAS', '221-434-5042', '', 'JOEL SALAZAR', ' 221-557-4536', '', '', ''),
(59, 'UNION', 'SAVOIA MAXIMILIANO', '221-351-3781', 'Maxi Savoia', 'SEBASTIAN JUMILLA', '221-508-2941', '', 'Maxi_mms@live.com.ar', ''),
(60, 'WILLIAN BOO', 'EMANUEL SILVA', '221-591-1085', '', 'PATRICIO ALARCON', '221-504-5705', '', 'emanueldariosilva@gmail.com', 'filoalarcon@hotmail.com'),
(61, '19 DE FEBRERO', 'RAMIREZ MARIANO', '221-4369394', '', 'CATERIANO NAHUEL', '221-6271996', '', 'nuevo 221-3628732', ''),
(62, 'AEROPUERTO FC', 'MAURO JEREZ', '4862501', 'aeropuerto f.c ', 'OSCAR CHAVES', '221-620-0026', 'Oscar chaves', '', ''),
(63, 'ALTO EQUIPO', 'CARCAMO MATIAS', '221-5050051', '', 'PABLO AGUILERA', '221-4348337', '', '', 'pablo_85333@hotmail.com'),
(64, 'BARRACAS CENTRAL', 'JUAN MANUEL RODO', '221-599 6226', '', 'JUAN PABLO CASTELLI', '221-5564371', '', '', ''),
(65, 'BELL PIZZA FC', 'JUAN PABLO AGUIRRE', '221-637-0029', 'JUAN PABLO AGUIRRE', 'LEONARDO GERMAN MARTINEZ', '221-418-3431', 'GERMAN MARTINEZ', '', ''),
(66, 'BRANCA PASION', 'FLORICICH FRANCO', '221-589-1173', 'francofloricich', 'COSTA CRISTIAN', '221-488-3765', 'cristiancosta', 'francofloricich@outlook.com', 'cristiancosta@outlook.com'),
(67, 'CLUB ATLETICO BARRIO JARDIN', 'FERNANDEZ JOAQUIN', '221 455 5767', 'JOAQUIN FERNANDEZ', 'OGUIZA NEHUEN', '221 317 7844', 'NEHUEN OGUIZA', 'JOAQUIN.10F@GMAIL.COM', 'nehu.lp-@hotmail.com'),
(68, 'CANNABIS FC', 'MARIANO LUCERO', '221-585-9726', 'MARIANO LUCERO', 'EMANUEL VILLALBA', '221-408-9121', 'EMMAVILLALBA', 'marianolucero77@hotmail.com', ''),
(69, 'CAULP', 'SANTIAGO LOREA', '221-523-3717', '', 'FEDERICO CANOVA', '221-400-9846', '', '', ''),
(70, 'CERVECEROS', 'ALEXIS DIAZ', '221-6426784', '', 'CARLOS CANEVA', '221-6692252', '', '', ''),
(71, 'CITY BELL FC', 'DAVID FRANCO', '221-6393306', 'Franco David', '', '', '', '', ''),
(72, 'DEFENSORES DE AEROPUERTO', 'SEBASTIAN LOZANO', '221-6406985', '', 'COLMAN ARIEL', '', '', '', ''),
(73, 'EL PALOMAR', 'CEPEDA GONZALO', '221-4282111', 'Matias Mastrovito', 'VICTOR OTAMENDI', '221-565-1943', 'Emanuel Cepeda', '221-5048312', '221-6549353'),
(74, 'EL REJUNTE', 'POZA ADRIAN', '221-15-5013971', '', 'MILLAN ALBERTO', '221-15-5703646', '', 'adriancap_er05@yahoo.com.ar', ''),
(75, 'ETIQUETA NEGRA', 'LUIS CABALLERO', '221-6388903', '', 'FEDERICO CABALLERO', '221-4957933', '', '', ''),
(76, 'GUERREROS Z', 'CARRIZO WALTER', '', '', 'IVAN WAISK', '221-5772703', 'DANIEL MARTINEZ', '', '221-6068095'),
(77, 'LA 36', 'SEBASTIAN CLAVERI', '221-4008174', '', 'CLAUDIO ODOGUARDI', '221-4886688', '', 'SCLAVERI@YAHOO.COM.AR', ''),
(78, 'LEYENDAS', 'AQUINO SANTIAGO', '221-476-2669', 'SANTIAGO AQUINO', 'ANDRADA VALENTIN', '4867081', 'VALENTIN ANDRADA', 'Sonich_arcr@hotmail.com', 'ABANDONGAMER4LIFE@FACEBOOK.COM'),
(79, 'LOS CARPIN', 'SANCHEZ ADRIAN', '221-3041496', '', 'GOTELLI LEONARDO', '', '', '', ''),
(80, 'LOS DINOS', 'QUINTEROS MARTIN', '221-6138299', '', 'CLAUDIO', '221-4006222', 'naanoo EdeLp', '', ' clau_pincha_rata@hotmail.como'),
(81, 'LOS HALCONES', 'DANIEL BAEZ', '2223-674643', '', 'MARIO LEIVA', '221-5241903', '', '4868267', ''),
(82, 'LOS LEPROSOS', 'FEDERICO AGUSTIN', '221-6214624', '', 'PABLO', '221-5042071', 'JUAN', '', '221-5927499'),
(83, 'LOS PIOJOSOS', 'EZEQUIEL MORELLI', '221-6700930', '', 'JAVIER MORELLI', '221-6701110', '', '', ''),
(84, 'LOS TERRY', 'LEO', '221-592-0106', 'LEO SANCHEZ ORTIZ', 'CLAUDIO', '221-591-3897', 'CLAUDITO VEGA', 'LEOSANCHEZORTIZ@HOTMAIL.COM', ''),
(85, 'MERENGUE FC', 'RAMIREZ VICTOR', '15-476-1759', '', 'OVIEDO AGUSTIN', '15-564-6577', '', '', 'agus_pincha@hotmail.com'),
(86, 'QUILMES', 'CRISTIAN NU', '221-6555383', '', 'JORGE NU', '221-4950916', 'Javier Sotelo', '', '221-6168310'),
(87, 'RED BULL', 'SEBASTIAN GARCIA', '221-6324300', 'sebastian garcia', 'ANGEL GARCIA', '221-5686902', 'angel garcia', '', ''),
(88, 'RESISTENCIA FC', 'MATIAS RAMIREZ', '221-3169778', '', 'ANGEL NAVARRO', '221-4950866', '', 'matias85_ram@hotmail.com', ''),
(89, 'RUSTICO Y FILOSO', 'EDGARDO MALDONADO', '221-5388373', '', 'EMA BERON', '221-6031209', '', '', ''),
(90, 'VAYADORMIR FC', 'AUBERT JUAN MANUEL', '2215432204', 'Aubert Juan Manuel', 'JAUREGUI VERLIAC EMMANUEL', '2215422591', 'Jauregui Verliac Emmanuel', 'Kamus_Juan@hotmail.com', 'emma_jaureguiverliac@hotmail.com'),
(91, 'BARSITO', 'JKH', 'KJKJHK', 'KJH', 'KJH', 'KJH', 'KJH', 'KJH', 'KJH'),
(92, 'CARBONEROS', 'ASD', 'ASD', 'ASD', 'ASD', 'ASD', 'ASD', 'ASD', 'ASD'),
(93, 'EL MERCADITO FC', 'ASD', 'ASD', 'ASD', 'ASD', 'ASDA', 'ASD', 'ASD', 'ASD'),
(94, 'LOCOS POR EL FUTBOL', 'ASD', 'ASD', 'ASD', 'ASD', 'ASD', 'ASD', 'ASD', 'ASD'),
(95, 'TIKI TIKI', 'ASD', 'ASD', 'ASD', 'ASD', 'ASD', 'ASD', 'ASD', 'ASD'),
(96, 'PASO A PASO', 'ASD', 'ASD', 'ASD', 'ASD', 'ASD', 'ASD', 'ASD', 'ASD'),
(97, 'VILLA ALBA', 'ASD', 'ASD', 'ASD', 'ASD', 'ASD', 'ASD', 'ASD', 'ASD'),
(98, 'CA PEÑAROL', 'ASD', 'ASD', 'ASD', 'ASD', 'ASD', 'ASD', 'ASD', 'ASD'),
(99, 'PLATENSES', 'ASD', 'ASD', 'ASD', 'ASD', 'ASD', 'ASD', 'ASD', 'ASD');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
