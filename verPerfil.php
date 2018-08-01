<!DOCTYPE html>
<?php
  include "navbar.php";
  include "conexion.php";
?>
<html lang="en" dir="ltr">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width">
   <script src="validarAltaVehiculo.js" type="text/javascript"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <!--<script src="js/jquery-3.3.1.min.js"></script>-->
   <link rel="stylesheet" href="./css/styleexample.css">
   <!--<script type="text/javascript" src="f2.js"></script>-->
   <title>Agregar vehiculo</title>
</head>
<body>
  <?php generarNavbar(); ?>
  <form action="altaVehiculo.php" method="post" id="formulario">
     <div class="container">
       <h1>Perfil de Usuario</h1>
       <hr>
       <div class="datos">
       <?php
          $id= $_SESSION['idUsuario'];
          $conn= new conexion();
          $consulta= "SELECT * FROM  usuarios WHERE idUsuario = '$id'";
          $resultado = $conn->consultarABD($consulta);
          $row = mysqli_fetch_assoc($resultado) ;
          echo "<label for:\"nombre\"><b><h3>".$row["nombre"]." ".$row["apellido"]."</h3><b><br></label><br>";
          echo "<label for:\"email\"><h4><b>Email: <b></h4></label>";
          echo "<label for:\"email\">".$row["email"]."</label><br>";
          echo "<label for:\"email\"><h4><b>Fecha de nacimiento: <b></h4></label>";
          echo "<label for:\"fechaNac\">".$row["fechaNac"]."</label><br>";
          echo "<label for:\"email\"><h4><b>Direccion: <b></h4></label>";
          echo "<label for:\"direccion\">".$row["direccion"]."</label><br>";
          echo "<label for:\"email\"><h4><b>Descripcion: <b></h4></label>";
          echo "<label for:\"descripcion\">".$row["descripcion"]."</label><br>";
       ?>
       </div>
        <div class="botones">
          <button type="button" onclick="validarCampos()" class="button crearViaje">Crear vehiculo</button>
          <button type="submit" id="send" style="display:none;"></button>
          <button type="button" onclick="irMenuPrincipal()" class="button cancelar">Cancelar</button>
        </div>
      </div>
    </form>
    <?php echo imprimir_footer(); ?>
  </body>
  </html>
