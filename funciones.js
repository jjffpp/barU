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
  //carga la página principal al hacer click en la imagen de Aventon
  $('a#imagen').click(function(e){
    $('#content').load('index_user_identificado.html');
    return false;
  });

});
