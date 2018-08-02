
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
      console.log(fechaInicio)
      if(typeof fechaInicio === 'undefined'){
        alert("No seleccionó una fecha de inicio")
        return false;
      }
      if(fechaInicio < '2018-01-01'){
        alert("Fecha de Inicio incorrecta")
        return false;
      }

      if ((fechaFin < fechaInicio)&&(fechaFin!="")){
        alert ("La fecha de finalizacion no debe ser posterior a la de inicio");
        return false;
      }
      if(fechaFin > '2100-12-12'){
        alert("Fecha de finalizacion muy extensa. Ingrese nuevamente")
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
  var fecha2 = document.getElementById("fecha2")
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
    fecha2.addEventListener('change', function(){

      fechaSeleccionadaInicio = fecha2.value
      console.log(fechaSeleccionadaInicio)
    })
    fechaFinal.addEventListener('change', function(){
      fechaSeleccionadaFinal = fechaFinal.value

    })
  }
  var sumarseAlViaje = function(){
    $('body').on('click','.sumarse',function(e){

      var page = $(this).attr('id');
      //boton de detalle_tarjeta
      if(page == 'bajaviaje'){
        //$('#content').load('indexPrimario.php');

      }else{
      $.ajax({
        url: 'sumarseAlViaje.php',
        type: 'POST',
        data: { param1: page },
        success: function(html){
          $('#content').html(html);
          //location.reload();
        }
      })
        e.preventDefault();
    }

    });
  }
  var buscarAction = function(){
    var buscar = document.getElementById("buscar");
    buscar.addEventListener('click', function(){
      if(seguir(indiceOrigen,indiceDestino,fechaSeleccionadaInicio,fechaSeleccionadaFinal)){
        if((fechaSeleccionadaInicio != "")&&(typeof resultadoOrigen !== 'undefined')&&(typeof resultadoDestino !== 'undefined')){
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
              $('#content1').html(html);
              //location.reload();
            }
          })
        }else{
          console.log("campos invalidos")
        }
      }
    });
  }

  return {
    init: buscar,
    find: buscarAction,
    sumarse: sumarseAlViaje
  }
})();

box.init();
box.find();
box.sumarse();
