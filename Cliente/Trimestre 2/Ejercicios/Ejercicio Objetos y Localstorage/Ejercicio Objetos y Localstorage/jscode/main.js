window.onload = function () {
  let h1 = document.getElementsByTagName("h1")[0];

  console.log(localStorage);

  if (localStorage.length == 0) {
    localStorage.setItem("libros", JSON.stringify(library));
  }

  console.log(localStorage.getItem("libros"));

  let texto_h1 = document.createTextNode(
    "Hay " +
      JSON.parse(localStorage.getItem("libros")).length +
      " libros en la biblioteca"
  );

  for (const book of library) {
    var libro = JSON.stringify(book);

    localStorage.setItem(book.title, libro);
    localStorage.removeItem(book.title, libro);
  }

  console.log(JSON.parse(localStorage.getItem("libros")));

  h1.appendChild(texto_h1);

  let seccion = document.getElementsByTagName("section")[0];

  localStorage.removeItem("libro_mostrar");

  localStorage.removeItem("Marina");

  var libros = JSON.parse(localStorage.getItem("libros"));

  console.log(libros);

  for (const libro of libros) {
    var articulo = document.createElement("article");

    var titulo = document.createTextNode(libro.title);

    console.log(titulo);

    var h3 = document.createElement("h3");

    h3.appendChild(titulo);

    articulo.setAttribute("class", "presentacion");

    articulo.appendChild(h3);

    let imagen = document.createElement("img");

    imagen.setAttribute("src", libro.cover);

    articulo.appendChild(imagen);

    articulo.addEventListener("click", function () {
      localStorage.setItem("libro_mostrar", this.innerText);
      window.location.href = "mostrar.html";
      console.log(localStorage.getItem("libro_mostrar"));
    });

    seccion.appendChild(articulo);
  }

  /* for (let i = 0; i < localStorage.length; i++) {

    console.log(JSON.parse(localStorage.getItem(localStorage.key(i))));

    var libro = JSON.parse(localStorage.getItem(localStorage.key(i)));
    var articulo = document.createElement("article");

    var titulo = document.createTextNode(libro.title);

    console.log(titulo);

    var h3 = document.createElement("h3");

    h3.appendChild(titulo);

    articulo.setAttribute("class", "presentacion");

    articulo.appendChild(h3);

    let imagen = document.createElement("img");

    imagen.setAttribute("src", libro.cover);

    articulo.appendChild(imagen);

    articulo.addEventListener("click", function () {
      localStorage.setItem("libro_mostrar",this.innerText);
      localStorage.removeItem("libro_mostrar");
      window.location.href = "mostrar.html";
      console.log(libro_clicado);
      
    });

    seccion.appendChild(articulo);
  } */
};
