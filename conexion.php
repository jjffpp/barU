<?php

class conexion {

	function consultarABD($aConsulta){
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
}
 ?>
