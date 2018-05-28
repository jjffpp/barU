<?php

  function coneccion(){
    $db = new mysqli('localhost','andresjulian','andres','mydb');
    if($db->connect_errno){
      echo "Fallo al conectar a la Base de Datos!!" . $db->connect_errno;
      return 0;
    }else{
      $db->set_charset('utf8');
      return $db;}
  }

  function consultaViajesRecomendados(){
    $db = coneccion();
    $sql = "SELECT *
            FROM viajes as v INNER JOIN localidades as l ON v.localidad_origen=l.idlocalidades
            ";
    $busca = $db->query($sql);
    if($busca->num_rows > 0){
      return $busca;
    }
  }

  function consulta_viaje_vehiculo($idviaje){
    $db = coneccion();
    $sql = "SELECT *
            FROM viajes as v INNER JOIN vehiculo as vv ON v.idvehiculo=vv.idvehiculo
            WHERE v.idviajes=$idviaje
            ";
    $busca = $db->query($sql);
    return $busca;
  }

  function numero_registrosViajesRecomendados(){
    $db = coneccion();
    $sql = "SELECT *
            FROM viajes as v INNER JOIN localidades as l ON v.localidad_origen=l.idlocalidades
            ";
    $busca = $db->query($sql);
    return $busca->num_rows;
  }

  function consultaViajesRecomendados_con_Limit($limit,$nroLotes){
    $db = coneccion();
    $sql = "SELECT *
            FROM viajes as v INNER JOIN localidades as l ON v.localidad_origen=l.idlocalidades
            LIMIT $limit, $nroLotes
            ";
    $busca = $db->query($sql);
    if($busca->num_rows > 0){
      return $busca;
    }
  }

?>
