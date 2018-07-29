<?php
require 'conexion.php';

function consultarAsientosDisponibles($idViaje){


//$idViaje = $_POST["idViaje"];
$capVehiculo= -1;
$conn= new conexion();

$consulta1 = "SELECT COUNT(usuarios_idUsuario) AS cantidadSumados FROM usuarios_has_viajes
              WHERE usuarios_has_viajes.viajes_idviajes='$idViaje'";
$resulQuery1 = $conn->consultarABD($consulta1);

$consulta2 = "SELECT vehiculo.capacidad AS capacidad from
                  (SELECT viajes.idvehiculo AS eze
                          FROM viajes INNER JOIN usuarios_has_viajes on
                          (usuarios_has_viajes.viajes_idviajes = viajes.idviajes) WHERE viajes.idviajes = '$idViaje')
                      as eze2 INNER JOIN vehiculo on (vehiculo.idvehiculo = eze2.eze )";
$resulQuery2 = $conn->consultarABD($consulta2);

if (mysqli_num_rows($resulQuery2) > 0) {
  while($row = mysqli_fetch_assoc($resulQuery2)) {
    $capVehiculo = $row["capacidad"];
  }
}
if (mysqli_num_rows($resulQuery1) > 0) {
  while($row = mysqli_fetch_assoc($resulQuery1)) {
      $resta =  $capVehiculo - $row["cantidadSumados"];
      return $resta;
      //echo "cantidadVehiculos del usuario con id " .$idUser . " es: " . $row["cantidadVehiculos"]."<br>";
  }
}
}
 ?>
