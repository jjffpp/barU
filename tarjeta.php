<?php

  function tarjeta($idviaje,$origen,$destino,$chofer,$fechaInicio,$duracion,$estado,$tipo,$disponible){
    /*
    Funcion que se encarga de imprimir cada Card
    */
    switch ($estado) {
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
    $fechaFinalizacion = new DateTime($fechaInicio);
    $fechaFinalizacion->add(new DateInterval('PT'.$duracion.'H'));
    $salida ="<li>
            <div class='card' style='width: 18rem;''>
              <div class='card-body'>
                <h5 class='card-title'>Viaje: ".$idviaje."</h5>
                <h6 class='card-subtitle mb-2 text-muted'>Origen: " .$origen. "</h6>
                <h6 class='card-subtitle mb-2 text-muted'>Destino: " .$destino. "</h6>
                <h6 class='card-subtitle mb-2 text-muted'>Chofer: " .$chofer. "</h6>
                <h6 class='card-subtitle mb-2 text-muted'>Fecha de Inicio:</h6>
                <h6 class='card-subtitle mb-2 text-muted'>" .$fechaInicio. "</h6>
                <h6 class='card-subtitle mb-2 text-muted'>Fecha de Finalizacion:</h6>
                <h6 class='card-subtitle mb-3 text-muted'>" .$fechaFinalizacion->format('Y-m-d H:i:s')."</h6>
                <h6 class='card-subtitle mb-2 text-muted'>Estado: " .$estado. "</h6>
                <h6 class='card-subtitle mb-2 text-muted'>Tipo: " .$tipo. "</h6>";
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
    echo "<h1 id='titulovr' class='page-title'>Viajes Recomendados</h1>";
    echo "<div class='container'>";
    echo "<article id='main-col'>";
    echo "<ul id='services'>";
          while ($fila = $consulta->fetch_assoc()) {
            //print_r($fila);
            echo tarjeta($fila['idviajes'],$fila['nombre_origen'],$fila['nombre_destino']
                        ,$fila['nombre_user'],$fila['fechaYHora'],$fila['duracion']
                        ,$fila['estado_viaje'],$fila['tipo'],$disponible);
          }
    echo "</ul>";
    echo "</article>";
    echo "</div>";
  }
 ?>
