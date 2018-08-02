-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 02, 2018 at 04:55 PM
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
  `usuarios_idUsuario` int(11) NOT NULL,
  `viajes_idviajes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usariospendientes_has_viajes`
--

INSERT INTO `usariospendientes_has_viajes` (`usuarios_idUsuario`, `viajes_idviajes`) VALUES
(3, 34);

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
(3, 'eze@mpg.com', 'eze123', 'Ezequiel', 'masciarelli', '2013-05-01', 'bernal', 'la rubia sexy', 25, 0),
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
(2, 33),
(2, 34),
(3, 33);

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
(3, 2, 33);

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
(33, '2018-08-02 09:52:00', 'ocacional', 1, 1000, 6, 8, 9, 0),
(34, '2018-08-22 23:12:00', 'ocacional', 10, 500, 4, 5, 5, 0);

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
  ADD PRIMARY KEY (`usuarios_idUsuario`,`viajes_idviajes`),
  ADD KEY `viajes_idViajes` (`viajes_idviajes`);

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
  MODIFY `idviajes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
