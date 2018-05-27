<?php

  include_once "detalle_tarjeta.php";

  //idviaje para realizar la consulta completa
  $para = $_GET['param1'];

  //Acá se encontrará la consulta a la BD de idViaje con Vehiculo
  
  //en caso que el usuario esté loggeado se accede
  if(isset($_COOKIE['user'])){
    /*
    origen,destino,chofer,fechaInicio,fechaFinalizacion,tipo,asientosDisponibles,capacidad,precioPersona,disponible
    disponible(1/0) -> 1 el viaje es acivo para el usuario; 0 el viaje no es activo.
    La disponibilidad es establece por una consulta a la BD
    */
    echo impresion_detalle_viaje('La Plata','Ensenada','Andres','1234','1234','aaaa',$para,4,10,1);
  }

?>
