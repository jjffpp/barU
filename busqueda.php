<!DOCTYPE html>
<?php include "navbar.php" ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/styleexample.css">
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
    <div id="content">

    </div>
    <div class="container" id="busquedaContainer">

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
                <div class="col-12 fechaSola">
                  <label >Fecha: </label>
                  <input type="date" id="fecha" name="fecha" class="soloFecha"/ >
                </div>
                <div class="col-12" style="padding-bottom: 20px;">
                  <label>
                    <input type="checkbox" class="entreSemana" > Buscar entre semanas
                  </label>
                </div>
                <div class="col-lg-6 col-md-6 fechaInicio">
                  <label >Fecha de inicio: </label>
                  <input type="date" id="fecha2" name="fecha" class=""/>
                </div>
                <div class="col-lg-6 col-md-6 fechaFinal">
                  <label>Fecha de fin:</label>
                  <input type="date" id="fechaFinal" name="fecha" class=""/>
                </div>
                <div class="form-group">
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-md btn-block " id="buscar">Buscar</button>
                  </div>
                </div>

            </div>

            <div class="col-12">
              <div id="content1">

              </div>
            </div>

          </div>
        </div>

    </div>
    <script src="jsBusqueda.js"></script>
    <script type="text/javascript" src="jsPuntuar.js"></script>
    <script>
    var check = document.querySelector(".entreSemana")
    var fechaI = document.querySelector(".fechaInicio")
    var fechaF = document.querySelector(".fechaFinal")
    var fechaS = document.querySelector(".fechaSola")
    var sfecha = document.querySelector(".fechaSola")
    $(".fechaInicio").hide();
    $(".fechaFinal").hide();
    console.log(check)
    console.log(check.checked)
    check.addEventListener('change', function(){
      if(check.checked){
        $(".fechaSola").hide(1000);
        $(".fechaInicio").show(1000);
        $(".fechaFinal").show(1000);
      }else{
        sfecha.setAttribute("id","fecha");
        $(".fechaSola").show(1000);
        $(".fechaInicio").hide(1000);
        $(".fechaFinal").hide(1000);
      }

    });
    </script>
  </body>
</html>
