$(document).ready(function(e){

  //carga las tarjetas de viajes recomendados
  $('#content').load('ViajesPantallaPrincipal.php');
  //dispara la tarjeta completa del viaje del cual se clickea
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
      window.location = "indexPrimario.php";
        //$('#content').html(html);
      }
    })
      e.preventDefault();
  }

  });

});
