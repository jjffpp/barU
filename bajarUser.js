function bajarseDelViaje($idViaje) {
  bootbox.confirm("Realmente quiere bajarse del viaje?", function(result){ console.log('This was logged in the callback: ' + result); });
}
function eliminarViaje($idViaje)
{
  bootbox.confirm("Realmente quiere eliminar el viaje?", function(result){ console.log('This was logged in the callback: ' + result); });
}
