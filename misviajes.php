<?php

include_once "tarjeta.php";
include_once "../consultas_bd.php";

//CONSULTA A LA BD
$resultado = consultaViajesRecomendados();//esta es a modo de prueba

/*
idviaje,origen,destino,chofer,fechaInicio,fechaFinalizacion,estado,tipo,disponible
disponible(1/0) -> si hay un usuario loggeado; 0 si no hay un usuario loggeado.
La disponibilidad se establece por Cookie de sesion
*/
echo mostrar_tarjeta($resultado,1);

?>
