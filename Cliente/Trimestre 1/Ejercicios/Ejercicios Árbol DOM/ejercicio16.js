let timer;
window.onload = function () {
  let meter = document.getElementsByTagName("meter")[0];
  let barra = document.getElementsByTagName("progress")[0];
  let descargar = document.getElementsByTagName("button")[0];
  let cargar = document.getElementsByTagName("button")[1];

  descargar.onclick = function () {
    let valor = parseInt(meter.getAttribute("value"));
    descargar.setAttribute("disabled",true);
    timer = setInterval(function () {
  
        valor++;
        meter.setAttribute("value", (valor));
        console.log(valor);
        if (valor == meter.getAttribute("max")) {
            clearInterval(timer);
            alert("Barra cargada");
            
            descargar.disabled = false;
        }
    }, 100);
  };

  cargar.onclick = function () {
    let valor = parseInt(barra.getAttribute("value"));
    cargar.setAttribute("disabled",true);
    timer = setInterval(function () {
  
        valor++;
        barra.setAttribute("value", (valor));
        console.log(valor);
        if (valor == barra.getAttribute("max")) {
            clearInterval(timer);
            alert("Barra cargada");
            cargar.disabled = false;
            
        }
    }, 100);
  };
};
