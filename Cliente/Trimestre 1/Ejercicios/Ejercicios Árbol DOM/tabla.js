window.onload = function () {
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
    if (celda_pintada >= 0 && celda_pintada <= (celdas.length / filas.length)-1) {
    } else {
      celdas[celda_pintada].style.backgroundColor = "white";
      celda_pintada -= celdas.length / filas.length;
      celdas[celda_pintada].style.backgroundColor = "aqua";
    }
  };
  derecha.onclick = function () {
    if ((celda_pintada+1) % 5 == 0 && celda_pintada != 0) {
    } else {
      celdas[celda_pintada].style.backgroundColor = "white";
      celda_pintada++;
      celdas[celda_pintada].style.backgroundColor = "aqua";
    }
  };
  abajo.onclick = function () {
    if ((celda_pintada >= (celdas.length - filas.length)) && (celda_pintada < celdas.length)) {
        
    }else{
        celdas[celda_pintada].style.backgroundColor = "white";
        celda_pintada += celdas.length / filas.length;
        celdas[celda_pintada].style.backgroundColor = "aqua";
    }
    
  };
  izquierda.onclick = function () {
    if (celda_pintada != celdas.length - 1 && celda_pintada % 5 == 0) {
    } else {
      celdas[celda_pintada].style.backgroundColor = "white";
      celda_pintada--;
      celdas[celda_pintada].style.backgroundColor = "aqua";
    }
  };
};
