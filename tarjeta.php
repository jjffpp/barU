<?php
  session_start();
  //include_once "consultarSiTieneAsientosDisponibles.php";
  include_once "usuarioEstaSumadoAlViaje.php";
  include_once "usuarioEsCreadorDeViaje.php";
  include_once "consultarAsientosDisponiblesDeUnViaje.php";
  include_once "haTerminadoElViaje.php";
  function tarjeta($idviaje,$fechaYHora,$tipo,$duracion,$costo
                            ,$origen,$destino,$capacidad,$modelo
                            ,$descripcion_vehiculo,$estado_viaje,$patente,$disponible){
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
    $asientosDisponibles = consultarAsientosDisponibles($idviaje);
    $asientos_ocupados = $capacidad - $asientosDisponibles;
    $precio_persona = $costo / $asientos_ocupados;
    //<u><h4 class='card-subtitle mb-2'>Costo por Persona:</u> $" .round($precio_persona). "</h6>
    //<u><h4 class='card-subtitle mb-2'>Estado:</u> " .$estado. "</h6>
    $salida ="<li>
            <div class='card' style='width: 66rem;''>
              <div class='card-body'>

                <h3 class='card-title'>Numero Unico de Viaje: "."<a href='#' onClick='cargar($idviaje)'>$idviaje</a>"."</h5>
                <u><h4 class='card-subtitle mb-2'>Origen:</u> " .$origen. "</h6>
                <u><h4 class='card-subtitle mb-2'>Destino:</u> " .$destino. "</h6>
                <u><h4 class='card-subtitle mb-2'>Fecha de Inicio:</u> " .$fechaYHora. "</h6>
                <u><h4 class='card-subtitle mb-2'>Fecha de Finalizacion:</u> " .$fechaFinalizacion->format('Y-m-d H:i:s')."</h6>

                <u><h4 class='card-subtitle mb-2'>Tipo:</u> " .$tipo. "</h6>

                <u><h4 class='card-subtitle mb-2'>Modelo del Vehiculo:</u> " .$descripcion_vehiculo. "</h6>
                <u><h4 class='card-subtitle mb-2'>Patente del Vehiculo:</u> " .$patente. "</h6>
                <u><h4 class='card-subtitle mb-2'>Asientos Disponibles:</u>". $asientosDisponibles."</h6>";

                if(isset($_SESSION["idUsuario"]) && elViajeEstaEnProgreso($idviaje)){
                  $salida .= "<button id='".$idviaje."'type='button' class='btn-md buttonYellow' name='button'>Viaje En Progreso</button>";
                }
                else{

                if( (isset($_SESSION["idUsuario"])))
                {
                  if($asientosDisponibles > 0 && !usuarioEstaSumadoAlViaje($idviaje,$_SESSION["idUsuario"]) && !usuarioEstaEsperandoConfirmacion($idviaje,$_SESSION["idUsuario"])){
                      $salida .= "<button id='".$idviaje."' type='button' class='btn btn-success buttonGreen btn-md sumarse' name='button'>Sumarse</button>";
                  }
                  if(usuarioEstaEsperandoConfirmacion($idviaje,$_SESSION["idUsuario"])){
                    $salida .= "<button id='".$idviaje."' type='button' class='btn-md buttonLight' name='button'>Esperando Confirmacion</button>";
                  }

                if((isset($_SESSION["idUsuario"])) && haTerminadoElViaje($idviaje) && usuarioEstaSumadoAlViaje($idviaje,$_SESSION["idUsuario"]) && (haPuntuadoATodos($idviaje,$_SESSION['idUsuario'])==-10))
                {
                    $salida .= "<button id='".$idviaje."' onClick='puntuarViaje(this.id)' type='button' class='btn-md buttonBlue' name='button'>Viaje Concluido - Puntuar</button>";
                }
                if((isset($_SESSION["idUsuario"])) && haTerminadoElViaje($idviaje) && usuarioEstaSumadoAlViaje($idviaje,$_SESSION["idUsuario"]) && (haPuntuadoATodos($idviaje,$_SESSION['idUsuario'])==1))
                {
                    $salida .= "<button id='".$idviaje."'  class='btn-md buttonGreen' name='button'>Viaje Puntuado</button>";
                }
                if((isset($_SESSION["idUsuario"])) && haTerminadoElViaje($idviaje) && usuarioEstaSumadoAlViaje($idviaje,$_SESSION["idUsuario"]) && (haPuntuadoATodos($idviaje,$_SESSION['idUsuario'])==10))
                {
                    $salida .= "<button id='".$idviaje."'  class='btn-md buttonGold' name='button'>Haz viajado solo</button>";
                }
                if((isset($_SESSION["idUsuario"])) && !haTerminadoElViaje($idviaje) && !usuarioEsCreadorDeViaje($idviaje,$_SESSION["idUsuario"]) && usuarioEstaSumadoAlViaje($idviaje,$_SESSION["idUsuario"]))
                {
                    $salida .= "<button id='".$idviaje."' onClick='bajarseDelViaje(this.id)' type='button' class='btn-md buttonRed' name='button'>Bajarse Del Viaje</button>";
                }

                    if((isset($_SESSION["idUsuario"]) && !haTerminadoElViaje($idviaje) && usuarioEsCreadorDeViaje($idviaje,$_SESSION["idUsuario"]))){
                        $salida .= "<button id='".$idviaje."' type='button' onClick='eliminarViaje(this.id)' class='buttonRed btn-md' name='button'>Eliminar Viaje</button>";

                  }
                }

              }
              // if($asientosDisponibles==0 && isset($_SESSION["idUsuario"]) && haTerminadoElViaje($idviaje) && usuarioEstaSumadoAlViaje($idviaje,$_SESSION["idUsuario"]) && !(haPuntuadoATodos($idviaje,$_SESSION['idUsuario'])==1))
              // {
              //     $salida .= "<button id='".$idviaje."' onClick='puntuarViaje(this.id)' type='button' class='btn-md buttonBlue' name='button'>Viaje Concluido - Puntuar</button>";
              // }
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
    echo "<script type='text/javascript' src='puntuarViaje.js'></script>";
    echo "<script type='text/javascript' src='bajarUser.js'></script>";
    echo "<div class='container'>";
    echo "<article id='main-col' class='no-width'>";
    echo "<h2 id='titulovr' class='page-title margin-bot-20 margin-top-30'>Viajes</h2>";
    echo "<ul id='services' class='no-padding-left'>";
    while ($fila = $consulta->fetch_assoc()) {
      //print_r($fila);
      $temp = $fila['idviajes'];

      echo tarjeta($fila['idviajes'],$fila['fechaYHora'],$fila['tipo']
                  ,$fila['duracion'],$fila['costo'],$fila['nombre_origen']
                  ,$fila['nombre_destino'],$fila['capacidad']
                  ,$fila['modelo'],$fila['descripcion'],$fila['estado_viaje'],$fila['patente'],$disponible);
    }
    echo "</ul>";
    echo "</article>";
    echo "</div>";
  }
  echo "<script>function cargar(idViaje){ window.location.href = 'detalleViaje-api.php?idViaje=' + idViaje;}</script>";
 ?>
