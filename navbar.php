<?php
include "consultas_bd.php";

session_start();

function generarJS(){
  if(isset($_SESSION["idUsuario"]))
    echo "<script type='text/javascript' src='f2.js'></script>";
}

function generarNavbar()
{
if(isset($_SESSION["idUsuario"])){

  $nombre = nombre_user($_SESSION["idUsuario"]);
  echo "
  <div class='example3'>
    <nav class='navbar navbar-inverse navbar-fixed-top'>
      <div class='container'>
        <div class='navbar-header'>
          <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#navbar3'>
            <span class='sr-only'>Toggle navigation</span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
          </button>
          <a class='navbar-brand' href='indexPrimario.php'><img src='aventonnegro.png'></a>
        </div>
        <div class='navbar-collapse collapse'>
          <ul id='ulnav' class='nav navbar-nav navbar-right'>
            <li><a href='index_mis_viajes.php'><span class='glyphicon glyphicon-briefcase'></span> Mis Viajes</a></li>
            <li><a href='#' onclick='comprobarCondiciones()'><span class='glyphicon glyphicon-map-marker'></span> Crear Viaje</a></li>
            <li><a href='#'><span class='glyphicon glyphicon-search'></span> Buscar Viajes</a></li>
            <li><a href='formularioAltaVehiculo.php'><span class='glyphicon glyphicon-road'></span> Registrar Vehiculo</a></li>
            <li class='dropdown'>
              <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'><span class='glyphicon glyphicon-user'></span> ".$nombre['nombre']."<span class='caret'></span></a>
              <ul class='dropdown-menu' role='menu'>
                <li><a href='#'>Ver Perfil</a></li>
                <li><a href='cerrar-sesion.php'>Cerrar Sesion</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <!--/.nav-collapse -->
      <!--/.container-fluid -->
    </nav>
  </div>
  ";
}
else{
  echo "
<div class='example3'>
  <nav class='navbar navbar-inverse navbar-fixed-top'>
    <div class='container'>
      <div class='navbar-header'>
        <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#navbar3'>
          <span class='sr-only'>Toggle navigation</span>
          <span class='icon-bar'></span>
          <span class='icon-bar'></span>
          <span class='icon-bar'></span>
        </button>
        <a class='navbar-brand' href='indexPrimario.php'><img src='aventonnegro.png'></a>
      </div>
      <div class='navbar-collapse collapse'>
        <ul id='ulnav' class='nav navbar-nav navbar-right'>
          <li><a href='#'><span class='glyphicon glyphicon-search'></span> Buscar Viajes</a></li>
          <li class='dropdown'>
            <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'><span class='glyphicon glyphicon-user'></span> Visitante <span class='caret'></span></a>
            <ul class='dropdown-menu' role='menu'>
              <li><a href='login.php'>Iniciar Sesion</a></li>
              <li><a href='index.php'>Registrarse</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <!--/.nav-collapse -->
    <!--/.container-fluid -->
  </nav>
</div>
";
}
}

function imprimir_footer(){
  $salida = "

  <footer>
    <p>MPG Web Deisgn, Copyright &copy; 2018</p>
  </footer>

  ";
  return $salida;
}

?>
