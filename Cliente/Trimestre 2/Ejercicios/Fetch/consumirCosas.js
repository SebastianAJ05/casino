document.querySelector("button").addEventListener("click", function () {
  let salida = document.querySelector("#salida");

  const url = "https://dog.ceo/api/breeds/image/random";

  fetch(url)
    .then(function (respuesta) {
      //Capturo las respuesta
      console.log(respuesta);

      if (!respuesta.ok) {
        throw new Error("Error del fetch :" + respuesta.status);
      }

      //Devuelvo el formato texto o json
      return respuesta.json();
    })
    .then(function (datos) {
      //Capturo y gestiono los datos
      salida.textContent = datos;
      //console.log(datos);

      let res = `<img width='500px' src='${datos.message}'/>`;
      

      salida.innerHTML = res;
    })
    .catch(function (error) {
      alert("Problemas accediendo a la URL: " + error);
    });
});
