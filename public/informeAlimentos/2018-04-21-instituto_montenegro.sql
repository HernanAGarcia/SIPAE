# Host: localhost  (Version 5.7.17-log)
# Date: 2018-01-26 13:20:59
# Generator: MySQL-Front 6.0  (Build 1.194)


#
# Structure for table "administrador"
#

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE `administrador` (
  `codigoAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(15) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codigoAdmin`)
) ENGINE=InnoDB AUTO_INCREMENT=1235 DEFAULT CHARSET=latin1;

#
# Data for table "administrador"
#

INSERT INTO `administrador` VALUES (1234,'administrador','admin','Admin','Admin');

#
# Structure for table "estudiante"
#

DROP TABLE IF EXISTS `estudiante`;
CREATE TABLE `estudiante` (
  `documento` varchar(11) NOT NULL DEFAULT '0',
  `grupo` int(4) DEFAULT NULL,
  `grado` varchar(20) DEFAULT NULL,
  `apellidos` varchar(55) DEFAULT NULL,
  `nombres` varchar(55) DEFAULT NULL,
  `zonaAlumno` varchar(55) DEFAULT NULL,
  `jornada` varchar(55) DEFAULT NULL,
  `huella` blob,
  PRIMARY KEY (`documento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "estudiante"
#


#
# Structure for table "estudiante_ocasional"
#

DROP TABLE IF EXISTS `estudiante_ocasional`;
CREATE TABLE `estudiante_ocasional` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `documento` int(11) NOT NULL DEFAULT '0',
  `nombres` varchar(65) DEFAULT NULL,
  `apellidos` varchar(70) DEFAULT NULL,
  `fechaIngreso` date DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "estudiante_ocasional"
#


#
# Structure for table "instituto_montenegro"
#

DROP TABLE IF EXISTS `instituto_montenegro`;
CREATE TABLE `instituto_montenegro` (
  `Nit` int(11) NOT NULL AUTO_INCREMENT,
  `documentoEstudiante` varchar(11) NOT NULL DEFAULT '0',
  `fechaIngreso` date DEFAULT NULL,
  `ultimoIngreso` date DEFAULT NULL,
  PRIMARY KEY (`Nit`),
  KEY `documentoEstudiante` (`documentoEstudiante`),
  CONSTRAINT `instituto_montenegro_ibfk_1` FOREIGN KEY (`documentoEstudiante`) REFERENCES `estudiante` (`documento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1126 DEFAULT CHARSET=latin1;

#
# Data for table "instituto_montenegro"
#

