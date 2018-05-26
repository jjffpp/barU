<!DOCTYPE html>
<html>

<head>
   <link rel="stylesheet" type="text/css" href="style.css">
   <title>Crear viaje</title>

</head>
<body>
  <div class="f1">
  <form action="formularioAltaViaje.php" method="post">
     <div class="container">
       <h1>Creación de viaje</h1>
       <p>Por favor, complete todos los campos para crear un nuevo viaje</p>
       <hr>
       <label for:"costo"><b>Costo<b><br></label>
       <input type="text" name="costo"/><br/>
       <label for:"duracion"><b>Duracion (redondeo) <b><br></label>
       <input type="text" name="duracion"/><br/>
       <label for:"tipo"><b>Tipo viaje<b><br></label>
       <select name="tipo">
         <option value="" selected="selected"></option>
         <option value="semanal">semanal</option>
         <option value="diario">diario</option>
         <option value="ocacional">ocacional</option>
       </select><br/>
       <label for:"origen"><b>Lugar de partida<b><br></label>
       <select name="origen">
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
         echo "<label for:\"destino\"><b>Lugar de destino<b><br></label>
                <select name=\"destino\">
                <option value=\"\" selected=\"selected\">Elegi un destino</option>";
                mysqli_data_seek($resulQuery,0);
                while($row = mysqli_fetch_assoc($resulQuery)) {
                  echo "<option value=\"" . $row["idlocalidades"] . "\">" . $row["nombre"] . "</option>";
                }
        echo "</select><br/>";
        ?>
        <label for:"fecha"><b>Fecha de partida<b><br></label>
        <input type="date" name="fecha"/><br/>
        <label for:"hora"><b>Hora de partida<b><br></label>
        <input type="time" name="hora"/><br/>
        <div class="botones">
          <button type="button" class="crearViaje">Crear viaje</button>
          <button type="button" class="cancelar">Cancelar</button>
        </div>
      </div>
    </form>
    </div>
  </body>
  </html>
