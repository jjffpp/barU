<!DOCTYPE html>
<?php
  include "navbar.php";
  include "conexion.php";
?>
<html lang="en" dir="ltr">
<head>
  <script>
    function borrar(id) {
      window.location.href = "borrarVehiculoBack.php?idvehiculo="+id;
    }
  </script>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="client.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <!--<script src="js/jquery-3.3.1.min.js"></script>-->
   <link rel="stylesheet" href="./css/styleexample.css">
   <!--<script type="text/javascript" src="f2.js"></script>-->
   <title>Borrar Vehiculo</title>
</head>
<body>
  <?php generarNavbar(); ?>
  <form >
     <div class="container">
       <h1>Borrar Vehiculo</h1>
       <hr>
       <div class="datos">
       <?php
          $id= $_SESSION['idUsuario'];
          $conn= new conexion();
          $consulta1 = "SELECT vehiculo.idvehiculo as id, vehiculo.capacidad as capacidad, vehiculo.modelo as modelo,
                        vehiculo.descripcion as descrip, vehiculo.patente as patente
                        FROM vehiculo INNER JOIN usuarios ON vehiculo.owner = usuarios.idUsuario
                        WHERE usuarios.idUsuario = '$id'";
          $resultado1 = $conn->consultarABD($consulta1);
          if ($resultado1->num_rows > 0){
          echo "<div class='dataVehiculo'>";
            echo "<table class=\"tablaVehiculos\" style=\"border: none;width:57%;text-align: center;\">";
            echo "<tr style=\"border: none; background-color: #75797C; opacity: 0.9;margin: 8px 0;color: white;\">";
              echo "<th style=\"border: none;padding: 14px 20px;text-align: center;\">Vehiculo</th>";
              echo "<th style=\"border: none;padding: 14px 20px;text-align: center;\">Año</th>";
              echo "<th style=\"border: none;padding: 14px 20px;text-align: center;\">Capacidad</th>";
              echo "<th style=\"border: none;padding: 14px 20px;text-align: center;\">Patente</th>";
              echo "<th style=\"border: none;padding: 14px 20px;text-align: center;\"></th>";
            echo "</tr>";
              while($row1 = mysqli_fetch_assoc($resultado1)) {
                echo "<tr style=\"border: none;\">";
                  echo "<td style=\"border-bottom: 1px solid black;\"><b>".$row1["descrip"]."</b></td>";
                  echo "<td style=\"border-bottom: 1px solid black;\">".$row1["modelo"]."</td>";
                  echo "<td style=\"border-bottom: 1px solid black;\">".$row1["capacidad"]."</td>";
                  echo "<td style=\"border-bottom: 1px solid black;\">".$row1["patente"]."</td>";
                  echo "<td style=\"border-bottom: 1px solid black;\">";
                  $idVehiculo = $row1["id"];
                    echo "<button type=\"button\" onclick=\"borrar('".$idVehiculo."')\" style=\"border: none;background-color:white;outline: none;\" ><img src=\"basura.png\" width=\"35\" height=\"35\" /></button>";
                  echo "</td>";
                echo "</tr>";
              }
            echo "</table>";
         }
       ?>
       </div>
      </div>
    </form>
    <?php echo imprimir_footer(); ?>
  </body>
  </html>
