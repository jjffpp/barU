<?php
$name = $_POST['name'];
$apellido = $_POST['apellido'];
$nacimiento = $_POST['birth'];
$email = $_POST['email'];
$contra = $_POST['psw'];
$desc = $_POST['descripcion'];
$dir = $_POST['direccion'];


require 'conexion.php';

$conn= new conexion();

$consulta= "INSERT INTO `usuarios`(`email`, `password`, `nombre`, `apellido`, `fechaNac`, `direccion`, `descripcion`, `estado`) VALUES
('$email','$contra','$name','$apellido','$nacimiento', '$dir', '$desc',0)";
$conn->consultarABD($consulta);

header("location:indexPrimario.php");
 ?>
