let timer;

window.onload = function () {
  let vecesGeneradas = parseInt(localStorage.getItem("monedas_generadas")) || 0;
  let monedas_generadas = document.querySelector("#monedas_generadas");
  monedas_generadas.textContent = vecesGeneradas;
  let barra = document.getElementsByTagName("progress")[0];
  let cargar = document.getElementsByTagName("button")[0];
  let div_moneda = document.querySelector("#dinero_usuario");

  cargar.onclick = function () {
    let valor = parseInt(barra.getAttribute("value"));
    let n_monedas = parseInt(div_moneda.textContent);
    cargar.setAttribute("disabled", true);
    timer = setInterval(function () {
      valor++;
      barra.setAttribute("value", valor);
      if (valor == barra.getAttribute("max")) {
        clearInterval(timer);
        //Toda esta es la parte de la petición para generar la moneda en el backend
        fetch(
          "http://localhost/casino/frontController.php?carpeta=public&accion=generarMoneda&controller=Usuario",
          {
            method: "POST",
            body: JSON.stringify({ exito: true }),
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

        //Hasta aquí la parte de la petición para generar la moneda en el backend
        localStorage.setItem(
          "monedas_generadas",
          (parseInt(localStorage.getItem("monedas_generadas")) || 0) + 1,
        );
        monedas_generadas.textContent =
          parseInt(localStorage.getItem("monedas_generadas")) || 0;
        cargar.disabled = false;
        div_moneda.textContent = n_monedas + 1;
        barra.setAttribute("value", 0);
        div_moneda.classList.remove("coin-earned");
        void div_moneda.offsetWidth; // reinicia animación
        div_moneda.classList.add("coin-earned");
      }
    }, 100);
  };
};
