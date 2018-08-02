-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 02, 2018 at 02:02 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barudb`
--

-- --------------------------------------------------------

--
-- Table structure for table `localidades`
--

CREATE TABLE `localidades` (
  `idlocalidades` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `localidades`
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
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `fechaNac` date DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `puntuacion` int(11) NOT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `email`, `password`, `nombre`, `apellido`, `fechaNac`, `direccion`, `descripcion`, `puntuacion`, `estado`) VALUES
(1, 'andy@mpg.com', 'andy123', 'andres', 'gismondi', '2000-05-01', 'la plata centro', 'andres el 3 piernas gismondi', 16, 0),
(2, 'juan@mpg.com', 'juan123', 'Juan', 'Pose', '2000-05-02', 'la plata estadio unico', 'juan la mariposita', 55, 1),
(3, 'eze@mpg.com', 'eze123', 'Ezequiel', 'masciarelli', '2013-05-01', 'bernal', 'la rubia sexy', 24, 0),
(7, 'blas@mpg.com', 'blas123', 'blas', 'butera', '2000-02-02', 'chivilcoy', 'el ojitos lindos', 13, 1),
(8, 'andres@andres.com', 'andy123', 'andres', 'Grabatela', '1984-12-31', 'andres1234', 'asd', 14, 0),
(9, 'cami@cami.com', 'cami123', 'camila', 'felli', '1991-01-01', 'cami123', 'cami', 19, 0),
(10, 'jorge@mpg.com', 'jorge123', 'jorge', 'pitocorto', '1995-08-04', 'la plata', 'el grandote', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios_has_viajes`
--

CREATE TABLE `usuarios_has_viajes` (
  `usuarios_idUsuario` int(11) NOT NULL,
  `viajes_idviajes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios_has_viajes`
--

INSERT INTO `usuarios_has_viajes` (`usuarios_idUsuario`, `viajes_idviajes`) VALUES
(1, 1),
(1, 3),
(1, 6),
(1, 8),
(1, 10),
(1, 11),
(1, 12),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(3, 10),
(3, 14),
(3, 15),
(7, 10),
(7, 29),
(8, 10),
(8, 15),
(9, 1),
(9, 2),
(9, 4),
(9, 5),
(9, 8),
(9, 11),
(9, 12);

-- --------------------------------------------------------

--
-- Table structure for table `usuario_puntua_usuario`
--

CREATE TABLE `usuario_puntua_usuario` (
  `idUsuario_puntuado` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idViaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario_puntua_usuario`
--

INSERT INTO `usuario_puntua_usuario` (`idUsuario_puntuado`, `idUsuario`, `idViaje`) VALUES
(1, 9, 8),
(2, 9, 8),
(1, 9, 1),
(2, 9, 1),
(2, 9, 2),
(2, 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `vehiculo`
--

CREATE TABLE `vehiculo` (
  `idvehiculo` int(11) NOT NULL,
  `capacidad` int(11) DEFAULT NULL,
  `modelo` int(11) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `owner` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehiculo`
--

INSERT INTO `vehiculo` (`idvehiculo`, `capacidad`, `modelo`, `descripcion`, `owner`) VALUES
(4, 5, 2000, 'ford ka', 1),
(5, 4, 2014, 'corsa classic', 2),
(6, 10, 2010, 'camion de la uocra', 1),
(7, 5, 2007, 'Corolla', 2),
(8, 4, 2015, 'Corolla', 1),
(9, 3, 2001, 'Corsa', 3),
(10, 4, 2017, 'onix', 9),
(11, 2, 2018, 'ferrari', 9),
(12, 3, 2018, 'IphoneCar', 7);

-- --------------------------------------------------------

--
-- Table structure for table `viajes`
--

CREATE TABLE `viajes` (
  `idviajes` int(11) NOT NULL,
  `fechaYHora` datetime DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `duracion` int(11) DEFAULT NULL,
  `costo` int(11) DEFAULT NULL,
  `localidad_origen` int(11) NOT NULL,
  `localidad_destino` int(11) NOT NULL,
  `idvehiculo` int(11) NOT NULL,
  `estado_viaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `viajes`
--

INSERT INTO `viajes` (`idviajes`, `fechaYHora`, `tipo`, `duracion`, `costo`, `localidad_origen`, `localidad_destino`, `idvehiculo`, `estado_viaje`) VALUES
(1, '2018-06-30 13:00:00', 'semanal', 24, 1000, 11, 1, 7, 0),
(2, '2018-07-01 13:00:00', 'semanal', 24, 1000, 11, 1, 7, 0),
(3, '2018-07-03 13:00:00', 'semanal', 24, 1000, 11, 1, 7, 0),
(4, '2018-07-04 13:00:00', 'semanal', 24, 1000, 11, 1, 7, 0),
(5, '2018-07-07 13:00:00', 'semanal', 24, 1000, 11, 1, 7, 0),
(6, '2018-07-08 13:00:00', 'semanal', 24, 1000, 11, 1, 7, 0),
(7, '2018-07-10 13:00:00', 'semanal', 24, 1000, 11, 1, 7, 0),
(8, '2018-07-11 13:00:00', 'semanal', 24, 1000, 11, 1, 7, 0),
(9, '2018-07-14 13:00:00', 'semanal', 24, 1000, 11, 1, 7, 0),
(10, '2018-07-15 13:00:00', 'semanal', 24, 1000, 11, 1, 7, 0),
(11, '2018-07-30 01:00:00', 'ocacional', 24, 1000, 4, 7, 4, 0),
(12, '2018-07-29 14:00:00', 'ocacional', 20, 1500, 1, 7, 11, 0),
(14, '2018-07-30 08:12:00', 'semanal', 1, 1000, 4, 5, 4, 0),
(15, '2018-08-02 01:00:00', 'semanal', 10, 1000, 4, 5, 4, 0),
(16, '2018-08-07 01:00:00', 'semanal', 10, 1000, 4, 5, 4, 0),
(17, '2018-08-09 01:00:00', 'semanal', 10, 1000, 4, 5, 4, 0),
(18, '2018-08-14 01:00:00', 'semanal', 10, 1000, 4, 5, 4, 0),
(19, '2018-08-16 01:00:00', 'semanal', 10, 1000, 4, 5, 4, 0),
(20, '2018-08-21 01:00:00', 'semanal', 10, 1000, 4, 5, 4, 0),
(21, '2018-08-23 01:00:00', 'semanal', 10, 1000, 4, 5, 4, 0),
(22, '2018-09-04 01:00:00', 'semanal', 10, 1000, 4, 5, 4, 0),
(23, '2018-09-06 01:00:00', 'semanal', 10, 1000, 4, 5, 4, 0),
(24, '2018-09-11 01:00:00', 'semanal', 10, 1000, 4, 5, 4, 0),
(25, '2018-09-13 01:00:00', 'semanal', 10, 1000, 4, 5, 4, 0),
(26, '2018-09-18 01:00:00', 'semanal', 10, 1000, 4, 5, 4, 0),
(27, '2018-09-20 01:00:00', 'semanal', 10, 1000, 4, 5, 4, 0),
(28, '2018-09-25 01:00:00', 'semanal', 10, 1000, 4, 5, 4, 0),
(29, '2018-08-03 01:00:00', 'ocacional', 10, 50000, 9, 10, 12, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `localidades`
--
ALTER TABLE `localidades`
  ADD PRIMARY KEY (`idlocalidades`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indexes for table `usuarios_has_viajes`
--
ALTER TABLE `usuarios_has_viajes`
  ADD PRIMARY KEY (`usuarios_idUsuario`,`viajes_idviajes`),
  ADD KEY `fk_usuarios_has_viajes_viajes1_idx` (`viajes_idviajes`),
  ADD KEY `fk_usuarios_has_viajes_usuarios1_idx` (`usuarios_idUsuario`);

--
-- Indexes for table `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`idvehiculo`),
  ADD KEY `fk_vehiculo_usuarios_idx` (`owner`);

--
-- Indexes for table `viajes`
--
ALTER TABLE `viajes`
  ADD PRIMARY KEY (`idviajes`),
  ADD KEY `fk_viajes_localidades1_idx` (`localidad_origen`),
  ADD KEY `fk_viajes_localidades2_idx` (`localidad_destino`),
  ADD KEY `fk_viajes_vehiculo1_idx` (`idvehiculo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `localidades`
--
ALTER TABLE `localidades`
  MODIFY `idlocalidades` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `idvehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `viajes`
--
ALTER TABLE `viajes`
  MODIFY `idviajes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `usuarios_has_viajes`
--
ALTER TABLE `usuarios_has_viajes`
  ADD CONSTRAINT `fk_usuarios_has_viajes_usuarios1` FOREIGN KEY (`usuarios_idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_has_viajes_viajes1` FOREIGN KEY (`viajes_idviajes`) REFERENCES `viajes` (`idviajes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `fk_vehiculo_usuarios` FOREIGN KEY (`owner`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `viajes`
--
ALTER TABLE `viajes`
  ADD CONSTRAINT `fk_viajes_localidades1` FOREIGN KEY (`localidad_origen`) REFERENCES `localidades` (`idlocalidades`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_viajes_localidades2` FOREIGN KEY (`localidad_destino`) REFERENCES `localidades` (`idlocalidades`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_viajes_vehiculo1` FOREIGN KEY (`idvehiculo`) REFERENCES `vehiculo` (`idvehiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
