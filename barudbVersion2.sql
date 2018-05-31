-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 31-05-2018 a las 17:22:21
-- Versión del servidor: 5.7.21
-- Versión de PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `barudb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidades`
--

DROP TABLE IF EXISTS `localidades`;
CREATE TABLE IF NOT EXISTS `localidades` (
  `idlocalidades` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idlocalidades`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `localidades`
--

INSERT INTO `localidades` (`idlocalidades`, `nombre`) VALUES
(1, 'La Plata'),
(2, 'Bariloche'),
(3, 'Misiones'),
(4, 'Concordia'),
(5, 'La Pampa'),
(6, 'Ensenada'),
(7, 'Microcentro - CABA'),
(8, 'Junin'),
(9, 'San Martin de los Andes'),
(10, 'Salta'),
(11, 'Calafate');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `fechaNac` date DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `email`, `password`, `nombre`, `apellido`, `fechaNac`, `direccion`, `descripcion`, `estado`) VALUES
(1, 'andy@mpg.com', 'andy123', 'andres', 'gismondi', '2000-05-01', 'la plata centro', 'andres el 3 piernas gismondi', 0),
(2, 'juan@mpg.com', 'juan123', 'Juan', 'Pose', '2000-05-02', 'la plata estadio unico', 'juan la mariposita', 1),
(3, 'eze@mpg.com', 'eze123', 'Ezequiel', 'masciarelli', '2013-05-01', 'bernal', 'la rubia sexy', 0),
(7, 'blas@mpg.com', 'blas123', 'blas', 'butera', '2000-02-02', 'chivilcoy', 'el ojitos lindos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_has_viajes`
--

DROP TABLE IF EXISTS `usuarios_has_viajes`;
CREATE TABLE IF NOT EXISTS `usuarios_has_viajes` (
  `usuarios_idUsuario` int(11) NOT NULL,
  `viajes_idviajes` int(11) NOT NULL,
  PRIMARY KEY (`usuarios_idUsuario`,`viajes_idviajes`),
  KEY `fk_usuarios_has_viajes_viajes1_idx` (`viajes_idviajes`),
  KEY `fk_usuarios_has_viajes_usuarios1_idx` (`usuarios_idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios_has_viajes`
--

INSERT INTO `usuarios_has_viajes` (`usuarios_idUsuario`, `viajes_idviajes`) VALUES
(2, 1),
(7, 2),
(2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

DROP TABLE IF EXISTS `vehiculo`;
CREATE TABLE IF NOT EXISTS `vehiculo` (
  `idvehiculo` int(11) NOT NULL AUTO_INCREMENT,
  `capacidad` int(11) DEFAULT NULL,
  `modelo` int(11) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `owner` int(11) DEFAULT NULL,
  PRIMARY KEY (`idvehiculo`),
  KEY `fk_vehiculo_usuarios_idx` (`owner`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`idvehiculo`, `capacidad`, `modelo`, `descripcion`, `owner`) VALUES
(4, 5, 2000, 'ford ka', 1),
(5, 4, 2014, 'corsa classic', 2),
(6, 10, 2010, 'camion de la uocra', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajes`
--

DROP TABLE IF EXISTS `viajes`;
CREATE TABLE IF NOT EXISTS `viajes` (
  `idviajes` int(11) NOT NULL AUTO_INCREMENT,
  `fechaYHora` datetime DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `duracion` int(11) DEFAULT NULL,
  `costo` int(11) DEFAULT NULL,
  `localidad_origen` int(11) NOT NULL,
  `localidad_destino` int(11) NOT NULL,
  `idvehiculo` int(11) NOT NULL,
  `estado_viaje` int(11) NOT NULL,
  PRIMARY KEY (`idviajes`),
  KEY `fk_viajes_localidades1_idx` (`localidad_origen`),
  KEY `fk_viajes_localidades2_idx` (`localidad_destino`),
  KEY `fk_viajes_vehiculo1_idx` (`idvehiculo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `viajes`
--

INSERT INTO `viajes` (`idviajes`, `fechaYHora`, `tipo`, `duracion`, `costo`, `localidad_origen`, `localidad_destino`, `idvehiculo`, `estado_viaje`) VALUES
(1, '2018-06-12 05:00:00', 'ocacional', 30, 10000, 1, 11, 4, 0),
(2, '2018-06-05 11:00:00', 'semanal', 6, 2000, 4, 1, 4, 0),
(3, '2018-06-20 04:00:00', 'ocacional', 35, 9000, 8, 11, 4, 0),
(4, '2018-06-06 14:00:00', 'semanal', 12, 4000, 6, 3, 4, 0),
(5, '2018-06-04 05:00:00', 'diario', 2, 500, 6, 7, 4, 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios_has_viajes`
--
ALTER TABLE `usuarios_has_viajes`
  ADD CONSTRAINT `fk_usuarios_has_viajes_usuarios1` FOREIGN KEY (`usuarios_idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_has_viajes_viajes1` FOREIGN KEY (`viajes_idviajes`) REFERENCES `viajes` (`idviajes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `fk_vehiculo_usuarios` FOREIGN KEY (`owner`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD CONSTRAINT `fk_viajes_localidades1` FOREIGN KEY (`localidad_origen`) REFERENCES `localidades` (`idlocalidades`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_viajes_localidades2` FOREIGN KEY (`localidad_destino`) REFERENCES `localidades` (`idlocalidades`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_viajes_vehiculo1` FOREIGN KEY (`idvehiculo`) REFERENCES `vehiculo` (`idvehiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
