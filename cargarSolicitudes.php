<?php

function cargarSolicitudes()
{
    echo getMisUsuariosPendientes();

}
function getUserAct($anUser)
{
  $conn= new conexion();
  $consulta1 = "SELECT email FROM usuarios WHERE idUsuario='$anUser'";
  $resulQuery1 = $conn->consultarABD($consulta1);
  if (mysqli_num_rows($resulQuery1) > 0) {
    while($row = mysqli_fetch_assoc($resulQuery1)) {
        return $row["email"];
    }
  }
  return false;
}

function getMisUsuariosPendientes()
{
  include_once "conexion.php";
  $response = "";
  $idUser = $_SESSION["idUsuario"];
  $conn= new conexion();
  $consulta1 = "SELECT * FROM usariospendientes_has_viajes h WHERE h.viajes_idviajes IN(
    SELECT v.idviajes from viajes v WHERE v.idvehiculo IN(SELECT ve.idvehiculo from vehiculo ve WHERE ve.owner='$idUser'))";
  $resulQuery1 = $conn->consultarABD($consulta1);
  if (mysqli_num_rows($resulQuery1) > 0) {
    while($row = mysqli_fetch_assoc($resulQuery1)) {
        $idV = $row["viajes_idviajes"];
        $userAc1 = $row["usuarios_idUsuario"];
        $userAc = getUserAct($userAc1);
        $response .= "<nav class='navbar navbar-inverse mb-5'>
        <span class='navbar-brand texto ml-10 mt-10px height-auto  f-l'>El usuario <a class='celeste' href='verPerfil-api.php?idUser=$userAc1'>$userAc</a> quiere sumarse a tu viaje con ID <a class='celeste' href='detalleViaje-api.php?idViaje=$idV'>$idV</a></span>
        <button type='button' onclick=rechazar('$userAc1','$idV') class='f-r mr-5 btn btn-default navbar-btn'>Rechazar</button>
        <button type='button' onclick=aceptar('$userAc1','$idV') class='f-r mr-5 btn btn-default navbar-btn'>Aceptar</button>
      </nav>";
      // $row["usuarios_idUsuario"];
      // $row["viajes_idviajes"];
        // if($row["owner"] == $idUser)
        // {
        //   return true;
        // }
    }
  }
  return $response;
}
?>
