<?php
require 'conexion.php';

$duracion = $_POST["duracion"];//int en la base de datos
$costo = $_POST["costo"];
$tipo = $_POST["tipo"];
$destino = $_POST["destino"];
$fecha = $_POST["fecha"];
$hora = $_POST["hora"];

if(!validoNumericos($costo, $duracion, $origen, $destino)){
/*echo '<script language="javascript">alert("';
echo "campos en blanco";
echo '");</script>';
*/
header("location: formulario.php");
}else{
	//validacion fecha
	$fecha_actual = date('Y-m-d');
	if ($fecha_actual > $fecha){
			header("location: formulario.php");
	}else{
		//valida hora
			if (empty($hora)){
				header("location: formulario.php");
			}else{
				//valida tipo
				if (empty($tipo)){
					header("location: formulario.php");
				}else{
					//inserto en la base de datos
					$combinedDT = date('Y-m-d H:i:s', strtotime("$fecha $hora"));
					$conn= new conexion();
					//la consulta esta con el vehiculo truncado en 4
					$consulta= "INSERT INTO `viajes`(`fechaYHora`, `tipo`, `duracion`, `costo`, `localidad_origen`, `localidad_destino`, `idvehiculo`) VALUES
					('$combinedDT','$tipo','$duracion','$costo','$origen','$destino',4)";
					$conn->consultarABD($consulta);
					header("location: formulario.php");
			}
		}
	}
}

//validacion blancos y numericos (falta vehiculo aca!)
function validoNumericos ($c, $dur, $o, $des ){
	if (!is_numeric($c)){
		return false;
	}else{
		if (!is_numeric($dur)){
			return false;
		}else{
			if (!is_numeric($o)){
				return false;
			}else{
				if (!is_numeric($des)){
					return false;
				}else{
					return true;
				}
			}
		}
	}
}

?>
