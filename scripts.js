function comprobarClaveYmayor18() {
  clave1 = document.f1.psw.value;
  clave2 = document.f1.pswrepeat.value;
  nac = new Date(document.getElementById("nacimiento").value);
  hoy = new Date();
  //Esta parte comprueba que las contraseñas sean identicas
  if((clave1!=clave2)||(clave1 == "")||(clave2 == "")){
    document.getElementById("recheck").value = "";
    document.getElementById("recheck").placeholder = "Las contraseñas son invalidas"
    document.getElementById("pass").value = "";
    document.getElementById("pass").placeholder = "Las contraseñas son invalidas";
  }//Si son identicas envia pregunta por la edad
    else{
      anios = parseInt((hoy - nac)/365/24/60/60/1000);
      if (anios >= 18 ){
        document.getElementById("send").click();
      }else{
        document.getElementById("nacimiento").value = "";
        alert("Fecha de nacimiento invalida, recuerde que tiene que ser mayor de 18 años para utilizar AVENTON");
      }
    }
}
function irMenuPrincipal() {
    window.location.href = "indexPrimario.php";
}
