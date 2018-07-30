<?php

function elViajeEstaEnProgreso($idviaje)
{
  if(!haTerminadoElViaje($idviaje)){
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $hoy = date('Y-m-d H:i:s');
    $formato = 'Y-m-d H:i:s';
    $conn= new conexion();
    $consulta1 = "SELECT fechaYHora FROM viajes WHERE idviajes='$idviaje'";
    $resulQuery1 = $conn->consultarABD($consulta1);
    if (mysqli_num_rows($resulQuery1) > 0) {
      while($row = mysqli_fetch_assoc($resulQuery1)) {
          $fechaDb = DateTime::createFromFormat($formato, $row["fechaYHora"]);
          if($fechaDb->format('Y-m-d H:i:s')<$hoy){
            return true;
          }
      }
    }

  }
  return false;
}

function haTerminadoElViaje($idviaje)
{
  $formato = 'Y-m-d H:i:s';
  $fechaDb = date('Y-m-d H:i:s');
  date_default_timezone_set('America/Argentina/Buenos_Aires');
  $hoy = date('Y-m-d H:i:s');
  error_log($hoy);
  $conn= new conexion();
  $duracion = 0;
  $consulta1 = "SELECT fechaYHora FROM viajes WHERE idviajes='$idviaje'";
  $resulQuery1 = $conn->consultarABD($consulta1);

  if (mysqli_num_rows($resulQuery1) > 0) {
    while($row = mysqli_fetch_assoc($resulQuery1)) {
        $fechaDb = DateTime::createFromFormat($formato, $row["fechaYHora"]);
    }
  }

  $consulta2 = "SELECT duracion FROM viajes WHERE idviajes='$idviaje'";
  $resulQuery2 = $conn->consultarABD($consulta2);
  if (mysqli_num_rows($resulQuery2) > 0) {
    while($row = mysqli_fetch_assoc($resulQuery2)) {
      $duracion = $row["duracion"];
      error_log($fechaDb->format('Y-m-d H:i:s'));
      $horaConDuracionDeViaje = $fechaDb->add(new DateInterval("PT{$duracion}H"));
      error_log($horaConDuracionDeViaje->format('Y-m-d H:i:s'));
      if($horaConDuracionDeViaje->format('Y-m-d H:i:s')<$hoy){
        return true;
      }
    }
  }
    return false;
}
?>
