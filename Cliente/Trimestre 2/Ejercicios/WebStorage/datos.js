window.onload = function () {
  let datos = document.getElementById("datos");

  for (let i = 0; i < sessionStorage.length; i++) {
    if (sessionStorage.length > 0) {
      var tupla = document.createElement("p");

      var texto = document.createTextNode(
        sessionStorage.key(i) +
          " : " +
          sessionStorage.getItem(sessionStorage.key(i))
      );

      tupla.appendChild(texto);

      datos.appendChild(tupla);
    }
  }

  let borrado = document.getElementById("borrar");

  borrado.addEventListener("click", function () {
    sessionStorage.clear();
    datos.textContent = "";
  });

  console.log(sessionStorage);
};
