<!DOCTYPE html>
<?php include "navbar.php" ?>
<?php include_once "consultas_bd.php" ?>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/styleexample.css">
</head>

<body>
  <?php generarNavbar(); ?>
  <div style="margin-top:50px">
    <div class="container">
      <div class="row">


        <?php
        $resultado = consultarPasajerosDelViaje();
        //echo $resultado->num_rows;
        while ($fila = $resultado->fetch_assoc()) {
            //print_r($_SESSION["idUsuario"]);
            if($_SESSION["idUsuario"] != $fila['id_user']){
              echo "
                <div class='col-lg-12 columna ".$fila['id_user']."'>
                  <div class='row'>
                    <div class='col-lg-5 bg-warning border border-danger text-center margen-andres'>
                      <label class='m-5'>" .$fila['nombre_user']." ".$fila['apellido_user']. "</label>
                    </div>
                    <div class='col-lg-2'>

                    </div>
                    <div class='col-lg-2 text-center'>
                      <button id='".$fila['id_user']."' onclick='comprobacionPositiva(this)' type='button' class='btn btn-success buttonGreen btn-sm positivo' name='button'>+</button>
                    </div>
                    <div class='col-lg-2 text-center'>
                      <button id='".$fila['id_user']*10 ."' onclick='comprobacionNegativa(this)' type='button' class='btn btn-danger buttonRed btn-sm negativo' name='button'>-</button>
                    </div>
                  </div>
                </div>
                <div class='col-lg-12' style='margin:10px;''></div>
            ";
            }

        }
        ?>
      </div>

    </div>
  </div>

  <?php echo imprimir_footer(); ?>
  <script>
    function comprobacionPositiva(obj){
      var id = obj.id;
      console.log(id/10)
      var columna = document.getElementsByClassName(id.toString())
      $.ajax({
        url: 'puntuacionInsertar.php',
        type: 'POST',
        data: { param1: obj.id,},
        success: function(html){

        }
      })
      columna[0].classList.add('hidden')
    }
    function comprobacionNegativa(obj){
      var id = obj.id / 10;
      console.log(obj.id)
      console.log(id)
      var columna = document.getElementsByClassName(id.toString())
      $.ajax({
        url: 'puntuacionInsertar.php',
        type: 'POST',
        data: { param1: obj.id,},
        success: function(html){

        }
      })
      console.log(columna)
      columna[0].classList.add('hidden')
    }

  </script>
</body>

</html>
