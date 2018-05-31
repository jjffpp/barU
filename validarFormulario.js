function volver(){
  window.location.href = "index_user_identificado.php";
}

function validarCampos(){
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
        if (! tipo != ""){
          alert ("No seleccionó un tipo de viaje");
        }else{
          if (! origen > 0){
            alert ("No seleccionó lugar de partida");
          }else{
            if (! destino > 0){
              alert ("No seleccionó lugar de destino");
            }else{
              var now = new Date();
              var today = new Date(now.getFullYear(), now.getMonth(), now.getDate());
              fecha = new Date(fecha);
              if (fecha < today){
                alert ("fecha en el pasado, ingrese nuevamente la fecha de partida");
              }else{
                if (! hora != ""){
                  alert("hora incorrecta, ingrese nuevamente la hora de partida");
                }else{
                    alert("el viaje se ha creado correctamente!");
                    document.getElementById("send").click();
                }
              }
            }
          }
        }
      }
    }

}
