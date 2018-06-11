<!DOCTYPE html>
<?php include "navbar.php" ?>
<html lang="en" dir="ltr">
<head>

  <script>
            function actualizarFront(sel){
              var seleccion = document.getElementById("days");
              if(sel.value=="semanal"){ seleccion.style.display = "block";}
              else{
                seleccion.style.display = "none";
              }
              }

        </script>
   <meta charset="utf-8">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--<script src="js/jquery-3.3.1.min.js"></script>-->
    <link rel="stylesheet" href="./css/styleexample.css">
   <!--<link rel="stylesheet" type="text/css" href="style.css">-->
   <script src="scripts.js" language="javascript" type="text/javascript"></script>
   <meta charset="utf-8">
  <script src="validarFormulario.js" language="javascript" type="text/javascript"></script>
   <title>Crear viaje</title>
</head>
<body>

    <?php generarNavbar() ?>
  <form action="formularioAltaViaje.php" method="post" id="formulario">
     <div class="container">
       <h1>Creación de viaje</h1>
       <p>Por favor, complete todos los campos para crear un nuevo viaje</p>
       <hr>
       <label for:"costo" ><b>Costo<b><br></label>
       <input type="float" id="costo" name="costo"/><br/>
       <label for:"duracion"><b>Duracion (en hs) <b><br></label>
       <input type="float" id="duracion" name="duracion"/><br/>
       <label for:"tipo"><b>Tipo viaje<b><br></label>
       <select name="tipo" onchange="actualizarFront(this)" id="tipo">
         <option value="" selected="selected">Seleccione tipo de viaje</option>
         <option value="semanal">semanal</option>
         <option value="ocacional">ocacional</option>
       </select><br/>

       <div class="days" id="days">
    <label>
      <input type="checkbox" value="1" name="days"> Lunes
    </label>
    <label>
      <input type="checkbox" value="2" name="days"> Martes
    </label>
    <label>
      <input type="checkbox" value="3" name="days"> Miercoles
    </label>
    <label>
      <input type="checkbox" value="4" name="days"> Jueves
    </label>
    <label>
      <input type="checkbox" value="5" name="days"> Viernes
    </label>
    <label>
      <input type="checkbox" value="6" name="days"> Sabado
    </label>
    <label>
      <input type="checkbox" value="0" name="days"> Domingo
    </label>
    <hr>
  </div>

       <label for:"origen"><b>Lugar de partida<b><br></label>
       <select name="origen" id="origen">
         <option value="" selected="selected">Elegi un origen</option>
         <?php
         require 'conexion.php';
         $conn= new conexion();
         $consulta = "select idlocalidades, nombre from localidades order by nombre asc";
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
          <button type="button" onclick="irMenuPrincipal()" class="cancelar">Cancelar</button>
        </div>
      </div>
    </form>
    <?php echo imprimir_footer(); ?>
  </body>
  </html>
