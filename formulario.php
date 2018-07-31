<!DOCTYPE html>

<?php include "navbar.php" ?>
<html lang="en" dir="ltr">
<head>

  <script>
            function comprobarFechaInicial(fecha) {
              if(comprobarQueNoSeaPasado(fecha)){
                seleccionaDia(fecha);
              }

            }

            function comprobarQueSePueda(botoncito) {
              if(document.getElementById('fecha2').value == '' || document.getElementById('fecha3').value == '' ){
                alert("Debe ingresar primero una fecha inicial y una fecha final");
                botoncito.checked=false;
              }
              else
              {
                  var estadoBoton = botoncito.checked;
                  seleccionaDia(document.getElementById("fecha2"));
                  seleccionaDia(document.getElementById("fecha3"));
                  if(botoncito.checked != estadoBoton) {
                    alert("No puede desmarcar este boton, corresponde a un dia de semana de su fecha inicial y/o final");
                  }
              }
            }
            function comprobarFechaFinal(fecha){

              var fechaInicial= document.getElementById("fecha2");
              var fechaFinal= document.getElementById("fecha3");
              if(fechaInicial.value == ''){ alert("Ingrese primero una fecha inicial"); fechaFinal.value='';  return false;}
              var partes = fechaInicial.value.split('-');
              var partes2 = fechaFinal.value.split('-');
              var fechaInicialDate = new Date(partes[0], partes[1]-1, partes[2]);
              var fechaFinalDate = new Date(partes2[0], partes2[1]-1, partes2[2]);
              if(fechaFinalDate<fechaInicialDate){
                alert("La fecha final no puede ser anterior a la inicial, ingrese una fecha valida");
                fechaFinal.value='';
              }
              seleccionaDia(fecha);

            }
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
            function seleccionaDia(fecha) {
              var partes = fecha.value.split('-');
              date = new Date(partes[0], partes[1]-1, partes[2]);

              switch (date.getDay()) {
                case 1: document.getElementById("lunes").checked = true;
                        //document.getElementById("lunes").disabled= true;

                  break;
                  case 2: document.getElementById("martes").checked = true;
                          //document.getElementById("martes").disabled= true;

                    break;
                    case 3: document.getElementById("miercoles").checked = true;
                            //document.getElementById("miercoles").disabled= true;

                      break;
                      case 4: document.getElementById("jueves").checked = true;
                              //document.getElementById("jueves").disabled= true;

                        break;
                        case 5: document.getElementById("viernes").checked = true;
                                //document.getElementById("viernes").disabled= true;

                          break;
                          case 6: document.getElementById("sabado").checked = true;
                                  //document.getElementById("sabado").disabled= true;

                            break;
                            case 0: document.getElementById("domingo").checked = true;
                                    //document.getElementById("domingo").disabled= true;

                              break;
                default:

              }
            }
            function actualizarFront(sel){
                var seleccion = document.getElementById("days");
                if((sel.value=="semanal")||  (sel.value=="ocacional")){
                  document.getElementById("hora2").style.display="block";
                }
                else{
                  document.getElementById("hora2").style.display="none";
                }
              if(sel.value=="semanal"){
                document.getElementById('fecha').disabled=true;
               seleccion.style.display = "block";}
              else
              {
                seleccion.style.display = "none";
              }
              if(sel.value=="ocacional")
              {
                  document.getElementById('fecha2').disabled=true;
                  document.getElementById('fecha3').disabled=true;
                  document.getElementById('lunes').disabled=true;
                  document.getElementById('martes').disabled=true;
                  document.getElementById('miercoles').disabled=true;
                  document.getElementById('jueves').disabled=true;
                  document.getElementById('viernes').disabled=true;
                  document.getElementById('sabado').disabled=true;
                  document.getElementById('domingo').disabled=true;
                  document.getElementById('oca').style.display="block";
              }
              else {

                   document.getElementById("oca").style.display="none";
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
    <?php generarNavbar();
      if(isset($_GET['fechaSuperpuesta'])){
          if($_GET['fechaSuperpuesta']= 'true'){
            $message = "Fecha superpuesta con otro viaje previamente creado";
            echo "<script type='text/javascript'>alert('$message');</script>";
            //echo '<br><b>fechas superpuestas con otro viaje!<b><br>';
          }
      }
    ?>
  <form action="formularioAltaViaje.php" method="post" id="formulario">
     <div class="container">
       <h1>Creación de viaje</h1>
       <p>Por favor, complete todos los campos para crear un nuevo viaje</p>
       <hr>
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
                echo "</select>";
                $id= $_SESSION['idUsuario'];
                $consulta = "SELECT vehiculo.idVehiculo, vehiculo.descripcion FROM vehiculo INNER JOIN usuarios ON vehiculo.owner = usuarios.idUsuario WHERE usuarios.idUsuario = '$id'";
                $resulQuery = $conn->consultarABD($consulta);


                echo "<label for:\"vehiculo\"><b>Seleccione el vehiculo<b><br></label>
                       <select name=\"vehiculo\" id=\"vehiculo\">";
                       while($row = mysqli_fetch_assoc($resulQuery)) {
                         echo "<option value=\"" . $row["idVehiculo"] . "\">" . $row["descripcion"] . "</option>";
                       }
                echo "</select><br/>";

               ?>

               <label for:"tipo"><b>Tipo viaje<b><br></label>
               <select name="tipo" onchange="actualizarFront(this)" id="tipo">
                 <option value="" selected="selected">Seleccione tipo de viaje</option>
                 <option value="semanal">semanal</option>
                 <option value="ocacional">ocacional</option>
               </select><br/>

               <div class="days" id="days">



            <label for:"fecha2"><b>Fecha de partida inicial<b><br></label>
            <input type="date" id="fecha2" onchange="comprobarFechaInicial(this)" name="fecha2"/><br/>


            <label for:"fecha3"><b>Fecha de ultima partida<b><br></label>
            <input type="date" id="fecha3" onchange="comprobarFechaFinal(this)" name="fecha3"/><br/>


            <p>Seleccione que dias de la semana desea realizar su viaje</p>

            <div class="" id="botonera">

<label>
<input type="checkbox" onclick="comprobarQueSePueda(this)" id="domingo" value="0" name="days[]"> Domingo
<label>
<input type="checkbox" onclick="comprobarQueSePueda(this)" id="lunes" value="1" name="days[]"> Lunes
</label>
<label>
<input type="checkbox" onclick="comprobarQueSePueda(this)" id="martes"value="2" name="days[]"> Martes
</label>
<label>
<input type="checkbox" onclick="comprobarQueSePueda(this)" id="miercoles"value="3" name="days[]"> Miercoles
</label>
<label>
<input type="checkbox" onclick="comprobarQueSePueda(this)" id="jueves"value="4" name="days[]"> Jueves
</label>
<label>
<input type="checkbox" onclick="comprobarQueSePueda(this)" id="viernes" value="5" name="days[]"> Viernes
</label>
<label>
<input type="checkbox" onclick="comprobarQueSePueda(this)" id="sabado" value="6" name="days[]"> Sabado
</label>
</label><br>

</div>
    <hr>
          </div>
            <div class="oca" id="oca" style="display:none">
            <label for:"fecha"><b>Fecha de partida<b><br></label>
            <input type="date" id="fecha" onchange="comprobarFechaInicial(this)" name="fecha"/><br/>
          </div>
          <div class="hora2" id="hora2" style="display:none">

            <label for:"hora"><b>Hora de partida<b><br></label>

                      <input type="time" id="hora" name="hora"/><br/>
            <label for:"duracion"><b>Duracion (en hs) <b><br></label>

              <input type="float" id="duracion" name="duracion"/><br/>
            <label for:"costo" ><b>Costo<b><br></label>

                     <input type="float" id="costo" name="costo"/><br/>

          </div>

        <div class="botones">
          <button type="button" onclick="validarCampos()" class="button crearViaje">Crear Viaje</button>
          <button type="submit" id="send" style="display:none;"></button>
          <button type="button" onclick="irMenuPrincipal()" class="button cancelar">Cancelar</button>
        </div>
      </div>
    </form>
    <?php echo imprimir_footer(); ?>
  </body>
  </html>
