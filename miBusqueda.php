<?php
//session_start();
include_once "tarjeta.php";
include_once "consultas_bd.php";

$lugarOrigen = $_POST["param1"];
$lugarDestino = $_POST["param2"];
$fechaInicio = $_POST["param3"];
$fechaFin = $_POST["param4"];

$combinedDT1 = date('Y-m-d', strtotime("$fechaInicio"));
if($fechaFin != ""){
  $combinedDT2 = date('Y-m-d', strtotime("$fechaFin"));
  $resultado = busqueda($lugarOrigen,$lugarDestino,$combinedDT1,$combinedDT2);
  if($resultado->num_rows > 0){
    echo mostrar_tarjeta($resultado,0);
  }else{
    echo "<h3 class='border text-center pt-3'>No se han encontrado viajes para las fechas solicitadas</h3>";
  }
}else{
  $resultado = busquedaSinFin($lugarOrigen,$lugarDestino,$combinedDT1);
  if($resultado->num_rows > 0){
    echo mostrar_tarjeta($resultado,0);
  }else{
    echo "<h3 class='border text-center pt-3'>No se han encontrado viajes para las fecha solicitada</h3>";
  }
}


?>
