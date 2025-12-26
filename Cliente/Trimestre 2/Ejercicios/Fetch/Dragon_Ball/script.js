window.onload = function(){
    let info = document.querySelector("#personajes");
  
    const url = "https://dragonball-api.com/api/characters";
  
    fetch(url)
      .then(function(respuesta) {
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
        for (const personaje of datos.items) {
            var articulo = document.createElement("article");

            var titulillo = document.createElement("h2");

            titulillo.appendChild(document.createTextNode(personaje.name));

            var imagen = document.createElement("img");

            imagen.setAttribute("src",personaje.image);

            var raza = document.createElement("h5");

            raza.appendChild(document.createTextNode(personaje.race));

            var maxKi = document.createElement("h5");

            maxKi.appendChild(document.createTextNode(personaje.maxKi));

            articulo.appendChild(titulillo);

            articulo.appendChild(imagen);

            articulo.appendChild(raza);

            articulo.appendChild(maxKi);

            articulo.addEventListener("click",function(){
              localStorage.setItem("personaje_mostrar",personaje.id);

              window.location.href = "personaje.html";
            });

            info.appendChild(articulo);
        }

      })
      .catch(function (error) {
        alert("Problemas accediendo a la URL: " + error);
      });

}
 