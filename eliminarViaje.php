<?php
session_start();
require 'conexion.php';
$idViaje = file_get_contents('php://input');
$conn= new conexion();
$consulta1 = "DELETE FROM usuarios_has_viajes WHERE viajes_idviajes='$idViaje'";
$resulQuery1 = $conn->consultarABD($consulta1);
$consulta1 = "DELETE FROM viajes WHERE idviajes='$idViaje'";
$resulQuery1 = $conn->consultarABD($consulta1);
?>
