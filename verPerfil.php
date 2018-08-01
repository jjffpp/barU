<!DOCTYPE html>
<?php
  include "navbar.php";
  include "conexion.php";
?>
<html lang="en" dir="ltr">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width">
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
          echo "<ul style=\"border: none;width:100%;list-style:none\">";
            echo "<li><b><h3> ".$row["nombre"]." ".$row["apellido"]."<h3></b></li>";
            echo "<li><b>Email: </b>".$row["email"]."</li>";
            echo "<li><b>Fecha de nacimiento: </b>".$row["fechaNac"]."</li>";
            echo "<li><b>Direccion: </b>".$row["direccion"]."</li>";
            echo "<li><b>Descripcion: </b>".$row["descripcion"]."</li>";
          echo "</ul>";
          ?>
          <div>
            <button type="button" class="button crearViaje">EDITAR PEFIL</button>
          </div>
          <?php
          $consulta1 = "SELECT vehiculo.capacidad as capacidad, vehiculo.modelo as modelo,
                        vehiculo.descripcion as descrip
                        FROM vehiculo INNER JOIN usuarios ON vehiculo.owner = usuarios.idUsuario
                        WHERE usuarios.idUsuario = '$id'";
          $resultado1 = $conn->consultarABD($consulta1);
          echo "<div>";
            echo "<table class=\"tablaVehiculos\" style=\"border: none;width:100%;text-align: center;\">";
            echo "<tr style=\"border: none; background-color: #919599; opacity: 0.9;margin: 8px 0;color: white;\">";
              echo "<th style=\"border: none;padding: 14px 20px;text-align: center;\">Vehiculo</th>";
              echo "<th style=\"border: none;padding: 14px 20px;text-align: center;\">Año</th>";
              echo "<th style=\"border: none;padding: 14px 20px;text-align: center;\">Capacidad</th>";
            echo "</tr>";
              while($row1 = mysqli_fetch_assoc($resultado1)) {
                echo "<tr style=\"border: none;\">";
                  echo "<td style=\"border-bottom: 1px solid black;\"><b>".$row1["descrip"]."</b></td>";
                  echo "<td style=\"border-bottom: 1px solid black;\">".$row1["modelo"]."</td>";
                  echo "<td style=\"border-bottom: 1px solid black;\">".$row1["capacidad"]."</td>";
                echo "</tr>";
              }
            echo "</table>";
        echo "</div>";
       ?>
       </div>
      </div>
    </form>
    <?php echo imprimir_footer(); ?>
  </body>
  </html>
