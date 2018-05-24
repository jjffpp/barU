<!DOCTYPE html>
<html>

<head></head>
<body>
  <form action="formularioAltaViaje.php" method="post">
    costo: <input type="text" name="costo"/><br/>
    duracion: (numero entero) <input type="text" name="duracion"/><br/>
    tipo viaje: <select name="tipo">
      <option value="" selected="selected"></option>
      <option value="semanal">semanal</option>
      <option value="diario">diario</option>
      <option value="ocacional">ocacional</option>
    </select><br/>
    lugar de partida: <select name="origen">
      <option value="" selected="selected">Elegi un origen</option>
      <?php
      require 'conexion.php';
      $conn= new conexion();
      $consulta = "select idlocalidades, nombre from Localidades order by nombre asc";
      $resulQuery = $conn->consultarABD($consulta);
      while($row = mysqli_fetch_assoc($resulQuery)) {
        echo "<option value=\"" . $row["idlocalidades"] . "\">" . $row["nombre"] . "</option>";
      }
      echo "</select><br/>";
      echo "lugar de destino: <select name=\"destino\">
      <option value=\"\" selected=\"selected\">Elegi un destino</option>";
      mysqli_data_seek($resulQuery,0);
      while($row = mysqli_fetch_assoc($resulQuery)) {
        echo "<option value=\"" . $row["idlocalidades"] . "\">" . $row["nombre"] . "</option>";
      }
      echo "</select><br/>";
      ?>
      fecha de partida: <input type="date" name="fecha"/><br/>
      Hora de partida: <input type="time" name="hora"/><br/>
      <input type="submit" value="crear viaje"/>
    </form>

  </body>
  </html>
