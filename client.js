function sumarAlViaje(button){

}

function comprobarCondiciones() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //document.getElementById("respuesta").innerHTML = this.responseText;
        var resultado = this.responseText;
        if(resultado == 'true')
        {
          //SE CARGA LA PAGINA DE CREACION DE VIAJE
          window.location.href = "formulario.php";
        }
        else
        {
          //SE INFORMA LA CONDICION NO CUMPLIDA
          alert("Usted debe primero registar un vehiculo");
        }
      }
    };
    xhttp.open("GET", "server.php", true);
    xhttp.send();
}
function comprobarCondicionesBorrarVehiculo() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //document.getElementById("respuesta").innerHTML = this.responseText;
        var resultado = this.responseText;
        if(resultado == 'true')
        {
          //SE CARGA LA PAGINA DE CREACION DE VIAJE
          window.location.href = "borrarVehiculoFront.php";
        }
        else
        {
          //SE INFORMA LA CONDICION NO CUMPLIDA
          alert("Usted debe primero registar un vehiculo");
        }
      }
    };
    xhttp.open("GET", "server.php", true);
    xhttp.send();
}
