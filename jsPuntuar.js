function comprobacionPositiva(obj,idviaje,idSesion){
  var id = obj.id;
  console.log(id/10)
  console.log(idviaje)
  console.log(idSesion)
  var columna = document.getElementsByClassName(id.toString())
  $.ajax({
    url: 'puntuacionInsertar.php',
    type: 'POST',
    data: { param1: obj.id,
            param2: idviaje,
            param3: idSesion
          },
    success: function(html){

    }
  })
  columna[0].classList.add('hidden')
  var columnaFin = document.querySelector('.finalizado');
  columnaFin.classList.remove('hidden');
}
function comprobacionNegativa(obj,idviaje,idSesion){
  var id = obj.id / 10;
  console.log(obj.id)
  console.log(id)
  var columna = document.getElementsByClassName(id.toString())
  $.ajax({
    url: 'puntuacionInsertar.php',
    type: 'POST',
    data: { param1: obj.id,
            param2: idviaje,
            param3: idSesion
          },
    success: function(html){

    }
  })
  console.log(columna)
  columna[0].classList.add('hidden')
  var columnaFin = document.querySelector('.finalizado');
  columnaFin.classList.remove('hidden');
}
