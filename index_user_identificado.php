<!DOCTYPE html>
<?php
  $cookie_name = 'user';
  $cookie_value = 'julian';
  setcookie($cookie_name,$cookie_value,time() + (86400*30),"/"); // "/" es que estará en toda la pagina
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--<script src="js/jquery-3.3.1.min.js"></script>-->
    <link rel="stylesheet" href="./css/styleexample.css">
    <script type="text/javascript" src="f2.js"></script>
  </head>
  <body>
    <div class="example3">
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar3">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index_user_identificado.php"><img src="aventonnegro.png"></a>
          </div>
          <div class="navbar-collapse collapse">
            <ul id="ulnav" class="nav navbar-nav navbar-right">
              <li><a href="index"><span class="glyphicon glyphicon-briefcase"></span> Mis Viajes</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-map-marker"></span> Crear Viaje</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-search"></span> Buscar Viajes</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-road"></span> Registrar Vehiculo</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Mi Usuario <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li class="dropdown-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
            </ul>
          </div>
          <!--/.nav-collapse -->
        </div>
        <!--/.container-fluid -->
      </nav>
    </div>
    <div id="content"></div>
    <!--<center>
      <ul class="pagination" id="pagination"></ul>
    </center>-->
    <footer>
      <p>MPG Web Deisgn, Copyright &copy; 2018</p>
    </footer>
  </body>
</html>
