CREATE TABLE `bck_dbequipos` (
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
  `refgrupo` int(11) NOT NULL,
  `reftorneo` int(11) NOT NULL,
  PRIMARY KEY (`IdEquipo`),
  KEY `idcontacto` (`nombrecapitan`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `bck_dbfixture` (
  `Idfixture` int(11) NOT NULL AUTO_INCREMENT,
  `reftorneoge_a` int(11) DEFAULT NULL,
  `resultado_a` smallint(6) DEFAULT NULL,
  `reftorneoge_b` int(11) DEFAULT NULL,
  `resultado_b` smallint(6) DEFAULT NULL,
  `fechajuego` date NOT NULL DEFAULT '0000-00-00',
  `refFecha` int(11) NOT NULL,
  `Hora` time DEFAULT NULL,
  `cancha` varchar(12) DEFAULT NULL,
  `chequeado` bit(1) NOT NULL,
  `refgrupo` int(11) NOT NULL,
  `reftorneo` int(11) NOT NULL,
  PRIMARY KEY (`Idfixture`),
  KEY `indices` (`reftorneoge_a`,`resultado_a`,`reftorneoge_b`,`resultado_b`,`refFecha`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;



CREATE TABLE `bck_dbjugadores` (
  `idjugador` int(11) NOT NULL AUTO_INCREMENT,
  `apyn` varchar(200) NOT NULL,
  `idequipo` int(11) NOT NULL DEFAULT '0',
  `dni` int(11) DEFAULT NULL,
  `invitado` bit(1) DEFAULT NULL,
  `expulsado` bit(1) NOT NULL,
  `refgrupo` int(11) NOT NULL,
  `reftorneo` int(11) NOT NULL,
  PRIMARY KEY (`idjugador`),
  KEY `dni` (`dni`),
  KEY `idequipo` (`idequipo`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `bck_dbreemplazo` (
  `idreemplazo` int(11) NOT NULL AUTO_INCREMENT,
  `refequipo` int(11) NOT NULL,
  `refequiporeemplazado` int(11) NOT NULL,
  `puntos` smallint(6) NOT NULL DEFAULT '0',
  `golesencontra` smallint(6) NOT NULL DEFAULT '0',
  `reffecha` smallint(6) DEFAULT NULL,
  `reftorneo` int(11) NOT NULL,
  `refgrupo` int(11) NOT NULL,
  PRIMARY KEY (`idreemplazo`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


CREATE TABLE `bck_dbsuspendidosfechas` (
  `idsuspendidofecha` int(11) NOT NULL AUTO_INCREMENT,
  `refjugador` int(11) NOT NULL,
  `refequipo` int(11) NOT NULL,
  `reffecha` smallint(6) NOT NULL,
  `refsuspendido` int(11) NOT NULL,
  `refgrupo` int(11) NOT NULL,
  `reftorneo` int(11) NOT NULL,
  PRIMARY KEY (`idsuspendidofecha`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `bck_dbtorneoge` (
  `IdTorneoGE` int(11) NOT NULL AUTO_INCREMENT,
  `refgrupo` int(11) NOT NULL,
  `reftorneo` int(11) NOT NULL,
  `refequipo` int(11) NOT NULL,
  `prioridad` smallint(6) DEFAULT NULL,
  `activo` bit(1) NOT NULL,
  PRIMARY KEY (`IdTorneoGE`),
  KEY `indices` (`refgrupo`,`reftorneo`,`refequipo`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;


CREATE TABLE `bck_tbamonestados` (
  `idamonestado` int(11) NOT NULL AUTO_INCREMENT,
  `refjugador` int(11) NOT NULL,
  `refequipo` int(11) NOT NULL,
  `reffixture` int(11) NOT NULL,
  `amarillas` tinyint(4) NOT NULL,
  `refgrupo` int(11) NOT NULL,
  `reftorneo` int(11) NOT NULL,
  PRIMARY KEY (`idamonestado`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;


CREATE TABLE `bck_tbconducta` (
  `idconducta` int(11) NOT NULL AUTO_INCREMENT,
  `refequipo` int(11) NOT NULL,
  `puntos` int(11) NOT NULL,
  `reffecha` smallint(6) NOT NULL,
  `refgrupo` int(11) NOT NULL,
  `reftorneo` int(11) NOT NULL,
  PRIMARY KEY (`idconducta`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;


CREATE TABLE `bck_tbgoleadores` (
  `idgoleador` int(11) NOT NULL AUTO_INCREMENT,
  `refequipo` int(11) NOT NULL,
  `reffixture` int(11) NOT NULL,
  `goles` int(11) NOT NULL,
  `refjugador` int(11) NOT NULL,
  `refgrupo` int(11) NOT NULL,
  `reftorneo` int(11) NOT NULL,
  PRIMARY KEY (`idgoleador`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;


CREATE TABLE `bck_tbsuspendidos` (
  `idsuspendido` int(11) NOT NULL AUTO_INCREMENT,
  `refequipo` int(11) NOT NULL,
  `refjugador` int(11) NOT NULL,
  `motivos` varchar(130) DEFAULT NULL,
  `cantidadfechas` varchar(100) DEFAULT NULL,
  `fechacreacion` date DEFAULT NULL,
  `reffixture` int(11) NOT NULL,
  `refgrupo` int(11) NOT NULL,
  `reftorneo` int(11) NOT NULL,
  PRIMARY KEY (`idsuspendido`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;



























