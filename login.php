<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset = "utf-8">
</head>
<body>
  <h1>Login de Usuarios</h1>
  <hr />
  <form action="checklogin.php" method="post" >
      <label>Email:</label><br>
      <input name="username" type="text" id="username" required>
      <br><br>
      <label>Password:</label><br>
      <input name="password" type="password" id="password" required>
      <br>
      <?php if(isset($_GET['valido']))
      {
        if($_GET['valido']= 'false')
        {
          echo 'Nombre de usuario y/o contraseña invalido';
        }
      }
       ?>
      <br>
      <input type="submit" name="Submit" value="LOGIN">
  </form>
  <hr/>
</body>
</html>
