<?php
  session_start();
  $idUser = $_SESSION["idUsuario"];
  $idViaje = file_get_contents('php://input');
  $data = new stdClass();
  $data -> idUser = $idUser;
  $data -> idViaje = $idViaje;
  $json = json_encode($data);
  echo $json;
 ?>
