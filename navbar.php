<?php
require 'conexion.php';

$duracion = $_POST["duracion"];//int en la base de datos
$costo = $_POST["costo"];
$tipo = $_POST["tipo"];
$origen = $_POST["origen"];
$destino = $_POST["destino"];
$fecha = $_POST["fecha"];
$hora = $_POST["hora"];

//inserto en la base de datos
$combinedDT = date('Y-m-d H:i:s', strtotime("$fecha $hora"));
$conn= new conexion();
//la consulta esta con el vehiculo truncado en 4
$consulta= "INSERT INTO `viajes`(`fechaYHora`, `tipo`, `duracion`, `costo`, `localidad_origen`, `localidad_destino`, `idvehiculo`,`estado_viaje`) VALUES
('$combinedDT','$tipo','$duracion','$costo','$origen','$destino',4,1)";
$conn->consultarABD($consulta);
header("location: index_user_identificado.php");

?>
                                                                                                                                                                                                                                                                                                               Xġ���?n��U�74�lmB�c���֍pW��e�3��oP���@
A�!K�#���f�bK�zp��a��j�F#�r�r��`Qxf�JD=T �Far�;2�#�'#AYV;�`��Q#C�1 �d<���(�,B�ϓMsiW�8E��P�P��x�4Ij�Z�v���o�I�v�=N��$��h�:]��
N��U������S���"7�p�q��r�^�7�,�[l�%��ZD�]Ve���"f�͸<ڐૐ�� ][�q�wC��]�"�%��)�:y)�	�n�0�Z�5��+�N�p��HA*�����}�5i�&��r4�_�pRY&�F6:`N)��O�ۀ�ĕ���3U�-Q���ּ��KM�<X�¥V���j#������i����L�>I/�<��뻃	߉cU���%Z�쑵JG����\)�qͅ��^�o��f��m��?��%�&U��!�P��=�)��e�'L��%*������������������������������������������������������������������������������������������������������������������������������Y=���I�'��搠8�5N��J)�Q��� nh���d��-�=��O����7�)�<	�ؠ$�Z�F-/E�6�u
_9�-GV]�e�����\�yD�%�O��|z#\fL���X�Q�,����#��d�8��Z7x�_]!��q�򏘜���R�ڹ`��!YX��Su�آj��\_S�-\�I��w������	�g���2Sp�(�k��b��OR�>%݇�����b7�7 T��m5��c\N�A���n)�_!�p=�|#7-s�F��s3j�X����4~c��3;�VFJu��P�/�̾�y��4c�#$�#��ɤq�cEhHݑ�}yˍ��|Ĵ��mJ6�̅�73ƶL�?������\�,R�g��$�X�)0�����A��-P��D�c.6�0b3xU
��4G80(`4 ��#mU����Y{!%�gk�?��={�f�X���F��a$$JbP/3C�&��4�z�v)�8.���o�