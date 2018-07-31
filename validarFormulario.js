function volver(){
  window.location.href = "index_user_noidentificado.php";

}


function validarCampos(){
  tipoDeViaje = document.getElementById("tipo").value;
  if(tipoDeViaje=='') {alert("Ingrese el tipo de viaje"); return; }
  costo = document.getElementById("costo").value;
  duracion = document.getElementById("duracion").value;
  tipo = document.getElementById("tipo").value;
  origen = document.getElementById("origen").value;
  destino = document.getElementById("destino").value;
  fecha = document.getElementById("fecha").value;
  hora = document.getElementById("hora").value;

  if ( !/^([0-9])*[.]?[0-9]*$/.test(costo) | ! costo != "" ){
     alert("campos costo incorrecto");
  }else{
      if ( !/^([0-9])*[.]?[0-9]*$/.test(duracion) | ! duracion != "" ){
        alert ("campo duracion incorrecto");
      }else{
        if(document.getElementById("days").style.display == "block"){
        checked = $("input[type=checkbox]:checked").length;
        if(!checked){
          alert("Debe seleccionar por lo menos un dia de la semana en un viaje de tipo semanal");
        }else{
          seguir();
        }
      }else{seguir();}

    }
  }

}
function seguir()
{
if (! tipo != ""){
  alert ("No seleccionó un tipo de viaje");
}else{
  if (! origen > 0){
    alert ("No seleccionó lugar de partida");
  }else{
    if (! destino > 0){
      alert ("No seleccionó lugar de destino");
    }else{
      if(origen==destino) {alert("El origen no puede ser igual al destino");return;}
      var now = new Date();
      var today = new Date(now.getFullYear(), now.getMonth(), now.getDate());
      fecha = new Date(fecha);
      if (fecha < today){
        alert ("fecha en el pasado, ingrese nuevamente la fecha de partida");
      }else{
        if (! hora != ""){
          alert("hora incorrecta, ingrese nuevamente la hora de partida");
        }else{
            document.getElementById("send").click();
        }
      }
    }
  }
}
}
