<!DOCTYPE html>

<?php
  include "navbar.php";
?>
<html lang="en" dir="ltr">
  <head>
    <script>
    function irMenuPrincipal() {
        window.location.href = "indexPrimario.php";
    }
    function comprobarClave() {
      clave1 = document.f1.psw.value;
      clave2 = document.f1.pswrepeat.value;
      if((clave1!=clave2)||(clave1 == "")||(clave2 == "")){
        document.getElementById("recheck").value = "";
        document.getElementById("recheck").placeholder = "Las contraseñas son invalidas"
        document.getElementById("pass").value = "";
        document.getElementById("pass").placeholder = "Las contraseñas son invalidas";
      }else{
        document.getElementById("send").click();
      }
    }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <!--<script src="js/jquery-3.3.1.min.js"></script>-->
     <link rel="stylesheet" href="./css/styleexample.css">
    <!--<link rel="stylesheet" type="text/css" href="style.css">-->
    <meta charset="utf-8">
    <title>Cambiar Contraseña</title>
  </head>
  <body>

    <?php generarNavbar();
    if(isset($_GET['cambio'])){
        if($_GET['cambio'] == 'true'){
          $message = "cambio exitoso";
        }
        if($_GET['cambio'] == 'false'){
          $message = "error en el cambio de contraseña";
        }
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    ?>

<form action="cambiarContrasena.php" method="POST" name="f1" id="f1">
  <div class="container">
    <h1>Cambiar Contraseña</h1>
    <hr>
    <label for="psw"><b>Contraseña actual</b></label>
    <input type="password" id="passactual" placeholder="Ingrese contraseña actual" name="pswactual" required>

    <label for="psw"><b>Contraseña nueva</b></label>
    <input type="password" id="pass" placeholder="Ingrese contraseña nueva" name="psw" required>

    <label for="psw-repeat"><b>Repita la contraseña</b></label>
    <input type="password" id="recheck" placeholder="Repita contraseña nueva" name="pswrepeat" required>

    <div class="clearfix">
      <button type="button" onclick="irMenuPrincipal()" class="button cancelar">Cancelar</button>
      <button type="button" onclick="comprobarClave()" class="button crearViaje">Cambiar Contraseña</button>
      <button type="submit" id="send" class="signupbtn" style="display:none;"></button>
    </div>
  </div>
</form>

<?php echo imprimir_footer(); ?>

  </body>
</html>
