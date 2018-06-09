<?php

  function tarjeta($idviaje,$fechaYHora,$tipo,$duracion,$costo
                            ,$origen,$destino,$capacidad,$modelo
                            ,$descripcion_vehiculo,$estado_viaje,$disponible){
    /*
    Funcion que se encarga de imprimir cada Card
    */
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
    $fechaFinalizacion = new DateTime($fechaYHora);
    $fechaFinalizacion->add(new DateInterval('PT'.$duracion.'H'));
    //$asientosDisponibles aun no se encuentra en la BD
    $asientosDisponibles = 1;
    $asientos_ocupados = $capacidad - $asientosDisponibles;
    $precio_persona = $costo / $asientos_ocupados;
    $salida ="<li>
            <div class='card' style='width: 66rem;''>
              <div class='card-body'>
                <h5 class='card-title'>Viaje: ".$idviaje."</h5>
                <h6 class='card-subtitle mb-2 text-muted'>Origen: " .$origen. "</h6>
                <h6 class='card-subtitle mb-2 text-muted'>Destino: " .$destino. "</h6>
                <h6 class='card-subtitle mb-2 text-muted'>Fecha de Inicio:</h6>
                <h6 class='card-subtitle mb-2 text-muted'>" .$fechaYHora. "</h6>
                <h6 class='card-subtitle mb-2 text-muted'>Fecha de Finalizacion:</h6>
                <h6 class='card-subtitle mb-3 text-muted'>" .$fechaFinalizacion->format('Y-m-d H:i:s')."</h6>
                <h6 class='card-subtitle mb-2 text-muted'>Estado: " .$estado. "</h6>
                <h6 class='card-subtitle mb-2 text-muted'>Tipo: " .$tipo. "</h6>
                <h6 class='card-subtitle mb-2 text-muted'>Costo por Persona: " .round($precio_persona). "</h6>
                <h6 class='card-subtitle mb-2 text-muted'>Model del Vehiculo: " .$descripcion_vehiculo. "</h6>
                <h6 class='card-subtitle mb-2 text-muted'>asientosDisponibles: " .$asientosDisponibles. "</h6>";

                if($disponible == 1){
                  $salida .= "<button id='".$idviaje."' type='button' class='btn btn-success btn-md' name='button'>acceder</button>";
                }
              $salida .= "</div>
            </div>
          </li>
    ";

    return $salida;

  }

  function mostrar_tarjeta($consulta,$disponible){
    /*
    Funcion que "imprime" el diseño de las Cards de Boostrap y luego
    llama a la funcion tarjeta con los parametros de cada fila de la BD
    */

    echo "<div class='container'>";
    echo "<article id='main-col'>";
    echo "<h2 id='titulovr' class='page-title'>Viajes</h2>";
    echo "<ul id='services'>";
          while ($fila = $consulta->fetch_assoc()) {
            //print_r($fila);
            echo tarjeta($fila['idviajes'],$fila['fechaYHora'],$fila['tipo']
                        ,$fila['duracion'],$fila['costo'],$fila['nombre_origen']
                        ,$fila['nombre_destino'],$fila['capacidad']
                        ,$fila['modelo'],$fila['descripcion'],$fila['estado_viaje'],$disponible);
          }
    echo "</ul>";
    echo "</article>";
    echo "</div>";
  }
 ?>
