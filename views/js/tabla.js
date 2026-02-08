window.onload = function () {
  let contador = 0;
  let movimientos = document.getElementById("movimientos");

  let filas = document.getElementsByTagName("tr");
  let celdas = document.getElementsByTagName("td");

  let arriba = document.getElementsByTagName("button")[0];
  let derecha = document.getElementsByTagName("button")[1];
  let abajo = document.getElementsByTagName("button")[2];
  let izquierda = document.getElementsByTagName("button")[3];

  console.log(filas);
  console.log(celdas);

  let celda_pintada = 0;
  celdas[celda_pintada].style.backgroundColor = "aqua";

  arriba.onclick = function () {
    if (celda_pintada < 0 || celda_pintada > celdas.length / filas.length - 1) {
      celdas[celda_pintada].style.backgroundColor = "";
      celda_pintada -= celdas.length / filas.length;
      celdas[celda_pintada].style.backgroundColor = "aqua";

      contador++;
      movimientos.textContent = "Movimientos: " + contador;
    }
  };
  derecha.onclick = function () {
    if ((celda_pintada + 1) % 5 != 0 || celda_pintada == 0) {
      celdas[celda_pintada].style.backgroundColor = "";
      celda_pintada++;
      celdas[celda_pintada].style.backgroundColor = "aqua";

      contador++;
      movimientos.textContent = "Movimientos: " + contador;
    }
  };
  abajo.onclick = function () {
    if (celda_pintada < celdas.length - filas.length || celda_pintada >= celdas.length) {
      celdas[celda_pintada].style.backgroundColor = "";
      celda_pintada += celdas.length / filas.length;
      celdas[celda_pintada].style.backgroundColor = "aqua";

      contador++;
      movimientos.textContent = "Movimientos: " + contador;
    }
  };
  izquierda.onclick = function () {
    if (celda_pintada == celdas.length - 1 || celda_pintada % 5 != 0) {
      celdas[celda_pintada].style.backgroundColor = "";
      celda_pintada--;
      celdas[celda_pintada].style.backgroundColor = "aqua";

      contador++;
      movimientos.textContent = "Movimientos: " + contador;
    }
  };
};
