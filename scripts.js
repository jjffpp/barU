function comprobarClave() {
  clave1 = document.f1.psw.value;
  clave2 = document.f1.pswrepeat.value;
  //Esta parte comprueba que las contraseñas sean identicas
  if(clave1!=clave2){
    document.getElementById("recheck").value = "";
    document.getElementById("recheck").placeholder = "Las contraseñas no coinciden"
    document.getElementById("pass").value = "";
    document.getElementById("pass").placeholder = "Las contraseñas no coinciden";
  }
  //Si son identicas envia el formulario
  else
  {
    document.getElementById("send").click();
  }
}
function irMenuPrincipal() {
    window.location.href = "index_user_noidentificado.php";
}
