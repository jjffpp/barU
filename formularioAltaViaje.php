<?php
session_start();

require 'conexion.php';
//TODOS ESOS ECHOS SON PARA QUE SEPAS QUE LLEGA
//EL VIAJE OCACIONAL ESTA COMPLETAMENTE TERMINADO, CON SU FUNCIONALIDAD DE BACK YA HECHA
//FALTA PROGRAMAR EL BACK DEL VIAJE SEMANAL, ACLARO EN CADA ELEMENTO QUE ES CADA COSA.
print_r($_POST);

if($_POST["tipo"]=="ocacional")
{
  //IMPRIMO EL CONTENIDO DE POST, ACA ESTAN TODAS LAS VARIABLES DEL VIAJE OCACIONAL
  //BORRAR LOS ECHOS CUANDO ESTE TERMINADO
  $duracion = $_POST["duracion"];//int en la base de datos
  $costo = $_POST["costo"];
  $tipo = $_POST["tipo"];
  $origen = $_POST["origen"];
  $destino = $_POST["destino"];
  $fecha = $_POST["fecha"];
  $hora = $_POST["hora"];
  darDeAltaViajeOcacional($duracion,$costo,$tipo,$origen,$destino,$fecha,$hora);
  echo $origen, "<br />";
  echo $destino, "<br />";
  echo $tipo, "<br />";
  echo $fecha, "<br />";
  echo $duracion, "<br />";
  echo $costo, "<br />";
  echo $hora, "<br />";
}
else if($_POST["tipo"]=="semanal")
{
  //IMPRIMO EL CONTENIDO DE POST, ACA ESTAN TODAS LAS VARIABLES DEL VIAJE SEMANAL
  //IMPRIMIR EL ARREGLO "$diasDeLaSemana" DA ERROR POR ESO TE LO EXPLICO EN EL SUPER COMENTARIO DE ABAJO

  //darDeAltaViajeSemanal(); DESCOMENTAR ESTA LINEA CUANDO ESTE PROGRAMADO Y BORRAR LOS ECHOS;
  $origen = $_POST["origen"];
  $destino = $_POST["destino"];
  $tipo = $_POST["tipo"];
  $fechaPrimerViaje = $_POST["fecha2"];
  $fechaUltimaSalida = $_POST["fecha3"];
  $diasDeLaSemana = $_POST["days"];
  $duracion = $_POST["duracion"];
  $costo = $_POST["costo"];
  $hora = $_POST["hora"];
  echo $origen, "<br />";                       //LUGAR DE ORIGEN
  echo $destino, "<br />";                      //LUGAR DE DESTINO
  echo $tipo, "<br />";                         //TIPO DE VIAJE, ACA HAY UN STRING QUE DICE "ocacional" O "semanal", tal vez convenga guardar el tipo de viaje en la base de datos
  echo $fechaPrimerViaje, "<br />";             //ESTA ES LA FECHA DEL PRIMER DIA QUE SE REALIZA EL VIAJE
  echo $fechaUltimaSalida, "<br />";            //ESTA ES LA FECHA DEL ULTIMO DIA QUE SE REALIZA EL VIAJE

  echo $diasDeLaSemana, "<br />";               //ATENCION: ESTO ES UN ARREGLO QUE TIENE LOS DIAS DE LA SEMANA QUE QUIERE REALIZAR LOS VIAJE
  print_r($diasDeLaSemana);                                             //NO IMPORTA EL VALOR DE LAS KEYS, SINO LAS VALUES!!, LOS DIAS DE LA SEMANA ESTAN MAPEADOS DE ESTA FORMA:
                                                //LUNES = 1
                                                //MARTES = 2
                                                //MIERCOLES = 3
                                                //JUEVES = 4
                                                //VIERNES = 5
                                                //SABADO = 6
                                                //DOMINGO = 0

                                                //EJEMPLO 1
                                                //SI LLEGA EL ARREGLO ASI
                                                //$diasDeLaSemana[0] = 1
                                                //$diasDeLaSemana[1] = 5
                                                //ESTO SIGNIFICA QUE EL USUARIO SELECCIONO LUNES Y VIERNES

                                                //EJEMPLO 2
                                                //SI LLEGA EL ARREGLO ASI
                                                //$diasDeLaSemana[0] = 2
                                                //$diasDeLaSemana[1] = 0
                                                //$diasDeLaSemana[2] = 1
                                                //ESTO SIGNIFICA QUE EL USUARIO SELECCIONO MARTES, DOMINGO y LUNES

                                                //PUEDE SELECCIONAR TODOS LOS DIAS QUE QUIERA, OSEA QUE PUEDE LLEGAR ALGO COMO ESTO:
                                                //$diasDeLaSemana[0] = 0
                                                //$diasDeLaSemana[1] = 1
                                                //$diasDeLaSemana[2] = 2
                                                //$diasDeLaSemana[3] = 3
                                                //$diasDeLaSemana[4] = 4
                                                //$diasDeLaSemana[5] = 5
                                                //$diasDeLaSemana[6] = 6
                                                //ESTO SIGNIFICA QUE SELECCIONO TODOS LOS DIAS DE LA SEMANA (Lunes..Domingo)

  echo $duracion, "<br />";                     //DURACION DE CADA VIAJE INDIVIDIAL APROXIMADAMENTE
  echo $costo, "<br />";                        //COSTO DE CADA UNO DE LOS VIAJES, GLOBAL A TODOS LOS VIAJES
  echo $hora, "<br />";                         //HORA DE SALIDA DE CADA VIAJE, ESTO ES GLOBAL A TODOS LOS VIAJES

  darDeAltaViajeSemanal($fechaPrimerViaje,$fechaUltimaSalida,$diasDeLaSemana);   //BORRAR ESTE DIE                    //LA FUNCIONALIDAD QUE HAY QUE IMPLEMENTAR ES CREAR UN VIAJE POR CADA DIA DE LA SEMANA SELECCIONADO EN EL RANGO DE FECHAS QUE LLEGA
}                                               //OSEA QUE SI LLEGA EL 1/3/2018 como fecha inicial y 1/4/2018 COMO FECHA FINAL y en el arreglo de fechas llega solo el lunes,
                                                //ENTONCES HAY QUE CREAR UN VIAJE POR CADA LUNES ENTRE ESAS DOS FECHAS INCLUSIVE SI ES LUNES EL 1/3/2018 o el 1/4/2018
                                                //MODELE EL FRONT PARA QUE SIEMRPE EN EL ARREGLO LLEGUEN LOS DIAS DE LA SEMANA CORRESPONDIENTES A LAS FECHAS INGRESADAS, MAS CUALQUIER
                                                //OTRA QUE EL USUARIO SELECCIONE, ASI QUE SIEMPRE VA A LLEGAR ALGO VALIDO

function darDeAltaViajeOcacional($duracion,$costo,$tipo,$origen,$destino,$fecha,$hora)
{
  //inserto en la base de datos
  $combinedDT = date('Y-m-d H:i:s', strtotime("$fecha $hora"));
  $conn= new conexion();
  //la consulta esta con el vehiculo truncado en 4
  $consulta= "INSERT INTO `viajes`(`fechaYHora`, `tipo`, `duracion`, `costo`, `localidad_origen`, `localidad_destino`, `idvehiculo`,`estado_viaje`) VALUES
  ('$combinedDT','$tipo','$duracion','$costo','$origen','$destino',4,0)";
  $conn->consultarABD($consulta);
  $consulta= "SELECT max(idviajes) as maximo
              FROM  viajes";
  $resultado = $conn->consultarABD($consulta);
  $row = mysqli_fetch_assoc($resultado);
  //var_dump($row['maximo']);
  //var_dump($_SESSION['idUsuario']);
  $id= $_SESSION['idUsuario'];
  $numerito = $row['maximo'];
  $consulta  = "INSERT INTO `usuarios_has_viajes` (`usuarios_idUsuario`,`viajes_idviajes`) VALUES ('$id', '$numerito')";
  $conn->consultarABD($consulta);
  header("location: indexPrimario.php");
}

function darDeAltaViajeSemanal($fechaPrimerViaje,$fechaUltimaSalida,$diasDeLaSemana)
{
  //ACA SE DA DE ALTA UN VIAJE SEMANAL, HAY QUE VER COMO METERLO A LA BASE DE DATOS
  $primera = date($fechaPrimerViaje);
  $segunda = date($fechaUltimaSalida);
  if($primera > $segunda){
      echo "PRIMERA :".$primera;
  }
  else {
    echo "Segunda :".$segunda;
  }

  echo "Primera : " . $primera;
  echo "</br>";
  echo date("w",strtotime($primera));
  echo "</br>";
  echo "Segunda : " . $segunda;
  echo "</br>";
  echo "Dia de la semana de la fecha inicial: ".date("w",strtotime($segunda));

  $diff = abs(strtotime($primera) - strtotime($segunda));
  $dias = $diff / (60*60*24);
  echo "</br>";
  echo "Dias: " . $dias;
  echo "</br>";
  $semanas = intval($dias / 7);
  echo "Cantidad de Semanas: " . $semanas;
  echo "</br>";
  $diferencia1 = $dias - ($semanas * 7);
  echo "Diferencia: " . $diferencia1;
  echo "</br>";
  echo "Tamaño: " . sizeof($diasDeLaSemana);
  echo "</br>";

  $f = 5;
  $fechaFinalizacion = new DateTime($primera);

  $fechaFinalizacion->add(new DateInterval('P'.$f.'D'));
  $fechaFinalizacion->format('Y-m-d');
  echo "SUMA FECHA: ".$fechaFinalizacion->format('Y-m-d');
  echo "</br>";

  $diaInicial = date("w",strtotime($primera));
  $diaFin = date("d",strtotime($segunda));

  echo "DIA DE LA SEMANA INICIAL: ".$diaInicial;
  echo "</br>";
  $fechaFin = new DateTime($segunda);
  $fechaTemporal = new DateTime($primera);

for ($k=0; $k < $semanas; $k++) {
  for ($j=0; $j < sizeof($diasDeLaSemana); $j++) {
    $contador=0;
    if($diaInicial == $diasDeLaSemana[$j]){
      for ($i=$j; $i < sizeof($diasDeLaSemana); $i++) {
        if($diaInicial < $diasDeLaSemana[$i]) {
         $diferencia = $diasDeLaSemana[$i] - $diaInicial;
         $fecha0 = clone $fechaTemporal;
         $fecha0->add(new DateInterval('P'.$diferencia.'D'));
         $fecha0->format('Y-m-d');
         echo "Es menor: ". $fecha0->format('Y-m-d')." Diferencia = ". $diferencia." Dia: ".nombreDelDia($diferencia+$diaInicial);
         echo "</br>";
      }
      else{
        $fecha = clone $fechaTemporal;
        echo "Es Igual: ".$fecha->format('Y-m-d')." Dia: ".nombreDelDia($diasDeLaSemana[$i]);
        echo "</br>";
      }
      $contador++;
    }
    if($contador < sizeof($diasDeLaSemana)){
      for ($i=0; $i < sizeof($diasDeLaSemana)-$contador; $i++) {
        if($diaInicial>$diasDeLaSemana[$i]){
          $diferencia = $diaInicial - $diasDeLaSemana[$i];
          $fecha1 = clone $fechaTemporal;
          $diferencia = 7 - $diferencia;
          $fecha1->add(new DateInterval('P'.$diferencia.'D'));
          $fecha1->format('Y-m-d');
          echo "Es mayor: ".$fecha1->format('Y-m-d')." Diferencia = ". $diferencia." Dia: ".nombreDelDia(($diaInicial+$diferencia)-7);
          echo "</br>";
        }
        $var = $i;
      }
    }
  }
}
$fechaTemporal->add(new DateInterval('P7D'));
$fechaTemporal->format('Y-m-d');
}

$fecha = clone $fechaTemporal;
echo "Es Igual: ".$fecha->format('Y-m-d')." Dia: ".nombreDelDia($diasDeLaSemana[$i]);
echo "</br>";



for ($i=0; $i < $diferencia; $i++) {
  $fechaTemporal->add(new DateInterval('P1D'));
  $f = $fechaTemporal->format('Y-m-d');
  $diaSecundario = date("w",strtotime($f));
  $dd = date("d",strtotime($f));
  for ($j=0; $j < sizeof($diasDeLaSemana); $j++) {
    if(($diaSecundario == $diasDeLaSemana[$j])&&($dd <= $diaFin)){
      echo $fechaTemporal->format('Y-m-d')." Dia: ".nombreDelDia($i);
      echo "</br>";
    }
  }
}
/*$ff = clone $fechaTemporal;
for ($j=0; $j < $diferencia1+1; $j++) {
  $contador=0;
  echo "DD:".$diasDeLaSemana[$j];
  echo "</br>";
  if($diaInicial == $diasDeLaSemana[$j]){
    for ($i=$j; $i < sizeof($diasDeLaSemana); $i++) {
      if($diaInicial < $diasDeLaSemana[$i]) {
       $diferencia = $diasDeLaSemana[$i] - $diaInicial;
       $fecha0 = clone $fechaTemporal;
       $fecha0->add(new DateInterval('P'.$diferencia.'D'));
       $fecha0->format('Y-m-d');
       echo "Es menor: ". $fecha0->format('Y-m-d')." Diferencia = ". $diferencia." Dia: ".nombreDelDia($diferencia+$diaInicial);
       echo "</br>";
    }
    else{
      $fecha = clone $fechaTemporal;
      echo "Es Igual: ".$fecha->format('Y-m-d')." Dia: ".nombreDelDia($diasDeLaSemana[$i]);
      echo "</br>";
    }
    $contador++;
    $ff->add(new DateInterval('P'.$contador.'D'));
  }

  $ff->add(new DateInterval('P'.$contador.'D'));
  if($contador < sizeof($diasDeLaSemana)){
    for ($i=0; $i < sizeof($diasDeLaSemana)-$contador; $i++) {
      $ff->add(new DateInterval('P'.$contador.'D'));
      if(($diaInicial>$diasDeLaSemana[$i])&&($ff<$fechaFin)){
        $diferencia = $diaInicial - $diasDeLaSemana[$i];
        $fecha1 = clone $fechaTemporal;
        $diferencia = 7 - $diferencia;
        $fecha1->add(new DateInterval('P'.$diferencia.'D'));
        $fecha1->format('Y-m-d');
        echo "Es mayor: ".$fecha1->format('Y-m-d')." Diferencia = ". $diferencia." Dia: ".nombreDelDia(($diaInicial+$diferencia)-7);
        echo "</br>";
      }
    }
  }
}
}*/
}

function nombreDelDia($dia){
  switch ($dia) {
    case 0:
      $fecha = "Domingo";
      break;
    case 1:
    $fecha = "Lunes";
      break;
    case 2:
    $fecha = "Martes";
      break;
    case 3:
    $fecha = "Miercoles";
      break;
    case 4:
    $fecha = "Jueves";
      break;
    case 5:
    $fecha = "Viernes";
      break;
    case 6:
    $fecha = "Sabado";
      break;
  }
  return $fecha;
}

?>
