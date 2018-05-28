<?php
require "conexion.php";
session_set_cookie_params(30,"/");
session_start();
$tbl_name = "usuarios";
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "SELECT * FROM $tbl_name WHERE email = '$username'";
$conn= new conexion();
$result = $conn->consultarABD($sql);

if ($result->num_rows > 0) {
  $row = mysqli_fetch_assoc($result);
  if ($password == $row['password']) {
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['idUsuario'] =  $row['idUsuario'];
//redirecciona a la pagina principal
    echo "Bienvenido! " . $row['email'];
  }else{
    header("location: login.php?valido=false");
  }
  }else{
    header("location: login.php?valido=false");
  }
?>
