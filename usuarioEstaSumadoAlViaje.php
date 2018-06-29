<?php
include "consultas_bd.php";
function usuarioEstaSumadoAlViaje($idViaje,$idUsuario)
{
  echo $idUsuario;
  $cont = 0;
$conn= usuarioEnSemana($idViaje,$idUsuario);
while ($fila = $conn->fetch_assoc()) {
  //print_r($fila);
  $cont++;
}
echo $cont;
if ($cont > 0) {

        return true;
      }
      else{ return false;}
      //echo "cantidadVehiculos del usuario con id " .$idUser . " es: " . $row["cantidadVehiculos"]."<br>";

}
 ?>
