<?php
function usuarioEstaSumadoAlViaje($idViaje,$idUsuario)
{
$capVehiculo= -1;
$conn= new conexion();

$consulta1 = "SELECT COUNT(*) as res FROM usuarios_has_viajes as usr WHERE usr.usuarios_idUsuario='$idUsuario' AND usr.viajes_idviajes= '$idViaje'";
$resulQuery1 = $conn->consultarABD($consulta1);

if (mysqli_num_rows($resulQuery1) > 0) {
  while($row = mysqli_fetch_assoc($resulQuery1)) {
      if($row["res"] > 0)
      {
        return true;
      }
      else{ return false;}
      //echo "cantidadVehiculos del usuario con id " .$idUser . " es: " . $row["cantidadVehiculos"]."<br>";
  }
}
}
 ?>
