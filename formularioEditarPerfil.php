<!DOCTYPE html>

<?php include "navbar.php";
include "conexion.php"; ?>
<html lang="en" dir="ltr">
  <head>
    <script>
    function volverAlPerfil() {
        window.location.href = "verPerfil.php";
    }
    function mayor18() {
      nac = new Date(document.getElementById("nacimiento").value);
      hoy = new Date();
      anios = parseInt((hoy - nac)/365/24/60/60/1000);
      if (anios >= 18 ){
        document.getElementById("send").click();
      }else{
        alert("Fecha de nacimiento invalida, recuerde que tiene que ser mayor de 18 años para utilizar AVENTON");
      }
    }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <!--<script src="js/jquery-3.3.1.min.js"></script>-->
     <link rel="stylesheet" href="./css/styleexample.css">
    <!--<link rel="stylesheet" type="text/css" href="style.css">-->
    <script src="scripts.js" language="javascript" type="text/javascript"></script>
    <meta charset="utf-8">
    <title>editar perfil</title>
  </head>
  <body>

    <?php generarNavbar(); ?>

<form action="editarPerfil.php" method="POST" name="f1" id="f1">
  <div class="container">
    <h1>Editar Perfil</h1>
    <hr>
    <?php
    $conn= new conexion();
    $id= $_SESSION['idUsuario'];
    $sql = "SELECT * FROM usuarios WHERE idUsuario = '$id'";
    $result = $conn->consultarABD($sql);
    $row = mysqli_fetch_assoc($result);
    $hola = $row["direccion"];
    $hola1 = $row["descripcion"];
    $nombre1 = $row["nombre"];
    $apellido1 = $row["apellido"];
    $fecha1 = $row["fechaNac"];
    echo "<label for=\"nombre\"><b>Nombre/s</b></label>";
    echo "<input type=\"text\" value=\"$nombre1\" name=\"name\" required>";
    echo "<label for=\"apellido\"><b>Apellido/s</b></label>";
    echo "<input type=\"text\" value=\"$apellido1\" name=\"apellido\" required>";
    echo "<label for=\"birth\"><b>Fecha de Nacimiento/s</b></label>";
    echo "<input type=\"date\" value=\"$fecha1\" id=\"nacimiento\" name=\"birth\" required>";
    echo "<label for=\"direccion\"><b>Direccion/s</b></label>";
    echo "<input type=\"text\" value=\"$hola\" name=\"direccion\" required>";
    echo "<label for=\"descripcion\"><b>Descripcion/s</b></label>";
    echo "<input type=\"text\" value=\"$hola1\" name=\"descripcion\" required>";
    ?>
    <div class="clearfix">
      <button type="button" onclick="volverAlPerfil()" class="button cancelar">Cancelar</button>
      <button type="button" onclick="mayor18()" class="button crearViaje">Editar Perfil</button>
      <button type="submit" id="send" class="signupbtn" style="display:none;"></button>
    </div>
  </div>
</form>

<?php echo imprimir_footer(); ?>

  </body>
</html>
