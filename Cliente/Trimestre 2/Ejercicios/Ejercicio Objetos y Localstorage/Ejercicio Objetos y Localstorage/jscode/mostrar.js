window.onload = function () {
  var info = document.getElementById("info");

  var h2 = document.createElement("h2");

  var libro_mostrar = localStorage.getItem("libro_mostrar");

  var titulo = document.createTextNode(libro_mostrar);

  console.log(libro_mostrar);

  var libros = JSON.parse(localStorage.getItem("libros"));

  console.log(libros);

  h2.append(titulo);

  var tablita = document.createElement("table");

  var imagen = document.createElement("img");

  imagen.setAttribute("class", "portada");

  for (const libro of libros) {
    if (libro.title == libro_mostrar) {
      for (const clave in libro) {
        console.log(clave);

        console.log(libro[clave]);

        var fila = document.createElement("tr");

        var celda_clave = document.createElement("td");

        var celda_valor = document.createElement("td");

        if (typeof(libro[clave]) == "object") {
          celda_clave.appendChild(document.createTextNode(clave));
          celda_valor.appendChild(document.createTextNode(libro.author.name));
        } else if (clave != "cover" && clave != "title") {
          celda_clave.appendChild(document.createTextNode(clave));
          celda_valor.appendChild(document.createTextNode(libro[clave]));
        }

        imagen.setAttribute("src", libro.cover);

        fila.appendChild(celda_clave);

        fila.appendChild(celda_valor);

        console.log(fila);
        
        if (fila.firstChild.textContent != "") {
            tablita.appendChild(fila);
        }

        
      }
    }
  }

  info.appendChild(h2);

  info.appendChild(tablita);

  info.appendChild(imagen);
};
