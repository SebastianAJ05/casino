window.onload = function () {
  let formu = document.forms["datos"];

  let envio = formu.elements["Enviar"];

  envio.addEventListener("click", function () {
    let campo_dni = formu.elements["dni"];

    let dni = campo_dni.value;

    let campo_nombre = formu.elements["nombre"];

    let nombre = campo_nombre.value;

    let campo_apellidos = formu.elements["apellidos"];

    let apellidos = campo_apellidos.value;

    let campo_f_nacimiento = formu.elements["f_nacimiento"];

    let f_nacimiento = campo_f_nacimiento.value;

    let campo_web = formu.elements["web_personal"];

    let web = campo_web.value;

    let campo_contra = formu.elements["contrasenia"];

    let contra = campo_contra.value;

    if (!dni || !nombre || !apellidos || !f_nacimiento || !web || !contra) {
      alert("Debes rellenar todos los campos");
    } else {
      //Valido el DNI

      if (dni.length !== 9) {
        alert("El DNI debe exactamente 9 caracteres");
        campo_dni.focus();
        return false;
      } else {
        let p_numerica = dni.substring(0, 8);
        let letra = dni.charAt(dni.length - 1).toUpperCase();

        let letras = [
          "T",
          "R",
          "W",
          "A",
          "G",
          "M",
          "Y",
          "F",
          "P",
          "D",
          "X",
          "B",
          "N",
          "J",
          "Z",
          "S",
          "Q",
          "V",
          "H",
          "L",
          "C",
          "K",
          "E",
        ];

        if (isNaN(p_numerica) || !letras.includes(letra)) {
          alert(
            "Los primeros 8 caracteres deben ser números y el noveno una letra"
          );
          campo_dni.focus();
          return false;
        }
      }

      //Valido el nombre

      let palabras = [];

      palabras = nombre.split(" ");

      if (palabras.length > 2) {
        alert("El nombre no puede tener más de 2 palabras");
        campo_nombre.focus();
        return false;
      }

      //Valido los apellidos

      palabras = [];

      palabras = apellidos.split(" ");

      if (palabras.length > 2) {
        alert("No puede haber más de 2 apellidos");
        campo_apellidos.focus();
        return false;
      }

      //Valido la fecha de nacimiento

      let calendario = f_nacimiento.split("/");

      if (calendario.length != 3) {
        alert("Formato para la fecha de nacimiento: dd/mm/yyyy");
        campo_f_nacimiento.focus();
        return false;
      }
      //Valido la web personal

      if (!web.startsWith("https://")) {
        alert("La web personal debe empezar por https://");
        campo_web.focus();
        return false;
      }

      //Valido la contraseña

      if (contra.length < 8 || contra.length > 12) {
        alert("La contraseña debe tener entre 8 y 12 caracteres");
        campo_contra.focus();
        return false;
      }
      alert("TODO ESTÁ CORRECTO!!");
    }
  });
};
