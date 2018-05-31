<?php
session_start();
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
$consulta= "INSERT INTO `viajes`(`fechaYHora`, `tipo`, `duracion`, `costo`, `localidad_origen`, `localidad_destino`, `idvehiculo`,`estado_viaje`) VALUES
('$combinedDT','$tipo','$duracion','$costo','$origen','$destino',4,0)";
$conn->consultarABD($consulta);
$consulta= "SELECT max(idviajes) as maximo
            FROM  viajes";
$resultado = $conn->consultarABD($consulta);
$row = mysqli_fetch_assoc($resultado);
//var_dump($row['maximo']);
//var_dump($_SESSION['idUsuario']);
$id= $_SESSION['idUsuario'];
$numerito = $row['maximo'];
$consulta  = "INSERT INTO `usuarios_has_viajes` (`usuarios_idUsuario`,`viajes_idviajes`) VALUES ('$id', '$numerito')";
$conn->consultarABD($consulta);
header("location: indexPrimario.php");

?>
