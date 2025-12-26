window.onload = function () {
  var personaje = JSON.parse(localStorage.getItem("personaje_mostrar"));

  var volver = document.querySelector("button");

  console.log(localStorage);

  var detalles = document.getElementById("detalles");

  detalles.setAttribute("class", "info-principal");

  var planeta = document.getElementsByClassName("planeta")[0];

  var transformaciones = document.querySelector(".transformaciones");

  const url =
    "https://dragonball-api.com/api/characters/" +
    personaje

  console.log(url);

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
    .then(function (personaje) {
      //Capturo y gestiono los datos
      let titulaco = document.createElement("h1");

      titulaco.appendChild(document.createTextNode(personaje.name));

      document.body.insertBefore(titulaco, detalles);

      let descripcion = document.createElement("p");

      descripcion.appendChild(document.createTextNode(personaje.description));

      detalles.appendChild(descripcion);

      let imagen = document.createElement("img");

      imagen.setAttribute("src", personaje.image);

      detalles.appendChild(imagen);

      var nombre_planeta = document.createElement("h3");

      nombre_planeta.appendChild(
        document.createTextNode(personaje.originPlanet.name)
      );

      var descripcion_planeta = document.createElement("p");

      descripcion_planeta.appendChild(
        document.createTextNode(personaje.originPlanet.description)
      );

      var imagen_planeta = document.createElement("img");

      imagen_planeta.setAttribute("src", personaje.originPlanet.image);

      document.body.insertBefore(nombre_planeta, planeta);

      planeta.appendChild(descripcion_planeta);

      planeta.appendChild(imagen_planeta);

      if (personaje.transformations.length > 0) {
        for (const transformacion of personaje.transformations) {
          var articulo = document.createElement("article");

          var nombre_transformacion = document.createElement("h4");

          nombre_transformacion.appendChild(
            document.createTextNode(transformacion.name)
          );

          var imagen_transformacion = document.createElement("img");

          imagen_transformacion.setAttribute("src", transformacion.image);

          var maxKi = document.createElement("h5");

          maxKi.appendChild(document.createTextNode(transformacion.ki));

          articulo.appendChild(nombre_transformacion);

          articulo.appendChild(imagen_transformacion);

          articulo.appendChild(maxKi);

          transformaciones.appendChild(articulo);
        }
      }
    })
    .catch(function (error) {
      alert("Problemas accediendo a la URL: " + error);
    });

  volver.addEventListener("click", function () {
    window.location.href = "index.html";
    localStorage.clear();
  });

  /* for (const dato in personaje) {
        
    }
 */
};
