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

  function busqueda($origen,$destino,$fecha,$fechaFin){
    $db = coneccion();

    $sql = "SELECT v.idviajes,v.fechaYHora,v.tipo, v.duracion,v.costo, origen.nombre AS nombre_origen,destino.nombre AS nombre_destino,vehiculo.capacidad
                  ,vehiculo.modelo,vehiculo.descripcion,v.estado_viaje
            FROM viajes as v INNER JOIN localidades as origen on v.localidad_origen = origen.idlocalidades
            INNER JOIN localidades as destino on v.localidad_destino=destino.idlocalidades
            INNER JOIN vehiculo ON vehiculo.idvehiculo = v.idvehiculo
            WHERE (DATE(v.fechaYHora) BETWEEN '$fecha' AND '$fechaFin') AND origen.nombre='$origen' AND destino.nombre='$destino'
            ORDER BY v.fechaYHora ASC
            ";
    $buscar = $db->query($sql) or die($db->error);
    return $buscar;
  }
  function busquedaSinFin($origen,$destino,$fecha){
    $db = coneccion();

    $sql = "SELECT v.idviajes,v.fechaYHora,v.tipo, v.duracion,v.costo, origen.nombre AS nombre_origen,destino.nombre AS nombre_destino,vehiculo.capacidad
                  ,vehiculo.modelo,vehiculo.descripcion,v.estado_viaje
            FROM viajes as v INNER JOIN localidades as origen on v.localidad_origen = origen.idlocalidades
            INNER JOIN localidades as destino on v.localidad_destino=destino.idlocalidades
            INNER JOIN vehiculo ON vehiculo.idvehiculo = v.idvehiculo
            WHERE DATE(v.fechaYHora)='$fecha' AND origen.nombre='$origen' AND destino.nombre='$destino'
            ORDER BY v.fechaYHora ASC
            ";
    $buscar = $db->query($sql) or die($db->error);
    return $buscar;
  }

  function usuarioEnSemana($idViaje,$idUsuario){
    $db = coneccion();

    $sql = "SELECT *
            FROM usuarios_has_viajes as usr
            WHERE usr.usuarios_idUsuario='$idUsuario' AND usr.viajes_idviajes= '$idViaje'";
    $buscar = $db->query($sql);
    return $buscar;
  }

  function usuarioEnEspera($idViaje,$idUsuario){
    $db = coneccion();

    $sql = "SELECT *
            FROM usariospendientes_has_viajes as usr
            WHERE usr.usuarios_idUsuario='$idUsuario' AND usr.viajes_idviajes= '$idViaje'";
    $buscar = $db->query($sql);
    return $buscar;
  }

  function listarTodosLosViajes(){
    $db = coneccion();


    $sql = "SELECT v.idviajes,v.fechaYHora,v.tipo, v.duracion,v.costo, origen.nombre AS nombre_origen,destino.nombre AS nombre_destino,vehiculo.capacidad
                  ,vehiculo.modelo,vehiculo.descripcion,v.estado_viaje
            FROM viajes as v INNER JOIN localidades as origen on v.localidad_origen = origen.idlocalidades
            INNER JOIN localidades as destino on v.localidad_destino=destino.idlocalidades
            INNER JOIN vehiculo ON vehiculo.idvehiculo = v.idvehiculo
            WHERE v.fechaYHora >= CURDATE()
            ORDER BY v.fechaYHora ASC
            ";
    $buscar = $db->query($sql);
    return $buscar;
  }

  function consultarPasajerosDelViaje($idViaje){
    $db = coneccion();

    $sql = "SELECT v.idviajes,l.nombre AS nombre_origen,us.apellido AS apellido_user,us.nombre AS nombre_user, us.idUsuario as id_user
            FROM usuarios as u INNER JOIN usuarios_has_viajes as uhv ON uhv.usuarios_idUsuario = u.idUsuario
            INNER JOIN viajes as v ON v.idviajes = uhv.viajes_idviajes
            INNER JOIN vehiculo as vv ON v.idvehiculo=vv.idvehiculo
            INNER JOIN localidades as ld ON ld.idlocalidades=v.localidad_destino
            INNER JOIN localidades as l ON v.localidad_origen=l.idlocalidades
            INNER JOIN usuarios as us ON us.idUsuario=uhv.usuarios_idUsuario
            WHERE uhv.viajes_idviajes=$idViaje AND us.idUsuario
            ";
    $buscar = $db->query($sql);
    return $buscar;
  }

  function consultarVotados($idViaje,$idUsuario,$idSesion){
    $db = coneccion();

    $sql = "SELECT * FROM usuario_puntua_usuario as upu WHERE upu.idViaje='$idViaje' AND upu.idUsuario_puntuado='$idUsuario' AND upu.idUsuario='$idSesion'";
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
