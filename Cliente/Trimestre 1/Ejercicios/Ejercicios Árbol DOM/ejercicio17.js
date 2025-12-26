let timer;
window.onload = function () {
  let divs = document.querySelectorAll("div");
  console.log(divs);

  let apuestas = document.querySelectorAll("div button");
  let correr = document.querySelector("#run");
  let posicion;
  let caballo_apuesta;
  let output = document.getElementById("apuesta");
  let tam_pantalla = screen.availWidth;
  console.log(tam_pantalla);

  for (let div of divs) {
    div.style.left = "0px";
  }

  for (const apuesta of apuestas) {
    apuesta.onclick = function () {
      caballo_apuesta = apuesta.parentNode.id;
      console.log(caballo_apuesta);
      output.innerText = `Has apostado por ${caballo_apuesta}\n`;
      console.log(apuesta.parentNode.children);
    };
  }
  correr.onclick = function () {
    if (!caballo_apuesta || caballo_apuesta == null) {
      alert("No has elegido caballo a apostar");
    } else {
      for (let div of divs) {
        const titulo = div.querySelector("h3");
        const boton = div.querySelector("button");

        if (titulo) titulo.remove();
        if (boton) boton.remove();
      }

      timer = setInterval(function () {
        for (let div of divs) {
          let avance = parseInt(Math.random() * 50 - 10 + 1) + 10;
          posicion = parseInt(
            div.style.left.substring(0, div.style.left.indexOf("p"))
          );

          //console.log("Posicion: " + posicion);
          div.style.left = parseInt(posicion + avance) + "px";
          //console.log("Nueva posicion: " + div.style.left);
          if (posicion >= screen.availWidth - div.clientWidth) {
            clearInterval(timer);
            alert("Carrera terminada");

            //Mete aquí la comparación de la apuesta

            if (div.id == caballo_apuesta) {
              output.classList.add("victoria");
              output.innerText =
                "Tu caballo " + caballo_apuesta+" ha ganado\n";
              //Suma el dinero cuando tengas lo del dinero hecho
            } else {
              output.classList.add("derrota");
              output.innerText =
                "Tu caballo: " +
                caballo_apuesta +
                " ha perdido. Ha ganado " +
                div.id+"\n";
              // Y aquí restalo
            }
          }
        }
      }, 500);
    }
  };

  let resetear = document.querySelector("#reset");
  resetear.onclick = function () {
    clearInterval(timer);
    location.reload();
  };
};
