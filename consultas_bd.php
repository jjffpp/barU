<?php

  function coneccion(){
    $db = new mysqli('localhost','root','','barudb');
    if($db->connect_errno){
      echo "Fallo al conectar a la Base de Datos!!" . $db->connect_errno;
      return 0;
    }else{
      $db->set_charset('utf8');
      return $db;}
  }

  function nombre_user($iduser){
    $db = coneccion();

    $sql = "SELECT u.nombre
            FROM usuarios as u
            WHERE idUsuario=$iduser
            ";
    $buscar = $db->query($sql);
    $valor = $buscar->fetch_assoc();
    return $valor;
  }

  function listarTodosLosViajes(){
    $db = coneccion();

    $sql = "SELECT v.idviajes,l.nombre AS nombre_origen,ld.nombre AS nombre_destino,v.fechaYHora,v.duracion,v.estado_viaje,v.tipo,
                   vv.modelo,vv.descripcion,vv.capacidad,v.costo
            FROM usuarios as u INNER JOIN usuarios_has_viajes as uhv ON uhv.usuarios_idUsuario = u.idUsuario
            INNER JOIN viajes as v ON v.idviajes = uhv.viajes_idviajes
            INNER JOIN vehiculo as vv ON v.idvehiculo=vv.idvehiculo
            INNER JOIN localidades as ld ON ld.idlocalidades=v.localidad_destino
            INNER JOIN localidades as l ON v.localidad_origen=l.idlocalidades
            WHERE v.fechaYHora >= CURDATE()
            ORDER BY v.fechaYHora ASC
            ";
    $buscar = $db->query($sql);
    return $buscar;
  }

  function consultarMisViajes($idUser){
    $db = coneccion();

    $sql = "SELECT v.idviajes,l.nombre AS nombre_origen,ld.nombre AS nombre_destino,us.nombre AS nombre_user,v.fechaYHora,v.duracion,v.estado_viaje,v.tipo,
                   vv.modelo,vv.descripcion,vv.capacidad,v.costo
            FROM usuarios as u INNER JOIN usuarios_has_viajes as uhv ON uhv.usuarios_idUsuario = u.idUsuario
            INNER JOIN viajes as v ON v.idviajes = uhv.viajes_idviajes
            INNER JOIN vehiculo as vv ON v.idvehiculo=vv.idvehiculo
            INNER JOIN localidades as ld ON ld.idlocalidades=v.localidad_destino
            INNER JOIN localidades as l ON v.localidad_origen=l.idlocalidades
            INNER JOIN usuarios as us ON us.idUsuario=vv.owner
            WHERE u.idUsuario=$idUser
            ";
    $buscar = $db->query($sql);
    return $buscar;

  }

  function consultaViajesRecomendados(){
    $db = coneccion();
    $sql = "SELECT v.idviajes,l.nombre AS nombre_origen,ld.nombre AS nombre_destino,u.nombre AS nombre_user,v.fechaYHora,v.duracion,v.estado_viaje,v.tipo
            FROM viajes as v INNER JOIN localidades as l ON v.localidad_origen=l.idlocalidades
            INNER JOIN vehiculo as vv ON v.idvehiculo=vv.idvehiculo
            INNER JOIN usuarios as u ON u.idUsuario=vv.owner
            INNER JOIN localidades as ld ON ld.idlocalidades=v.localidad_destino
            ";
    $busca = $db->query($sql);
    if($busca->num_rows > 0){
      return $busca;
    }
    else{
      echo "CERO filas";
    }
  }

  function consulta_viaje_vehiculo($idviaje){
    $db = coneccion();

    $sql = "SELECT v.idviajes,l.nombre AS nombre_origen,ld.nombre AS nombre_destino,u.nombre AS nombre_user,v.fechaYHora,v.duracion,v.estado_viaje,v.tipo,
                   vv.modelo,vv.descripcion,vv.capacidad,v.costo
            FROM viajes as v INNER JOIN localidades as l ON v.localidad_origen=l.idlocalidades
            INNER JOIN vehiculo as vv ON v.idvehiculo=vv.idvehiculo
            INNER JOIN usuarios as u ON u.idUsuario=vv.owner
            INNER JOIN localidades as ld ON ld.idlocalidades=v.localidad_destino
            WHERE v.idviajes=$idviaje
            ";
    $buscar = $db->query($sql);

    return $buscar;
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
