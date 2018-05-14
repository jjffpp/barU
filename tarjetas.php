<?php

  echo "<div class='container'>";
  echo "<article id='main-col'>";
  echo "<h1 class='page-title'>Viajes Recomendados</h1>";
  echo "<ul id='services'>";

  for ($i=0; $i < 10; $i++) {
    echo "<li>";
    echo "<div class='card' style='width: 18rem;''>";
    echo "<div class='card-body'>";
    echo "<h5 class='card-title'>Card title</h5>";
    echo "<h6 class='card-subtitle mb-2 text-muted'>Card subtitle</h6>";
    echo "<p class='card-text'>$i</p>";
    echo "<button type='button' class='btn btn-success btn-md' name='button'>acceder</button>";
    echo "<button type='button' class='btn btn-warning btn-md' name='button'>cancelar</button>";
    echo "</div>";
    echo "</div>";
    echo "</li>";
  }

  echo "</ul>";
  echo "</article>";
  echo "</div>";
 ?>
