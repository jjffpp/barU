<!DOCTYPE html>
<?php include "navbar.php" ?>
<html lang="en" dir="ltr">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width">
   <script src="validarAltaVehiculo.js" type="text/javascript"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <!--<script src="js/jquery-3.3.1.min.js"></script>-->
   <link rel="stylesheet" href="./css/styleexample.css">
   <!--<script type="text/javascript" src="f2.js"></script>-->
   <title>Agregar vehiculo</title>
</head>
<body>
  <?php generarNavbar(); ?>
  <form action="altaVehiculo.php" method="post" id="formulario">
     <div class="container">
       <h1>Agregar vehiculo</h1>
       <p>Por favor, complete todos los campos para crear un nuevo vehiculo</p>
       <hr>
       <label for:"capacidad"><b>Capacidad<b><br></label>
       <input type="number" id="capacidad" name="capacidad"/><br/>
       <label for:"modelo" ><b>Año <b><br></label>
       <select name="modelo" id="modelo">
         <option value="" selected="selected">seleccione año del vehiculo</option>
         <?php
         for ($i = 2000; $i <= 2018; $i++) {
           echo "<option value=\"" .$i. "\">" . $i . "</option>";
         }
         ?>
       </select><br/>
       <label for:"descripcion"><b>Modelo (ej: chevrolet corsa)<b><br></label>
       <input type="text" id="descripcion" name="descripcion"/><br/>
        <div class="botones">
          <button type="button" onclick="validarCampos()" class="crearViaje">Crear vehiculo</button>
          <button type="submit" id="send" style="display:none;"></button>
          <button type="button" onclick="irMenuPrincipal()" class="cancelar">Cancelar</button>
        </div>
      </div>
    </form>
    <?php echo imprimir_footer(); ?>
  </body>
  </html>
