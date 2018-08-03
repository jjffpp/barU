<?php
include "conexion.php";
$id = $_GET["idvehiculo"];
$conn= new conexion();
$consulta1 = "DELETE FROM vehiculo
              WHERE idvehiculo = '$id'";
$resultado1 = $conn->consultarABD($consulta1);
header("location: borrarVehiculoFront.php");  
?>
