<?php

  $parametro = $_GET['param1'];

?>
  <div class='container'>
    <article id='main-col'>
      <h1></h1>
      <ul id='services'>
        <li>
          <div class='card' style='width: 18rem;'>
            <div class='card-body'>
              <h5 class='card-title'>Origen: </h5>
              <h6 class='card-subtitle mb-2 text-muted'><?php echo $parametro ?></h6>
              <h5 class='card-title'>Destino</h5>
              <h6 class='card-subtitle mb-2 text-muted'><?php echo $parametro ?></h6>
              <h5 class='card-title'>Chofer</h5>
              <h6 class='card-subtitle mb-2 text-muted'><?php echo $parametro ?></h6>
              <h5 class='card-title'>Fecha de Inicio</h5>
              <h6 class='card-subtitle mb-2 text-muted'><?php echo $parametro ?></h6>
              <h5 class='card-title'>Fecha de Finalizacion</h5>
              <h6 class='card-subtitle mb-2 text-muted'><?php echo $parametro ?></h6>
              <h5 class='card-title'>Tipo de Viaje</h5>
              <h6 class='card-subtitle mb-2 text-muted'><?php echo $parametro ?></h6>
              <h5 class='card-title'>Asientos Disponibles</h5>
              <h6 class='card-subtitle mb-2 text-muted'><?php echo $parametro ?></h6>
              <h5 class='card-title'>Capacidad del Vehiculo</h5>
              <h6 class='card-subtitle mb-2 text-muted'><?php echo $parametro ?></h6>
              <h5 class='card-title'>Precio Por Persona</h5>
              <h6 class='card-subtitle mb-2 text-muted'><?php echo $parametro ?></h6>
              <button type='button' class='btn btn-warning btn-md' name='button'>Darse de baja</button>
            </div>
          </div>
        </li>
      </ul>
    </article>
  </div>
