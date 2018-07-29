<!DOCTYPE html>
<?php include "navbar.php" ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/styleexample.css">

    <script type="text/javascript" src="client.js"></script>
    <script>

        function comprobarQueNoSeaPasado(fecha) {
          var fechaHoy = new Date();
          var partes = fecha.value.split('-');
          var fechaIngresada = new Date(partes[0], partes[1]-1, partes[2]);
          if(fechaIngresada < fechaHoy){
            alert("Fecha del pasado, ingrese una fecha valida");
            fecha.value= '';
            return false;
          }
          return true;
        }

    </script>
  </head>
  <body>

    <?php generarNavbar(); ?>
    <div class="container">

      <div style="margin-top:50px">

          <div class="row">
            <div class="col-12">

                <div class="">
                  <label for:"origen">Lugar de partida</label>
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
                    echo "<label for:\"destino\">Lugar de destino</label>
                           <select name=\"destino\" id=\"destino\">
                           <option value=\"\" selected=\"selected\">Elegi un destino</option>";
                           mysqli_data_seek($resulQuery,0);
                           while($row = mysqli_fetch_assoc($resulQuery)) {
                             echo "<option value=\"" . $row["idlocalidades"] . "\">" . $row["nombre"] . "</option>";
                           }
                    echo "</select>";?>
                </div>
                <div class="">
                  <label>Fecha Inicial</label>
                  <input type="date" id="fecha" name="fecha"/>
                </div>
                <div class="col-12">
                  <label>Fecha Final (no obligatorio)</label>
                  <input type="date" id="fechaFinal" name="fecha"/>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-md btn-block " id="buscar">Buscar</button>
                </div>

            </div>

            <div class="col-12">
              <div id="content">

              </div>
            </div>

          </div>
        </div>

    </div>
    <script src="jsBusqueda.js">
    </script>
  </body>
</html>
