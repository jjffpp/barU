<?php
include "navbar.php";
include_once "consultas_bd.php";

  $idViaje = $_POST['param1'];
  $idSesion = $_SESSION['idUsuario'];
  $valor = '<div style="margin-top:50px">
    <div class="container">
      <div class="row">';

  $resultado = consultarPasajerosDelViaje($idViaje);
  /*$votados = consultarVotados($idViaje);
  $r = array();
  while($fila3 = $resultado->fetch_assoc()){
    $fila2 = $votados->fetch_assoc();
    if($fila3['id_user'] != $fila2['idUsuario']){
      array_push($r, $fila3);
    }
  }
  var_dump($r);*/
  function existe($user,$idViaje,$idSesion){
    $conn = consultarVotados($idViaje,$user,$idSesion);
    if($conn->num_rows > 0){
      return false;
    }else{
      return true;
    }
  }
  while ($fila = $resultado->fetch_assoc()) {

      if($_SESSION["idUsuario"] != $fila['id_user'] && existe($fila['id_user'],$idViaje,$idSesion)){
        print_r($fila['id_user']);
        $valor .= "
          <div class='col-lg-12 columna ".$fila['id_user']."'>
            <div class='row'>
              <div class='col-lg-5 bg-warning border border-danger text-center margen-andres'>
                <label class='m-5'>" . $fila['nombre_user'] ." ". $fila['apellido_user'] . "</label>
              </div>
              <div class='col-lg-2'>

              </div>
              <div class='col-lg-2 text-center'>
                <button id='". $fila['id_user'] ."' onclick='comprobacionPositiva(this,$idViaje,$idSesion)' type='button' class='btn btn-success buttonGreen btn-sm positivo' name='button'>+</button>
              </div>
              <div class='col-lg-2 text-center'>
                <button id='". $fila['id_user']*10 ."' onclick='comprobacionNegativa(this,$idViaje,$idSesion)' type='button' class='btn btn-danger buttonRed btn-sm negativo' name='button'>-</button>
              </div>
            </div>
          </div>
          <div class='col-lg-12' style='margin:10px;''></div>
      ";
      }
  }
  $valor .= "<div class='col-lg-12 col-md-12 col-sm-12 hidden finalizado'>
                <div class='row'>
                  <div class='col-lg-3 col-md-3 col-sm-3'></div>
                    <div class='col-lg-6 bg-success text-center margen-andres'>
                      <label class='m-5'>Puntuacion Exitosa</label>
                    </div>
                  <div class='col-lg-3 col-md-3 col-sm-3'></div>
                </div>
            </div>";
  $valor .= "</div></div></div>";
  //var_dump($valor);
  echo $valor;
  ?>
