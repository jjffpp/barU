function seguir(origen,destino,fechaInicio,fechaFin){
  if (! origen > 0){
    alert ("No seleccionó lugar de partida");
    return false;
  }else{
    if (! destino > 0){
      alert ("No seleccionó lugar de destino");
      return false;
    }else{
      if(origen==destino) {
        alert("El origen no puede ser igual al destino");
        return false;
      }
      if(fechaInicio == ""){
        alert("No seleccionó una fecha de inicio")
        return false;
      }
      /*if(fechaFin == ""){
        alert("No seleccionó una fecha de fin")
        return false;
      }*/
      if ((fechaFin < fechaInicio)&&(fechaFin!="")){
        alert ("La fecha de finalizacion no debe ser posterior a la de inicio");
        return false;
      }
    }
  }
  return true;
}

var box = (function () {

  var resultadoOrigen;
  var resultadoDestino;
  var fechaSeleccionadaInicio;
  var fechaSeleccionadaFinal;

  var origen = document.getElementById("origen")
  var destino = document.getElementById("destino")
  var fecha = document.getElementById("fecha")
  var fechaFinal = document.getElementById("fechaFinal")

  var indiceOrigen = origen.selectedIndex;
  var origenIndice;
  var indiceDestino = destino.selectedIndex;
  var destinoIndice;

  var buscar = function(){

    origen.addEventListener('change', function(){
      indiceOrigen = origen.selectedIndex
      origenIndice = origen.options
      resultadoOrigen = origenIndice[indiceOrigen].text;
    })
    destino.addEventListener('change', function(){
      indiceDestino = destino.selectedIndex
      destinoIndice = destino.options
      resultadoDestino = destinoIndice[indiceDestino].text
    })
    fecha.addEventListener('change', function(){
      fechaSeleccionadaInicio = fecha.value
    })
    fechaFinal.addEventListener('change', function(){
      fechaSeleccionadaFinal = fechaFinal.value
    })

  }

  var buscarAction = function(){
    var buscar = document.getElementById("buscar");

    buscar.addEventListener('click', function(){
      if(typeof fechaSeleccionadaFinal === 'undefined'){ fechaSeleccionadaFinal="" }
      if(seguir(indiceOrigen,indiceDestino,fecha.value,fechaFinal.value)){
        if((fecha.value != "")&&(typeof resultadoOrigen !== 'undefined')&&(typeof resultadoDestino !== 'undefined')){
          $.ajax({
            url: 'miBusqueda.php',
            type: 'POST',
            data: { param1: resultadoOrigen,
                    param2: resultadoDestino,
                    param3: fechaSeleccionadaInicio,
                    param4: fechaSeleccionadaFinal
                  },
            success: function(html){
              //console.log(fechaSeleccionada)
              $('#content').html(html);
              //location.reload();
            }
          })
        }else{
          console.log("campos invalidos")
        }
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
