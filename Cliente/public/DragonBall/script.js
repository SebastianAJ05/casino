window.onload = function () {
  let campo_dinero = document.getElementById("dinero_usuario");
  let info = document.querySelector("#botones");

  const url = "https://dragonball-api.com/api/characters?limit=58";

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
      console.log(datos.items);

      let indiceRandomCorrecto = parseInt(Math.random() * 58);

      let personajeCorrecto = datos.items[indiceRandomCorrecto];

      let personajesObtenidos = [];

      let indicesObtenidos = [indiceRandomCorrecto];

      for (let i = 1; i <= 3; i++) {
        let indiceRandomFalso = parseInt(Math.random() * 58);

        if (indicesObtenidos.includes(indiceRandomFalso)) {
          i--;
          continue;
        } else {
          indicesObtenidos.push(indiceRandomFalso);
          personajesObtenidos.push(datos.items[indiceRandomFalso]);
        }
      }

      console.log(personajeCorrecto);

      console.log(personajesObtenidos);

      personajesObtenidos.push(personajeCorrecto);

      let imagenPersonaje = document.getElementById("imagenPersonaje");

      imagenPersonaje.setAttribute("src", personajeCorrecto.image);

      imagenPersonaje.setAttribute("id", personajeCorrecto.id);

      function barajar(array) {
        let m = array.length;
        while (m) {
          const i = Math.floor(Math.random() * m--);
          [array[m], array[i]] = [array[i], array[m]];
        }
        return array;
      }

      personajesObtenidos = barajar(personajesObtenidos);

      for (const personajeFalso of personajesObtenidos) {
        let boton = document.createElement("button");

        boton.textContent = personajeFalso.name;

        boton.setAttribute("id", personajeFalso.id);

        boton.addEventListener("click", function () {
          console.log(personajeCorrecto);
          console.log(boton);

          if (personajeCorrecto.id == this.id) {
            alert("Has acertado");
            boton.classList.add("correct");

            //Suma monedas
            campo_dinero.textContent = parseInt(campo_dinero.textContent) + 1;
            campo_dinero.classList.toggle("up");
          } else {
            alert("Has fallado");
            //Resta monedas
            campo_dinero.textContent = parseInt(campo_dinero.textContent) - 1;
            campo_dinero.classList.toggle("down");
          }
          location.reload();
        });

        info.appendChild(boton);
      }
    })
    .catch(function (error) {
      alert("Problemas accediendo a la URL: " + error);
    });
};
