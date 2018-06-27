<!DOCTYPE html>

<?php include "navbar.php" ?>
<html lang="en" dir="ltr">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <!--<script src="js/jquery-3.3.1.min.js"></script>-->
     <link rel="stylesheet" href="./css/styleexample.css">
    <!--<link rel="stylesheet" type="text/css" href="style.css">-->
    <script src="scripts.js" language="javascript" type="text/javascript"></script>
    <meta charset="utf-8">
    <title>Registrar Usuario</title>
  </head>
  <body>

    <?php generarNavbar(); ?>

<form action="registrarUserServer.php" method="POST" name="f1" id="f1">
  <div class="container">
    <h1>Registrarse</h1>
    <p>Por favor, complete todos los campos para registrarse al sistema.</p>
    <hr>
    <?php if(isset($_GET['valido']))
    {
      if($_GET['valido']= 'false')
      {
        echo '<b><h4>El EMAIL ya esta siendo utilizado en el sistema, vuelva a intentarlo</h4><b>';
      }
    }
     ?>
    <label for="nombre"><b>Nombre/s</b></label>
    <input type="text" placeholder="Ingrese Nombre" name="name" required>

    <label for="apellido"><b>Apellido/s</b></label>
    <input type="text" placeholder="Ingrese apellido" name="apellido" required>

    <label for="birth"><b>Fecha de Nacimiento</b></label>
    <input type="date" placeholder="Ingrese fecha de nacimiento" id="nacimiento" name="birth" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Ingrese Email" name="email" required>

    <label for="direccion"><b>Direccion</b></label>
    <input type="text" placeholder="Ingrese Direccion" name="direccion" required>

    <label for="descripcion"><b>Descripcion</b></label>
    <input type="text" placeholder="Ingrese Descripcion" name="descripcion" required>

    <label for="psw"><b>Contraseña</b></label>
    <input type="password" id="pass" placeholder="Ingrese contraseña" name="psw" required>

    <label for="psw-repeat"><b>Repita la contraseña</b></label>
    <input type="password" id="recheck" placeholder="Repita contraseña" name="pswrepeat" required>

    <div class="clearfix">
      <button type="button" onclick="irMenuPrincipal()" class="cancelar">Cancelar</button>
      <button type="button" onclick="comprobarClaveYmayor18()" class="crearViaje">Registrarse</button>
      <button type="submit" id="send" class="signupbtn" style="display:none;"></button>
    </div>
  </div>
</form>

<?php echo imprimir_footer(); ?>

  </body>
</html>
