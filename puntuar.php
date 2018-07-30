<?php
include "navbar.php";
include_once "consultas_bd.php";

  $idViaje = $_POST['param1'];
  $idSesion = $_SESSION['idUsuario'];
  $valor = '<div style="margin-top:50px">
    <div class="container">
      <div class="row">';

  $resultado = consultarPasajerosDelViaje($idViaje);

  while ($fila = $resultado->fetch_assoc()) {

      if($_SESSION["idUsuario"] != $fila['id_user']){
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
  $valor .= "</div></div></div>";
  //var_dump($valor);
  echo $valor;
  ?>
