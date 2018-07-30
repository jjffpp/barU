function puntuarViaje(idViaje) {
  //idViaje es el id del viaje que estas queriendo puntuar
  //Si llegas a necesitar el id del usuario actual lo podes levantar de $_SESSION en PHP cuando ya hagas la consulta
  //No te calientes por hacerlo con ajax andy, pero si llegas a querer hacerlo fijate como hice yo en el archivo "bajarUser.js" tal vez te sirva, de esa forma no necesitas jquery y creo yo que queda mas prolijo
  $.ajax({
    url: 'puntuar.php',
    type: 'POST',
    data: { param1: idViaje
          },
    success: function(html){
      //console.log(fechaSeleccionada)
      $('#content').html(html);
      //location.reload();
    }
  })
}
