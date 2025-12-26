window.onload = function () {
  let formu = document.forms[0];

  let envio = formu.enviar;

  envio.addEventListener("click", function (event) {
    event.preventDefault();

    sessionStorage.removeItem("IsThisFirstTime_Log_From_LiveServer");

    let nombre = formu.elements["nombre"].value;

    let apellidos = formu.elements["apellidos"].value;

    let edad = formu.elements["edad"].value;

    let email = formu.elements["email"].value;

    if (nombre == "" || apellidos == "" || edad == "" || email == "") {
      alert("A rellenar los campos, máquina");
    } else {
      var usuario = {
        nombre: nombre,
        apellidos: apellidos,
        edad: edad,
        email: email,
      };
      for (const clave in usuario) {
        sessionStorage.setItem(clave, usuario[clave]);
      }
      
      formu.submit();
    }
    
  });
};
