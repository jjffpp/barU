<?php
require 'conexion.php';
session_start();
$contra = $_POST['psw'];
$contraActual = $_POST['pswactual'];
$id= $_SESSION['idUsuario'];
$conn= new conexion();
echo ".$contraActual.";
echo ".$contra.";
$consulta = "SELECT password as contrasena FROM usuarios WHERE idUsuario = '$id'";
$result1 = $conn->consultarABD($consulta);
if (mysqli_num_rows($result1) > 0) {
  $row1 = mysqli_fetch_assoc($result1);
  $pwd = $row1["contrasena"];
  if ($contraActual == $pwd){
    actualizarContrasena($consulta, $contra, $id, $conn);
  }else{
    header("location: cambiarContrasenaFormulario.php?cambio=false");
  }
}
function actualizarContrasena($consulta, $contra, $id, $conn){
  //actualiza la contraseña y retorna si el cambio es correcto
  $consulta1 = "UPDATE usuarios SET password = '$contra' WHERE idUsuario = '$id'";
  $conn->consultarABD($consulta1);
  $result = $conn->consultarABD($consulta);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $pwd = $row["contrasena"];
    if ($contra == $pwd){
      header("location: cambiarContrasenaFormulario.php?cambio=true");
    }else{
      header("location: cambiarContrasenaFormulario.php?cambio=false");
    }
  }
}
?>
