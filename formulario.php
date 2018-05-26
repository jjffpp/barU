<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
   <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="style.css">
   <script src="validarFormulario.js" language="javascript" type="text/javascript"></script>
   <title>Crear viaje</title>
</head>
<body>
  <form action="formularioAltaViaje.php" method="post" id="formulario">
     <div class="container">
       <h1>Creación de viaje</h1>
       <p>Por favor, complete todos los campos para crear un nuevo viaje</p>
       <hr>
       <label for:"costo" ><b>Costo<b><br></label>
       <input type="text" id="costo" name="costo"/><br/>
       <label for:"duracion"><b>Duracion (en hs) <b><br></label>
       <input type="text" id="duracion" name="duracion"/><br/>
       <label for:"tipo"><b>Tipo viaje<b><br></label>
       <select name="tipo" id="tipo">
         <option value="" selected="selected"></option>
         <option value="semanal">semanal</option>
         <option value="diario">diario</option>
         <option value="ocacional">ocacional</option>
       </select><br/>
       <label for:"origen"><b>Lugar de partida<b><br></label>
       <select name="origen" id="origen">
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
                <select name=\"destino\" id=\"destino\">
                <option value=\"\" selected=\"selected\">Elegi un destino</option>";
                mysqli_data_seek($resulQuery,0);
                while($row = mysqli_fetch_assoc($resulQuery)) {
                  echo "<option value=\"" . $row["idlocalidades"] . "\">" . $row["nombre"] . "</option>";
                }
         echo "</select><br/>";
        ?>
        <label for:"fecha"><b>Fecha de partida<b><br></label>
        <input type="date" id="fecha" name="fecha"/><br/>
        <label for:"hora"><b>Hora de partida<b><br></label>
        <input type="time" id="hora" name="hora"/><br/>
        <div class="botones">
          <button type="button" onclick="validarCampos()" class="crearViaje">Crear Viaje</button>
          <button type="submit" id="send" style="display:none;"></button>
          <button type="button" class="cancelar">Cancelar</button>
        </div>
      </div>
    </form>
    <script type="text/javascript" src="formularioCorrecto()">
    </script>
  </body>
  </html>
