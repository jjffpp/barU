<?php
require 'conexion.php';
$name = $_POST['name'];
$apellido = $_POST['apellido'];
$nacimiento = $_POST['birth'];
$email = $_POST['email'];
$contra = $_POST['psw'];
$desc = $_POST['descripcion'];
$dir = $_POST['direccion'];

$conn= new conexion();
$sql = "SELECT * FROM `usuarios` WHERE `email` = '$email'";
$result = $conn->consultarABD($sql);
if ($result->num_rows == 0) {
  $consulta= "INSERT INTO `usuarios`(`email`, `password`, `nombre`, `apellido`, `fechaNac`, `direccion`, `descripcion`, `estado`)
              VALUES ('$email','$contra','$name','$apellido','$nacimiento', '$dir', '$desc',0)";
  $conn->consultarABD($consulta);
  header("location:indexPrimario.php");
}else{
  header("location: index.php?valido=false");
}
 ?>
