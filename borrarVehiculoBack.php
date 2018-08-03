<?php
session_start();
include "conexion.php";
$id = $_GET["idvehiculo"];
$conn= new conexion();
$consulta1 = "DELETE FROM vehiculo
              WHERE idvehiculo = '$id'";
$resultado1 = $conn->consultarABD($consulta1);

$idUser = $_SESSION['idUsuario'];
$consulta = "SELECT COUNT(*) AS cantidadVehiculos
            from usuarios INNER JOIN vehiculo on(usuarios.idUsuario = vehiculo.owner)
            WHERE usuarios.idUsuario = '$idUser'";
$resultado = $conn->consultarABD($consulta);
if (mysqli_num_rows($resultado) > 0) {
  while($row = mysqli_fetch_assoc($resultado)) {
      if($row["cantidadVehiculos"] != 0)
      {
        header("location: borrarVehiculoFront.php");
      }
      else{
        header("location: indexPrimario.php");
      //echo "cantidadVehiculos del usuario con id " .$idUser . " es: " . $row["cantidadVehiculos"]."<br>";
    }
  }
}
?>
