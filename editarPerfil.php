<?php
require 'conexion.php';
session_start();
$name = $_POST['name'];
$apellido = $_POST['apellido'];
$nacimiento = $_POST['birth'];
$descrip = $_POST['descripcion'];
$dir = $_POST['direccion'];
$id = $_SESSION['idUsuario'];
$conn= new conexion();
$sql = "UPDATE usuarios SET nombre = '$name', apellido = '$apellido', fechaNac = '$nacimiento',
        descripcion = '$descrip', direccion = '$dir' WHERE idUsuario = '$id'";
$result = $conn->consultarABD($sql);
header("location:verPerfil.php");
 ?>
