<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset = "utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
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
          echo '<b>Nombre de usuario y/o contraseña invalido<b>';
        }
      }
       ?>
      <hr>
      <br>
      <button type="submit" class="login" name="submit">LOGIN</button>
      <button type="button" class="cancelar">Cancelar</button>
    </div>
  </form>
</body>
</html>
