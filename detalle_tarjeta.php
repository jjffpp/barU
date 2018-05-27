<?php

function impresion_detalle_viaje($origen,$destino,$chofer,$fechaInicio
                          ,$fechaFinalizacion,$tipo,$asientosDisponibles
                          ,$capacidad,$precioPersona,$disponible){
  /*
  Funcion que imprime el detalle completo de cada viaje.
  */
  $salida = "
  <div class='container'>
    <article id='main-col'>
      <h2 id='titulovr' class='page-title'>Tu viaje seleccionado</h2>
      <ul id='services'>
        <li>
          <div class='card' style='width: 18rem;'>
            <div class='card-body'>
              <h5 class='card-title'>Origen: </h5>
              <h6 class='card-subtitle mb-2 text-muted'>".$origen."</h6>
              <h5 class='card-title'>Destino</h5>
              <h6 class='card-subtitle mb-2 text-muted'>".$destino."</h6>
              <h5 class='card-title'>Chofer</h5>
              <h6 class='card-subtitle mb-2 text-muted'>".$chofer."</h6>
              <h5 class='card-title'>Fecha de Inicio</h5>
              <h6 class='card-subtitle mb-2 text-muted'>".$fechaInicio."</h6>
              <h5 class='card-title'>Fecha de Finalizacion</h5>
              <h6 class='card-subtitle mb-2 text-muted'>".$fechaFinalizacion."</h6>
              <h5 class='card-title'>Tipo de Viaje</h5>
              <h6 class='card-subtitle mb-2 text-muted'>".$tipo."</h6>
              <h5 class='card-title'>Asientos Disponibles</h5>
              <h6 class='card-subtitle mb-2 text-muted'>".$asientosDisponibles."</h6>
              <h5 class='card-title'>Capacidad del Vehiculo</h5>
              <h6 class='card-subtitle mb-2 text-muted'>".$capacidad."</h6>
              <h5 class='card-title'>Precio Por Persona</h5>
              <h6 class='card-subtitle mb-2 text-muted'>".$precioPersona."</h6>
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
