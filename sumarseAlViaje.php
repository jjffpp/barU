<?php
include_once "conexion.php";
session_start();
$idUsuario =$_SESSION["idUsuario"];
$idViaje = $_POST['param1'];
$conn= new conexion();
$consulta = "INSERT INTO `usariospendientes_has_viajes`(`usuarios_idUsuario`, `viajes_idviajes`)
            VALUES ('$idUsuario', '$idViaje')";
$resulQuery = $conn->consultarABD($consulta);
 header("location: indexPrimario.php");
?>
