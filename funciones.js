$(document).ready(function(){
  $('#content').load('tarjetas.php');
  //previene la actualización de la página
  event.preventDefault();
  //cargar la pagina correpondiente cada li del ul
  $('ul#ulnav li a').click(function(e){
    var page = $(this).attr('href');
    if (page == 'index') {
      $('#content').load('indexPrueba.html');
      return false;
    }
  });

});


$(window).load(function(){
  $('ul#services button').click(function(e){
    var page = $(this).attr('id');
    var idtarjeta = 'tarjeta'+ page;
    $.ajax({
      url: 'mostrar_detalle_tarjeta.php',
      type: 'GET',
      data: { param1: idtarjeta },
      success: function(html){
        $('#content').html(html).show();
        //$('#content').load('mostrar_detalle_tarjeta.php');
      }
    })
  });
});
