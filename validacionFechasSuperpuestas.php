<?php
require 'conexion.php';
session_start();
$fecha = $_POST["fecha"];
$hora = $_POST["hora"];
$duracion = $_POST["duracion"];
//$id= $_SESSION['idUsuario'];

$horaBusqueda = "00:00:00";
$fechaMas2 = date('Y-m-d', strtotime($fecha."+ 2 days"));
$fechaMenos2 = date('Y-m-d', strtotime($fecha."- 2 days"));
$combinedDTmas2 = date('Y-m-d H:i:s', strtotime("$fechaMas2 $horaBusqueda"));
$combinedDTmenos2 = date('Y-m-d H:i:s', strtotime("$fechaMenos2 $horaBusqueda"));

$conn= new conexion();
//devuelve los viajes(fecha hora y duracion)  del usuario logeado
$consulta1 = "SELECT `viajes`.`fechaYHora` as fechahora, `viajes`.`duracion` as duracion FROM `vehiculo`
              INNER JOIN `viajes` on (`vehiculo`.`idvehiculo` = `viajes`.`idvehiculo`)
              where `vehiculo`.`owner` = 1";//corregir!!
$result = $conn->consultarABD($consulta1);
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
      $inicio = $row["fechahora"];
      $duracion = $row["duracion"];
      $fin = date('Y-m-d H:i:s', strtotime($inicio."+ $duracion hours" ));
      $fechahora = date('Y-m-d H:i:s', strtotime("$fecha $hora"));
      if(($fechahora >= $inicio) && ($fechahora <= $fin)) {
            echo "no se puede crear el viaje";
      } else {
            echo "se puede crear el viaje";
      }
  }
}else{
  echo "es 0 el numeros de filas del arreglo de consulta";
}
?>
