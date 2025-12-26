window.onload = function () {
  let borrado = document.getElementById("borrar");

  borrado.addEventListener("click", function () {
    sessionStorage.clear();
    location.reload();
  });

  let recuperacion = document.getElementById("recuperacion");

  recuperacion.addEventListener("click", function () {
    sessionStorage.removeItem("IsThisFirstTime_Log_From_LiveServer");
    sessionStorage.removeItem("key");
    sessionStorage.removeItem("getItem");
    sessionStorage.removeItem("setItem");
    sessionStorage.removeItem("removeItem");
    sessionStorage.removeItem("clear");
    let datos = document.getElementById("datos");
    console.log(sessionStorage);
    
    if (sessionStorage.length > 0) {
        //Forma con el for normal
        for (let i = 0; i < sessionStorage.length; i++) {
            if (sessionStorage.length > 0) {
              var dato = document.createElement("section");
        
              var textito = document.createTextNode(
                sessionStorage.key(i) +
                  " : " +
                  sessionStorage.getItem(sessionStorage.key(i))
              );
        
              dato.appendChild(textito);
        
              datos.appendChild(dato);
            }
          }

          

     /*  for (const clave in sessionStorage) {
        var dato = document.createElement("p");
        var textito = document.createTextNode(
          clave + " : " + sessionStorage.getItem(clave)
        );
        dato.appendChild(textito);
        datos.append(dato);
      } */
    }
  });
};

/* sebas - un objeto con todos los datos */