<html lang="en" dir="ltr">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" href="./css/styleexample.css">
   <title>detalle viaje</title>
</head>
<?php
include "conexion.php";
$id = $_GET['idViaje'];
echo "<body>";
  echo "<form>";
     echo "<div class=\"container\">";
       echo "<h1>Detalle de Viaje Numero $id</h1>";
       echo "<hr>";
       echo "<div class=\"datos\">";
          $conn= new conexion();
          $consultaViajes= "SELECT * FROM viajes
                      INNER JOIN vehiculo on vehiculo.idvehiculo = viajes.idvehiculo
                      INNER JOIN usuarios on vehiculo.owner = usuarios.idusuario
                      WHERE idviajes = '$id'";
          $resultadoViajes = $conn->consultarABD($consultaViajes);
          $rowViajes = mysqli_fetch_assoc($resultadoViajes) ;

          $consultaOrigen= "SELECT localidades.nombre as origen FROM viajes
                      INNER JOIN localidades on localidades.idlocalidades = viajes.localidad_origen
                      WHERE idviajes = '$id'";
          $resultadoOrigen = $conn->consultarABD($consultaOrigen);
          $rowOrigen = mysqli_fetch_assoc($resultadoOrigen) ;

          $consultaDestino= "SELECT localidades.nombre as destino FROM viajes
                      INNER JOIN localidades on localidades.idlocalidades = viajes.localidad_destino
                      WHERE idviajes = '$id'";
          $resultadoDestino = $conn->consultarABD($consultaDestino);
          $rowDestino = mysqli_fetch_assoc($resultadoDestino) ;

          $consultaVehiculo= "SELECT vehiculo.descripcion as descrip FROM viajes
                      INNER JOIN vehiculo on vehiculo.idvehiculo = viajes.idvehiculo
                      INNER JOIN usuarios on vehiculo.owner = usuarios.idusuario
                      WHERE idviajes = '$id'";
          $resultadoVehiculo = $conn->consultarABD($consultaVehiculo);
          $rowVehiculo = mysqli_fetch_assoc($resultadoVehiculo) ;
          echo "<table style=\"border: none;width:70%;text-align: center; font-size: 1.3em;\">";
          echo "<tr style=\"border: none; width:70%;background-color: #75797C; opacity: 0.9;margin: 8px 0;color: white;\">";
            echo "<th style=\"border: none;padding: 10px 10px;text-align: center;\">Viaje</th>";
            echo "<th style=\"border: none;padding: 10px 10px;text-align: center;\">Chofer</th>";
            echo "<th style=\"border: none;padding: 10px 10px;text-align: center;\">Vehiculo</th>";
          echo "</tr>";
          echo "<tr style=\"border: none;\">";
            echo "<td>";
            echo "<ul style=\"border: none;width:100%;list-style:none\">";
              echo "<li><b>Origen: </b>".$rowOrigen["origen"]."</li>";
              echo "<li><b>Destino: </b>".$rowDestino["destino"]."</li>";
              echo "<li><b>Fecha de Partida: </b>".$rowViajes["fechaYHora"]."</li>";
              echo "<li><b>Duracion: </b>".$rowViajes["duracion"]." hora/s </li>";
              echo "<li><b>Tipo: </b>".$rowViajes["tipo"]."</li>";
            echo "</ul>";
            echo "</td>";
            echo "<td>";
            echo "<ul style=\"border: none;width:100%;list-style:none\">";
              echo "<li><b>Nombre: </b>".$rowViajes["nombre"]."</li>";
              echo "<li><b>Apellido: </b>".$rowViajes["apellido"]."</li>";
              echo "<li><b>Email: </b>".$rowViajes["email"]."</li>";
              echo "<li><b>Direccion: </b>".$rowViajes["direccion"]."</li>";
              echo "<li><b>Descripcion: </b>".$rowViajes["descripcion"]."</li>";
            echo "</ul>";
            echo "</td>";
            echo "<td>";
            echo "<ul style=\"border: none; width:100%; list-style:none\">";
              echo "<li><b>Modelo: </b>".$rowVehiculo["descrip"]."</li>";
              echo "<li><b>Año: </b>".$rowViajes["modelo"]."</li>";
              echo "<li style=\"color: white;\">-</li>";
              echo "<li style=\"color: white;\">-</li>";
              echo "<li style=\"color: white;\">-</li>";
            echo "</ul>";
            echo "</td>";
          echo "</tr>";
          echo "</table>";
    echo "</form>";
  echo "</body>";
 ?>
