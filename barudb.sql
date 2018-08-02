-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 01, 2018 at 11:06 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

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
-- Table structure for table `usariospendientes_has_viajes`
--

CREATE TABLE `usariospendientes_has_viajes` (
  `usuarios_idUsuarios` int(11) NOT NULL,
  `viajes_idViajes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `email`, `password`, `nombre`, `apellido`, `fechaNac`, `direccion`, `descripcion`, `estado`) VALUES
(1, 'andy@mpg.com', 'andy123', 'andres', 'gismondi', '2000-05-01', 'la plata centro', 'andres el 3 piernas gismondi', 0),
(2, 'juan@mpg.com', 'juan123', 'Juan', 'Pose', '2000-05-02', 'la plata estadio unico', 'juan la mariposita', 1),
(3, 'eze@mpg.com', 'eze123', 'Ezequiel', 'masciarelli', '2013-05-01', 'bernal', 'la rubia sexy', 0),
(7, 'blas@mpg.com', 'blas123', 'blas', 'butera', '2000-02-02', 'chivilcoy', 'el ojitos lindos', 1);

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
(2, 1),
(2, 13),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 12),
(3, 13),
(3, 14),
(3, 15),
(7, 1),
(7, 3),
(7, 8);

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
(1, 5, 2010, 'Fiat Palio', 3),
(4, 5, 2000, 'Ford Ranger', 3),
(5, 5, 2004, 'ford ranger', 3),
(6, 2, 2018, 'Ferrari', 3);

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
(1, '2018-06-30 20:10:00', 'ocacional', 1, 150, 7, 1, 1, 0),
(2, '2018-07-02 10:00:00', 'ocacional', 18, 1000, 1, 9, 4, 0),
(3, '2018-07-02 07:00:00', 'semanal', 2, 500, 1, 7, 1, 0),
(4, '2018-07-03 07:00:00', 'semanal', 2, 500, 1, 7, 1, 0),
(5, '2018-07-04 07:00:00', 'semanal', 2, 500, 1, 7, 1, 0),
(6, '2018-07-05 07:00:00', 'semanal', 2, 500, 1, 7, 1, 0),
(7, '2018-07-06 07:00:00', 'semanal', 2, 500, 1, 7, 1, 0),
(8, '2018-06-30 12:00:00', 'ocacional', 2, 300, 11, 10, 4, 0),
(9, '2018-07-07 12:00:00', 'semanal', 2, 1000, 11, 4, 1, 0),
(10, '2018-07-10 12:00:00', 'semanal', 2, 1000, 11, 4, 1, 0),
(11, '2018-07-11 12:00:00', 'semanal', 2, 1000, 11, 4, 1, 0),
(12, '2018-07-14 12:00:00', 'semanal', 2, 1000, 11, 4, 1, 0),
(13, '2018-07-11 12:12:00', 'ocacional', 2, 300, 8, 6, 6, 0),
(14, '2018-08-22 12:23:00', 'ocacional', 2, 100, 8, 5, 1, 0),
(15, '2018-08-10 13:59:00', 'ocacional', 999999, 2147483647, 4, 1, 4, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `localidades`
--
ALTER TABLE `localidades`
  ADD PRIMARY KEY (`idlocalidades`);

--
-- Indexes for table `usariospendientes_has_viajes`
--
ALTER TABLE `usariospendientes_has_viajes`
  ADD PRIMARY KEY (`usuarios_idUsuarios`,`viajes_idViajes`),
  ADD KEY `viajes_idViajes` (`viajes_idViajes`);

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
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `idvehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `viajes`
--
ALTER TABLE `viajes`
  MODIFY `idviajes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `usariospendientes_has_viajes`
--
ALTER TABLE `usariospendientes_has_viajes`
  ADD CONSTRAINT `usariospendientes_has_viajes_ibfk_1` FOREIGN KEY (`usuarios_idUsuarios`) REFERENCES `usuarios` (`idUsuario`),
  ADD CONSTRAINT `usariospendientes_has_viajes_ibfk_2` FOREIGN KEY (`viajes_idViajes`) REFERENCES `viajes` (`idviajes`);

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
