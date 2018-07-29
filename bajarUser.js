function bajarseDelViaje(idViaje) {
  bootbox.confirm("Realmente quiere bajarse del viaje?", function(result){
  if(result==true){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          console.log("user borrado del viaje");
          location.reload();
      }
  };
  xmlhttp.open("POST", "bajarse.php", true);
  xmlhttp.send(idViaje);
  }
});
}

function eliminarViaje(idViaje)
{
  bootbox.confirm("Realmente desea eliminar el viaje? Esta operacion bajara a todos los pasajeros", function(result){
    if(result==true){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log("user borrado del viaje");
            location.reload();
        }
    };
    xmlhttp.open("POST", "eliminarViaje.php", true);
    xmlhttp.send(idViaje);
    }
   });
}
