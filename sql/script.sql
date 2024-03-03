-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: bbzuagdjlkqdqv4xywpr-mysql.services.clever-cloud.com:3306
-- Tiempo de generación: 03-03-2024 a las 23:22:49
-- Versión del servidor: 8.0.22-13
-- Versión de PHP: 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bbzuagdjlkqdqv4xywpr`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductor`
--

CREATE TABLE `conductor` (
  `idConductor` int NOT NULL,
  `nombre` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `edad` int NOT NULL,
  `fechaVencimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `conductor`
--

INSERT INTO `conductor` (`idConductor`, `nombre`, `edad`, `fechaVencimiento`) VALUES
(1, 'Pedro Jimenez', 35, '2019-09-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recojo`
--

CREATE TABLE `recojo` (
  `idRecojo` int NOT NULL,
  `titulo` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fechaPublicacion` datetime NOT NULL,
  `fechaRecojo` date NOT NULL,
  `horaInicio` time NOT NULL,
  `horaFin` time NOT NULL,
  `pesoTotalRecojo` float NOT NULL,
  `Usuario_idUsuario` int NOT NULL,
  `Conductor_idConductor` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `recojo`
--

INSERT INTO `recojo` (`idRecojo`, `titulo`, `fechaPublicacion`, `fechaRecojo`, `horaInicio`, `horaFin`, `pesoTotalRecojo`, `Usuario_idUsuario`, `Conductor_idConductor`) VALUES
(1, 'Recojo de basura', '2019-06-16 08:10:00', '2019-06-21', '08:00:00', '14:00:00', 20, 3, 1),
(2, 'Urgente recojo de basura', '2019-06-16 07:18:00', '2019-06-14', '12:00:00', '17:00:00', 15, 1, 1),
(3, 'Recojo en santa maria del pinar', '2019-06-16 10:26:00', '2019-06-15', '15:33:00', '17:00:00', 10, 1, 1),
(4, 'Nueva pregunta', '2019-06-17 23:25:05', '2019-06-07', '02:00:00', '04:00:00', 3, 1, 1),
(5, 'Basura', '2019-06-21 15:01:58', '2019-06-26', '07:01:00', '19:01:00', 20, 9, 1),
(6, 'recojo inmedito', '2019-06-21 17:07:41', '2019-06-22', '07:00:00', '21:00:00', 20, 9, 1),
(7, 'qqqq', '2019-06-21 17:43:59', '2019-06-20', '03:03:00', '05:05:00', 45, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono`
--

CREATE TABLE `telefono` (
  `idTelefono` int NOT NULL,
  `telefono` varchar(9) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Usuario_idUsuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `telefono`
--

INSERT INTO `telefono` (`idTelefono`, `telefono`, `Usuario_idUsuario`) VALUES
(1, '962680881', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `idTipoUsuario` int NOT NULL,
  `tipoUsuario` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `caracteristicas` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`idTipoUsuario`, `tipoUsuario`, `caracteristicas`) VALUES
(1, 'Antiguo', 'Mas de 1 mes registrado'),
(2, 'Nuevo', 'Menos de 1 mes registrado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int NOT NULL,
  `nombre` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dni` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fechaNacimiento` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `distrito` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `correoElectronico` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TipoUsuario_idTipoUsuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `dni`, `direccion`, `fechaNacimiento`, `distrito`, `correoElectronico`, `password`, `TipoUsuario_idTipoUsuario`) VALUES
(1, 'Tony Stark', '72437568', 'sdasdasdasdasd', '1997-05-06', 'Piura', 'tony@gmail.com', '123', 2),
(3, 'John Wick', '35633733', 'av.hdld', '1999-12-16', 'Piura', 'john@gmail.com', '123', 2),
(4, 'Pablo Escobar', '486468468', 'mi ksa', '2019-06-15', 'Piura', 'pabloes@gmail.com', '123', 2),
(5, 'Abel de la cruz', '1234668', 'fchcghc', '2019-06-15', 'Piura', 'abel.delacruz@gmail.com', '123', 2),
(6, 'Antonio Banderas', '848646846', 'mi ksa', '2019-06-13', 'Piura', 'antonio@gmail.com', '123', 2),
(7, 'Abel De la cruz Flores', '48124068', 'av. San ramon', '2019-06-07', 'Piura', 'delacruzflores21@gmail.com', '123', 2),
(8, 'leo', '64651201', 'mi casita', '1996-10-16', 'piura', 'lroa999', '1425', 2),
(9, 'Michael', '48392874', 'Paita', '2019-06-21', 'Paita', 'Michaelaraujo58@gmail.com', '12345', 2),
(10, 'abel', '12345678', 'fdgssg', '2019-06-06', 'fdsg', 'abel.delacruz@gmail.com', '123', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `conductor`
--
ALTER TABLE `conductor`
  ADD PRIMARY KEY (`idConductor`);

--
-- Indices de la tabla `recojo`
--
ALTER TABLE `recojo`
  ADD PRIMARY KEY (`idRecojo`),
  ADD KEY `fk_Recojo_Usuario1_idx` (`Usuario_idUsuario`),
  ADD KEY `fk_Recojo_Conductor1_idx` (`Conductor_idConductor`);

--
-- Indices de la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD PRIMARY KEY (`idTelefono`),
  ADD KEY `fk_Telefono_Usuario_idx` (`Usuario_idUsuario`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`idTipoUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_Usuario_TipoUsuario1_idx` (`TipoUsuario_idTipoUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `conductor`
--
ALTER TABLE `conductor`
  MODIFY `idConductor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `recojo`
--
ALTER TABLE `recojo`
  MODIFY `idRecojo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `telefono`
--
ALTER TABLE `telefono`
  MODIFY `idTelefono` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `idTipoUsuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `recojo`
--
ALTER TABLE `recojo`
  ADD CONSTRAINT `fk_Recojo_Conductor1` FOREIGN KEY (`Conductor_idConductor`) REFERENCES `conductor` (`idConductor`),
  ADD CONSTRAINT `fk_Recojo_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idusuario`);

--
-- Filtros para la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD CONSTRAINT `fk_Telefono_Usuario` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idusuario`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_TipoUsuario1` FOREIGN KEY (`TipoUsuario_idTipoUsuario`) REFERENCES `tipousuario` (`idTipoUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
