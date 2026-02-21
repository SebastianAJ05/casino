window.onload = function () {
  let campo_dinero = document.getElementById("dinero_usuario");
  let info = document.querySelector("#botones");

  let exito = null; // Aquí voy a guardar si el usuario ha acertado o no para luego enviarlo al backend y que sume o reste monedas

  // Mensaje de acierto o error
  const mensaje = document.getElementById("mensaje-db");
  const texto = document.getElementById("mensaje-texto");

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

        boton.name = personajeFalso.name;

        boton.addEventListener("click", function () {
          console.log(personajeCorrecto);
          console.log(boton);

          if (personajeCorrecto.id == this.id) {
            boton.classList.add("correct");

            //Suma monedas
            exito = true;
            campo_dinero.classList.toggle("up");
            texto.textContent = `¡Correcto! Era ${personajeCorrecto.name} 🔥`;
            mensaje.classList.remove("oculto");
            mensaje.classList.remove("error");
            mensaje.classList.add("mostrar", "exito");
          } else {
            //Resta monedas
            exito = false;
            campo_dinero.classList.toggle("down");
            texto.textContent = `¡Falso! No Era ${this.name} 🔥`;
            mensaje.classList.remove("oculto");
            mensaje.classList.remove("exito");
            mensaje.classList.add("mostrar", "error");
          }

          fetch(
            "http://localhost/casino/frontController.php?carpeta=public&accion=adivinarPersonaje&controller=Usuario",
            {
              method: "POST",
              body: JSON.stringify({ exito: exito }),
            },
          )
            .then((res) => res.json())
            .then((data) => {
              console.log(data);
              if (data.success) {
                document.getElementById("dinero_usuario").textContent =
                  data.nuevoDinero;
              }
            })
            .catch((err) => {
              console.error("Error al generar moneda:", err);
            });

          const botones = document.querySelectorAll("#botones button");

          botones.forEach((boton) => {
            boton.disabled = true;
          });
        });

        info.appendChild(boton);
      }

      // Botón para recargar la página y jugar de nuevo

      let botonRecargar = document.getElementById("btn-otra-vez");

      botonRecargar.addEventListener("click", function () {
        console.log(exito);

        // Aquí voy a hacer la petición al backend para sumar monedas al usuario
        location.reload();
      });
    })
    .catch(function (error) {
      console.log("Problemas accediendo a la URL: " + error);
    });

  // setTimeout(() => {
  //   mensaje.classList.remove("mostrar", "exito");
  // }, 3000);
};
