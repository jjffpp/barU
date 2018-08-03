function countMyself(reset) {
    if ( typeof countMyself.counter == 'undefined' ) {
        countMyself.counter = 0;
    }
    if(reset == 0){
      countMyself.counter = 0;
      return countMyself.counter;
    }
    return ++countMyself.counter;
}
function comprobacionPositiva(obj,idviaje,idSesion){
  var id = obj.id;
  var columna = document.getElementsByClassName(id.toString())
  $.ajax({
    url: 'puntuacionInsertar.php',
    type: 'POST',
    data: { param1: obj.id,
            param2: idviaje,
            param3: idSesion
          },
    success: function(cantidadViajerosEnElViaje){
      let h = countMyself(1);
      console.log(h)
      if(h == cantidadViajerosEnElViaje -1){
        countMyself(0);
        columna[0].classList.add('hidden')
        var columnaFin = document.querySelector('.finalizado');
        columnaFin.classList.remove('hidden');
        var delay = 1000;
        setTimeout(function(){ window.location = "index_mis_viajes.php"; }, delay)
      }
      columna[0].classList.add('hidden')
    }
  })

}
function comprobacionNegativa(obj,idviaje,idSesion){
  var id = obj.id / 10;
  var columna = document.getElementsByClassName(id.toString())
  $.ajax({
    url: 'puntuacionInsertar.php',
    type: 'POST',
    data: { param1: obj.id,
            param2: idviaje,
            param3: idSesion
          },
    success: function(cantidadViajerosEnElViaje){
      let h = countMyself(1);
      console.log(h);
      if(h == cantidadViajerosEnElViaje -1){
        countMyself(0);
        columna[0].classList.add('hidden')
        var columnaFin = document.querySelector('.finalizado');
        columnaFin.classList.remove('hidden');
        var delay = 1000;
        setTimeout(function(){ window.location = "index_mis_viajes.php"; }, delay)
      }
      columna[0].classList.add('hidden')
    }
  })
}
