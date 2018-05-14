<?php

function consultarABD($aConsulta)
{
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "mydb";
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
  from usuarios INNER JOIN vehiculo on(usuarios.idUsuario = vehiculo.usuarios_idUsuario)
  WHERE usuarios.idUsuario = " . $idUser;
  $resultado = consultarABD($consulta);
  if (mysqli_num_rows($resultado) > 0) {
    while($row = mysqli_fetch_assoc($resultado)) {
        echo "cantidadVehiculos del usuario con id " .$idUser . " es: " . $row["cantidadVehiculos"]."<br>";
    }
  }
}

function idDeUsuarioConSesionIniciada()
{
  if(isset($_SESSION['loggedUserID']))
  {
    return $_SESSION['loggedUserID'];
  }
  else
  {
    return -1;
  }
}
poseeVehiculo(3);
?>
