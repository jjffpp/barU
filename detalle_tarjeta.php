<?php

function impresion_detalle_viaje($idviaje,$fechaYHora,$tipo,$duracion,$costo
                          ,$origen,$destino,$idvehiculo,$capacidad,$modelo
                          ,$descripcion_vehiculo, $dueño,$estado_viaje,$disponible){
  /*
  Funcion que imprime el detalle completo de cada viaje.
  */
  //formateo el tiempo para poder sumarle la duracion y obtener la fecha de finalizacion
  $fechaFinalizacion = new DateTime($fechaYHora);
  $fechaFinalizacion->add(new DateInterval('PT'.$duracion.'H'));
  //$asientosDisponibles aun no se encuentra en la BD
  $asientosDisponibles = 1;
  $asientos_ocupados = $capacidad - $asientosDisponibles;
  $precio_persona = $costo / $asientos_ocupados;
  switch ($estado_viaje) {
    case 0:
      $estado = "disponible";
      break;
    case 1:
      $estado = "en curso";
      break;
    case 2:
      $estado = "finalizado";
      break;
    case 3:
      $estado = "lleno";
      break;
  }
  $salida = "
  <div class='container'>
    <article id='main-col'>
      <h2 id='titulovr' class='page-title'>Mi viaje seleccionado</h2>
      <ul id='services'>
        <li>
          <div class='card' style='width: 66rem;'>
            <div class='card-body'>
              <h5 class='card-title'>Numero de viaje: </h5>
              <h6 class='card-subtitle mb-2 text-muted'>".$idviaje."</h6>
              <h5 class='card-title'>Origen: </h5>
              <h6 class='card-subtitle mb-2 text-muted'>".$origen."</h6>
              <h5 class='card-title'>Destino</h5>
              <h6 class='card-subtitle mb-2 text-muted'>".$destino."</h6>
              <h5 class='card-title'>Chofer</h5>
              <h6 class='card-subtitle mb-2 text-muted'>".$dueño."</h6>
              <h5 class='card-title'>Fecha de Inicio</h5>
              <h6 class='card-subtitle mb-2 text-muted'>".$fechaYHora."</h6>
              <h5 class='card-title'>Fecha de Finalizacion</h5>
              <h6 class='card-subtitle mb-2 text-muted'>".$fechaFinalizacion->format('Y-m-d H:i:s')."</h6>
              <h5 class='card-title'>Duracion del Viaje</h5>
              <h6 class='card-subtitle mb-2 text-muted'>".$duracion." hrs</h6>
              <h5 class='card-title'>Estado del viaje</h5>
              <h6 class='card-subtitle mb-2 text-muted'>".$estado."</h6>
              <h5 class='card-title'>Tipo de Viaje</h5>
              <h6 class='card-subtitle mb-2 text-muted'>".$tipo."</h6>
              <h5 class='card-title'>Modelo del Vehiculo</h5>
              <h6 class='card-subtitle mb-2 text-muted'>".$modelo."</h6>
              <h5 class='card-title'>Descripcion del Vehiculo</h5>
              <h6 class='card-subtitle mb-2 text-muted'>".$descripcion_vehiculo."</h6>
              <h5 class='card-title'>Asientos Disponibles</h5>
              <h6 class='card-subtitle mb-2 text-muted'>".$asientosDisponibles."</h6>
              <h5 class='card-title'>Capacidad del Vehiculo</h5>
              <h6 class='card-subtitle mb-2 text-muted'>".$capacidad."</h6>
              <h5 class='card-title'>Precio Por Persona</h5>
              <h6 class='card-subtitle mb-2 text-muted'>".round($precio_persona)."</h6>
              ";
  /*
  Si el viaje es activo para el usuario se visualiza el boton para poder darse de baja
  */
  if($disponible == 1){
    $salida .= "<button id='bajaviaje' type='button' class='btn btn-warning btn-md' name='button'>Darse de baja</button>";
  }
  $salida .= "
          </div>
        </div>
      </li>
    </ul>
  </article>
  </div> ";

  return $salida;

}

?>
