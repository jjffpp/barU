$(document).ready(function(e){

  //evento que dispara a cada opcion del navbar
  $('ul#ulnav li a').click(function(e){
    var page = $(this).attr('href');
    if (page == 'index') {
      $('#content').load('indexPrueba.html');
      return false;
    }
  });


  //carga las tarjetas de viajes recomendados
  $('#content').load('archivosphp/viajesRecomendados.php');

  //dispara la tarjeta completa del viaje del cual se clickea
  $('body').on('click','ul#services button',function(e){
    var page = $(this).attr('id');
    //boton de detalle_tarjeta
    if(page == 'bajaviaje'){
      $('#content').load('archivosphp/viajesRecomendados.php');
      location.reload();
    }else{
    $.ajax({
      url: 'archivosphp/mostrar_detalle_tarjeta.php',
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

});
