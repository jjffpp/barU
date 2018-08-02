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

function aceptar(userId,viajeId) {
  console.log(`${userId}+${viajeId}`)
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
           window.location = "detalle-viaje.php";
      }
  };
  xmlhttp.open("POST", "aceptar.php", true);
  xmlhttp.send(`${userId}-${viajeId}`);
}

function rechazar(userId,viajeId) {
  console.log(`${userId}+${viajeId}`)
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
           window.location = "detalle-viaje.php";
      }
  };
  xmlhttp.open("POST", "rechazar.php", true);
  xmlhttp.send(`${userId}-${viajeId}`);
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
