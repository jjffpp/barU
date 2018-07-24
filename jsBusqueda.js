var box = (function () {

  var resultadoOrigen;
  var resultadoDestino;
  var fechaSeleccionada;

  var buscar = function(){
    var origen = document.getElementById("origen")
    var destino = document.getElementById("destino")
    var fecha = document.getElementById("fecha")

    origen.addEventListener('change', function(){
      var indiceOrigen = origen.selectedIndex
      var origenIndice = origen.options
      resultadoOrigen = origenIndice[indiceOrigen].text;
    })
    destino.addEventListener('change', function(){
      var indiceDestino = destino.selectedIndex
      var destinoIndice = destino.options
      resultadoDestino = destinoIndice[indiceDestino].text
    })
    fecha.addEventListener('change', function(){
      fechaSeleccionada = fecha.value
      console.log(fechaSeleccionada)
    })

  }

  var buscarAction = function(){
    var buscar = document.getElementById("buscar");
    buscar.addEventListener('click', function(){
      if((typeof fechaSeleccionada !== 'undefined')&&(typeof resultadoOrigen !== 'undefined')&&(typeof resultadoDestino !== 'undefined')){
        $('#content').load('misviajes.php');
      }
    })
  }

  return {
    init: buscar,
    find: buscarAction
  }
})();

box.init();
box.find();
