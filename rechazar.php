<?php
  require 'conexion.php';
  $entrada = file_get_contents('php://input');

  $porciones = explode("-", $entrada);
  $idUser= $porciones[0];
  $idViaje= $porciones[1];
  error_log("$idUser");
  error_log("$idViaje");

   $conn= new conexion();
   //Estaria bueno que ademas de borrar notifique que lo rechazaron
   $consulta1 = "DELETE FROM usariospendientes_has_viajes WHERE usuarios_idUsuario = '$idUser' AND viajes_idviajes = '$idViaje'";
   $resulQuery1 = $conn->consultarABD($consulta1);
 ?>
