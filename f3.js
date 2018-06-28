$(document).ready(function(e){

  //carga las tarjetas de viajes recomendados
  $('#content').load('misviajes.php');
  //dispara la tarjeta completa del viaje del cual se clickea
  $('body').on('click','ul#services button',function(e){
    var page = $(this).attr('id');
    //boton de detalle_tarjeta
    if(page == 'bajaviaje'){
      //$('#content').load('indexPrimario.php');

    }/*else{
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
  }*/

  });

});
