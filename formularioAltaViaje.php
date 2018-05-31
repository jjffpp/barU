<?php
require 'conexion.php';

$duracion = $_POST["duracion"];//int en la base de datos
$costo = $_POST["costo"];
$tipo = $_POST["tipo"];
$origen = $_POST["origen"];
$destino = $_POST["destino"];
$fecha = $_POST["fecha"];
$hora = $_POST["hora"];

//inserto en la base de datos
$combinedDT = date('Y-m-d H:i:s', strtotime("$fecha $hora"));
$conn= new conexion();
//la consulta esta con el vehiculo truncado en 4
$consulta= "INSERT INTO `viajes`(`fechaYHora`, `tipo`, `duracion`, `costo`, `localidad_origen`, `localidad_destino`, `idvehiculo`, `estado_viaje`) VALUES
('$combinedDT','$tipo','$duracion','$costo','$origen','$destino',4,0)";
$conn->consultarABD($consulta);
header("location: index_user_identificado.php");

?>
