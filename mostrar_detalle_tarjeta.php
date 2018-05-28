<?php

  include_once "detalle_tarjeta.php";
  include_once "../consultas_bd.php";

  //idviaje para realizar la consulta completa
  $idviaje = $_POST['param1'];

  //consulta a la BD con idviaje
  $resultado_consullta = consulta_viaje_vehiculo($idviaje);
  //fetch_assoc en una sola fila
  $valor = $resultado_consullta->fetch_assoc();

  //en caso que el usuario esté loggeado se accede
  if(isset($_COOKIE['user'])){
    /*
    origen,destino,chofer,fechaInicio,fechaFinalizacion,tipo,asientosDisponibles,capacidad,precioPersona,disponible
    disponible(1/0) -> 1 el viaje es acivo para el usuario; 0 el viaje no es activo.
    La disponibilidad es establece por una consulta a la BD
    */
    echo impresion_detalle_viaje($valor['idviajes'],$valor['fechaYHora'],$valor['tipo'],
      $valor['duracion'],$valor['costo'],$valor['localidad_origen'],
      $valor['localidad_destino'],$valor['idvehiculo'],
      $valor['capacidad'],$valor['modelo'],$valor['descripcion'],$valor['owner'],1);

  }

?>
