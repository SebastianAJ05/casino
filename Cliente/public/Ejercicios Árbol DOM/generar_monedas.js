let timer;

window.onload = function () {
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
