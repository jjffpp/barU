function bajarseDelViaje(idViaje) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          var myObj = JSON.parse(this.responseText);
          console.log(myObj);
      }
  };
  xmlhttp.open("POST", "bajarse.php", true);
  xmlhttp.send(idViaje);

  // bootbox.confirm("Realmente quiere bajarse del viaje?", function(result){
  //   if(result==true){
  //     fetch("bajarse.php",{method:'post',body:idViaje})
  //     // .then(response => response.json())
  //     .then(data => console.log(data))
  //     }
  //   })
}
function eliminarViaje(idViaje)
{
  bootbox.confirm("Realmente quiere eliminar el viaje?", function(result){ console.log('This was logged in the callback: ' + result); });
}
