<?php
require 'conexion.php';
session_start();
$modelo = $_POST["modelo"];
$capacidad = $_POST["capacidad"];
$descripcion = $_POST["descripcion"];
$id= $_SESSION['idUsuario'];
$patente = $_POST["patente"];

$patente = strtoupper($patente);
//inserto en la base de datos
$conn= new conexion();
//la consulta con owner truncado en 1
$consulta= "INSERT INTO `vehiculo`(`capacidad`, `modelo`, `descripcion`, `owner`,`patente`)
            VALUES ('$capacidad','$modelo','$descripcion','$id','$patente')";
$conn->consultarABD($consulta);
header("location: indexPrimario.php");

?>
