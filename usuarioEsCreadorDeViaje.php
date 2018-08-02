<?php
function usuarioEsCreadorDeViaje($idviaje,$idUser)
{
  $conn= new conexion();
  $consulta1 = "SELECT owner from vehiculo where idvehiculo=(SELECT idvehiculo FROM viajes WHERE idviajes='$idviaje')";
  $resulQuery1 = $conn->consultarABD($consulta1);
  if (mysqli_num_rows($resulQuery1) > 0) {
    while($row = mysqli_fetch_assoc($resulQuery1)) {
        if($row["owner"] == $idUser)
        {
          return true;
        }
    }
  }
  return false;
}


 ?>
