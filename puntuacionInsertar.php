<?php
  include_once "consultas_bd.php";

  $id = $_POST['param1'];
  $idViaje = $_POST['param2'];
  $idSesion = $_POST['param3'];
  $esDoble = $id / 10;
  $db=coneccion();
  $sql= "SELECT puntuacion
         FROM  usuarios
         WHERE usuarios.idUsuario=$id";
  $buscar = $db->query($sql) or die($db->error);
  $valor = $buscar->fetch_assoc();
  if(!is_float($esDoble)){
    $sql= "SELECT puntuacion
           FROM  usuarios
           WHERE usuarios.idUsuario=$esDoble";
    $buscar = $db->query($sql) or die($db->error);
    $valor = $buscar->fetch_assoc();
    $resultado = $valor['puntuacion']-1;
    $sql = "UPDATE usuarios SET puntuacion=$resultado WHERE idUsuario=$esDoble";
  }else{
    $sql= "SELECT puntuacion
           FROM  usuarios
           WHERE usuarios.idUsuario=$id";
    $buscar = $db->query($sql) or die($db->error);
    $valor = $buscar->fetch_assoc();
    $resultado = $valor['puntuacion']+1;
    $sql = "UPDATE usuarios SET puntuacion=$resultado WHERE idUsuario=$id";
  }
  $db->query($sql) or die($db->error);
  $sql= "INSERT INTO `usuario_puntua_usuario`(`idUsuario_puntuado`, `idUsuario`, `idViaje`) VALUES
  ('$id','$idSesion','$idViaje')";
  $db->query($sql) or die($db->error);

?>
