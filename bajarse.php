<?php
  session_start();
  require 'conexion.php';
  $idUser = $_SESSION["idUsuario"];
  $idViaje = file_get_contents('php://input');
  $conn= new conexion();
  $consulta1 = "DELETE FROM usuarios_has_viajes WHERE usuarios_idUsuario='$idUser' AND viajes_idviajes='$idViaje'";
  $resulQuery1 = $conn->consultarABD($consulta1);
 ?>
