window.onload = function () {
  var formu = document.forms[0];
  console.log(sessionStorage);
  

  var envio = document.querySelector("input[type='button']");

  envio.addEventListener("click", function () {
    sessionStorage.removeItem("IsThisFirstTime_Log_From_LiveServer");
    console.log(sessionStorage);
    let lista = document.getElementById("lista_elementos");
    var elemento = formu.elements["elemento"];
    if (elemento.value != "") {
      sessionStorage.setItem("clave", elemento.value);
      var li = document.createElement("li");
      var texto = document.createTextNode(
        sessionStorage.getItem(sessionStorage.key("clave"))
      );
      li.appendChild(texto);
      lista.appendChild(li);

      elemento.value = "";
    }
  });
  var borrado = document.getElementById("borrar");
  borrado.addEventListener("click", function () {
    sessionStorage.clear();
    location.reload();
  });
};
