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
        }
      }
    };
    xhttp.open("GET", "server.php", true);
    xhttp.send();
}
