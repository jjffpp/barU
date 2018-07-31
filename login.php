<!DOCTYPE html>

<?php include "navbar.php" ?>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset = "utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <!--<script src="js/jquery-3.3.1.min.js"></script>-->
   <link rel="stylesheet" href="./css/styleexample.css">
  <!--<link rel="stylesheet" type="text/css" href="style.css">-->
  <script src="scripts.js" language="javascript" type="text/javascript"></script>
</head>
<body>

    <?php generarNavbar(); ?>
  <form action="checklogin.php" method="post" >
    <div class="container">
      <h1><b>Login de Usuarios<b></h1>
      <hr>
      <label><b>Email<b></label><br>
      <input name="username" type="text" id="username" required>
      <br><br>
      <label><b>Password<b></label><br>
      <input name="password" type="password" id="password" required>
      <br>
      <?php if(isset($_GET['valido']))
      {
        if($_GET['valido']= 'false')
        {
          $message = "Nombre de usuario y/o contraseña invalido";
          echo "<script type='text/javascript'>alert('$message');</script>";
          //echo '<b>Nombre de usuario y/o contraseña invalido<b>';
        }
      }
       ?>
      <hr>
      <br>
      <button type="submit" class="button crearViaje" name="submit">LOGIN</button>
      <button type="button" onclick="irMenuPrincipal()" class="button cancelar">Cancelar</button>
    </div>
  </form>

  <?php echo imprimir_footer(); ?>
</body>
</html>
