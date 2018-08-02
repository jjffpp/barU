<?php
session_start();

function consultarABD($aConsulta)
{
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "barudb";
  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  $result = $conn->query($aConsulta);
  return $result;
}

function poseeVehiculo($idUser)
{
  $consulta = "SELECT COUNT(*) AS cantidadVehiculos
  from usuarios INNER JOIN vehiculo on(usuarios.idUsuario = vehiculo.owner)
  WHERE usuarios.idUsuario = " . $idUser;
  $resultado = consultarABD($consulta);
  if (mysqli_num_rows($resultado) > 0) {
    while($row = mysqli_fetch_assoc($resultado)) {
        if($row["cantidadVehiculos"] != 0)
        {
          echo 'true';
        }
        else{ echo 'false';}
        //echo "cantidadVehiculos del usuario con id " .$idUser . " es: " . $row["cantidadVehiculos"]."<br>";
    }
  }
}


  if(isset($_SESSION['idUsuario']))
  {
    poseeVehiculo($_SESSION['idUsuario']);
  }
  else
  {
    echo 'false';
  }
//poseeVehiculo(3);
?>
