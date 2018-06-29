function irMenuPrincipal() {
    window.location.href = "indexPrimario.php";
}
function validarCampos(){
  modelo = document.getElementById("modelo").value;
  capacidad = document.getElementById("capacidad").value;
  descripcion = document.getElementById("descripcion").value;

if (! /^[2-9]+$/.test(capacidad) | ! capacidad != ""){
  alert ("campo capacidad incorrecto");
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
