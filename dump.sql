-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for reciclaurbano
CREATE DATABASE IF NOT EXISTS `reciclaurbano` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `reciclaurbano`;

-- Dumping structure for table reciclaurbano.conductor
CREATE TABLE IF NOT EXISTS `conductor` (
  `idConductor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `edad` int(11) NOT NULL,
  `fechaVencimiento` date NOT NULL,
  PRIMARY KEY (`idConductor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table reciclaurbano.conductor: ~0 rows (approximately)
/*!40000 ALTER TABLE `conductor` DISABLE KEYS */;
INSERT INTO `conductor` (`idConductor`, `nombre`, `edad`, `fechaVencimiento`) VALUES
	(1, 'Pedro Jimenez', 35, '2019-09-20');
/*!40000 ALTER TABLE `conductor` ENABLE KEYS */;

-- Dumping structure for table reciclaurbano.recojo
CREATE TABLE IF NOT EXISTS `recojo` (
  `idRecojo` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fechaPublicacion` datetime NOT NULL,
  `fechaRecojo` date NOT NULL,
  `horaInicio` time NOT NULL,
  `horaFin` time NOT NULL,
  `pesoTotalRecojo` float NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `Conductor_idConductor` int(11) NOT NULL,
  PRIMARY KEY (`idRecojo`),
  KEY `fk_Recojo_Usuario1_idx` (`Usuario_idUsuario`),
  KEY `fk_Recojo_Conductor1_idx` (`Conductor_idConductor`),
  CONSTRAINT `fk_Recojo_Conductor1` FOREIGN KEY (`Conductor_idConductor`) REFERENCES `conductor` (`idConductor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Recojo_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table reciclaurbano.recojo: ~4 rows (approximately)
/*!40000 ALTER TABLE `recojo` DISABLE KEYS */;
INSERT INTO `recojo` (`idRecojo`, `titulo`, `fechaPublicacion`, `fechaRecojo`, `horaInicio`, `horaFin`, `pesoTotalRecojo`, `Usuario_idUsuario`, `Conductor_idConductor`) VALUES
	(1, 'Recojo de basura', '2019-06-16 08:10:00', '2019-06-21', '08:00:00', '14:00:00', 20, 3, 1),
	(2, 'Urgente recojo de basura', '2019-06-16 07:18:00', '2019-06-14', '12:00:00', '17:00:00', 15, 1, 1),
	(3, 'Recojo en santa maria del pinar', '2019-06-16 10:26:00', '2019-06-15', '15:33:00', '17:00:00', 10, 1, 1),
	(4, 'Nueva pregunta', '2019-06-17 23:25:05', '2019-06-07', '02:00:00', '04:00:00', 3, 1, 1);
/*!40000 ALTER TABLE `recojo` ENABLE KEYS */;

-- Dumping structure for table reciclaurbano.telefono
CREATE TABLE IF NOT EXISTS `telefono` (
  `idTelefono` int(11) NOT NULL AUTO_INCREMENT,
  `telefono` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idTelefono`),
  KEY `fk_Telefono_Usuario_idx` (`Usuario_idUsuario`),
  CONSTRAINT `fk_Telefono_Usuario` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table reciclaurbano.telefono: ~1 rows (approximately)
/*!40000 ALTER TABLE `telefono` DISABLE KEYS */;
INSERT INTO `telefono` (`idTelefono`, `telefono`, `Usuario_idUsuario`) VALUES
	(1, '962680881', 1);
/*!40000 ALTER TABLE `telefono` ENABLE KEYS */;

-- Dumping structure for table reciclaurbano.tipousuario
CREATE TABLE IF NOT EXISTS `tipousuario` (
  `idTipoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipoUsuario` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `caracteristicas` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idTipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table reciclaurbano.tipousuario: ~2 rows (approximately)
/*!40000 ALTER TABLE `tipousuario` DISABLE KEYS */;
INSERT INTO `tipousuario` (`idTipoUsuario`, `tipoUsuario`, `caracteristicas`) VALUES
	(1, 'Antiguo', 'Mas de 1 mes registrado'),
	(2, 'Nuevo', 'Menos de 1 mes registrado');
/*!40000 ALTER TABLE `tipousuario` ENABLE KEYS */;

-- Dumping structure for table reciclaurbano.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `dni` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `fechaNacimiento` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `distrito` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `correoElectronico` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TipoUsuario_idTipoUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `fk_Usuario_TipoUsuario1_idx` (`TipoUsuario_idTipoUsuario`),
  CONSTRAINT `fk_Usuario_TipoUsuario1` FOREIGN KEY (`TipoUsuario_idTipoUsuario`) REFERENCES `tipousuario` (`idTipoUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table reciclaurbano.usuario: ~5 rows (approximately)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`idUsuario`, `nombre`, `dni`, `direccion`, `fechaNacimiento`, `distrito`, `correoElectronico`, `password`, `TipoUsuario_idTipoUsuario`) VALUES
	(1, 'Tony Stark', '72437568', 'sdasdasdasdasd', '1997-05-06', 'Piura', 'tony@gmail.com', '123', 2),
	(3, 'John Wick', '35633733', 'av.hdld', '1999-12-16', 'Piura', 'john@gmail.com', '123', 2),
	(4, 'Pablo Escobar', '486468468', 'mi ksa', '2019-06-15', 'Piura', 'pabloes@gmail.com', '123', 2),
	(5, 'Abel de la cruz', '1234668', 'fchcghc', '2019-06-15', 'Piura', 'abel.delacruz@gmail.com', '123', 2),
	(6, 'Antonio Banderas', '848646846', 'mi ksa', '2019-06-13', 'Piura', 'antonio@gmail.com', '123', 2);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
