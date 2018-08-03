function irMenuPrincipal() {
    window.location.href = "indexPrimario.php";
}
function validarCampos(){
  modelo = document.getElementById("modelo").value;
  capacidad = document.getElementById("capacidad").value;
  descripcion = document.getElementById("descripcion").value;
  patente = document.getElementById("patente").value;
  patente = patente.toUpperCase();

if (! /^[2-9]+$/.test(capacidad) | ! capacidad != ""){
  alert ("campo capacidad incorrecto");
}else{
  if(!((/[A-Z][A-Z][A-Z] [0-9][0-9][0-9]/.test(patente) && patente.length==7) || (/[A-Z][A-Z] [0-9][0-9][0-9] [A-Z][A-Z]/.test(patente) && patente.length==9)) ){
    alert ("Patente invalida");
  }else{
  if (! modelo != ""){
    alert("No selecciono un Año");
  }else{
    if (! descripcion != ""){
      alert ("campo Modelo en blanco");
    }else{
      alert("el vehiculo se ha creado correctamente!");
      document.getElementById("send").click();
    }
  }
}
}

}
