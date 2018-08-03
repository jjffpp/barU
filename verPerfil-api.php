<html lang="en" dir="ltr">
<head>
   <meta charset="utf-8">
   <?php include "navbar.php" ?>
   <meta name="viewport" content="width=device-width">
   <script type='text/javascript' src='client.js'></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="./css/styleexample.css">
   <title>Ver Perfil usuario</title>
</head>
<?php
include "conexion.php";
$id = $_GET['idUser'];
echo "<body>";
    generarNavbar();
  echo "<form >";
     echo "<div class=\"container\">";
       echo "<h1 class='margin-top-30'>Perfil de Usuario</h1>";
       echo "<hr>";
       echo "<div class=\"datos\">";
          $conn= new conexion();
          $consulta= "SELECT * FROM  usuarios WHERE idUsuario = '$id'";
          $resultado = $conn->consultarABD($consulta);
          $row = mysqli_fetch_assoc($resultado) ;
          $consulta1 = "SELECT puntuacion
                        FROM usuarios
                        WHERE usuarios.idUsuario = '$id'";
          $resultado1 = $conn->consultarABD($consulta1);
          $puntos = mysqli_fetch_assoc($resultado1);
          echo "<table>";
          echo "<tr style=\"border: none; background-color: none;margin: 8px 0;\">";
            echo "<th style=\"border: none;\"></th>";
            echo "<th style=\"border: none;\"></th>";
            echo "<th style=\"border: none;\"></th>";
          echo "</tr>";
          echo "<tr style=\"border: none;\">";
            echo "<td>";
              echo"<img src=\"user.png\" width=\"150\" height=\"150\"/>";
            echo "</td>";
            echo "<td>";
            echo "<ul class='perfil' style=\"border: none;width:100%;list-style:none\">";
              echo "<li><b><h3> ".$row["nombre"]." ".$row["apellido"]."<h3></b></li>";
              echo "<li><b>Email: </b>".$row["email"]."</li>";
              echo "<li><b>Fecha de nacimiento: </b>".$row["fechaNac"]."</li>";
              echo "<li><b>Direccion: </b>".$row["direccion"]."</li>";
              echo "<li><b>Descripcion: </b>".$row["descripcion"]."</li>";
            echo "</ul>";
            echo "</td>";
            echo "<td>";
              echo "<ul style=\"border: none;width:100%;list-style:none\">";
              echo "<li style=\"color: white;\">-</li>";
              echo "<li><button type=\"button\" onclick=\"puntuacionUsuario(".$puntos['puntuacion'].")\"style=\"border: none; background-color: #429BEF; opacity: 0.9;color: white;padding: 14px 20px;\">PUNTUACION</button></li>";
              echo "</ul>";
            echo "</td>";
          echo "</tr>";
          echo "</table>";
          echo "<br>";
          $consulta1 = "SELECT vehiculo.capacidad as capacidad, vehiculo.modelo as modelo,
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
            echo "</tr>";

              while($row1 = mysqli_fetch_assoc($resultado1)) {
                echo "<tr style=\"border: none;\">";
                  echo "<td style=\"border-bottom: 1px solid black;\"><b>".$row1["descrip"]."</b></td>";
                  echo "<td style=\"border-bottom: 1px solid black;\">".$row1["modelo"]."</td>";
                  echo "<td style=\"border-bottom: 1px solid black;\">".$row1["capacidad"]."</td>";
                  echo "<td style=\"border-bottom: 1px solid black;\">".$row1["patente"]."</td>";
                echo "</tr>";
              }
            echo "</table>";
        echo "</div>";
        echo "<div class='col-lg-12 puntuacion hidden width:100%;text-align: center' style='padding-left:50%; margin-top:20px; border-bottom: 5px solid green;border-top: 5px solid green;'>";
        echo "<h1 id='pp' class=';'>HOLA</h1>";
        echo "</div>";

      }else{
        echo "<div class='dataVehiculo'>";
        echo "</div>";
        echo "<div style='margin-bottom:10px;'>";
        echo "</div>";
        echo "<div class='col-lg-12 puntuacion hidden width:100%;text-align: center' style='padding-left:50%;padding-top:10px; border-bottom: 5px solid green;border-top: 5px solid green;'>";
        echo "<h1 id='pp' class=';'>HOLA</h1>";
        echo "</div>";
      }
       ?>
       </div>
      </div>
    </form>
    <?php echo imprimir_footer(); ?>
    <script>
      function puntuacionUsuario(id){
        console.log(id);
        var dd = document.querySelector(".dataVehiculo")
        //$(".dataVehiculo").hide(1000);
        console.log()
        $("#pp").show(1000);
        var hh = document.getElementById("pp");
        parent = hh.parentElement
        parent.classList.remove("hidden")
        hh.innerHTML= id + ' puntos';
      }
    </script>
  </body>
  </html>
