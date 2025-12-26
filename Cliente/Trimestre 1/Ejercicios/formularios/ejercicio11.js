window.onload = function () {
  let formu = document.forms["datos"];

  let envio = formu.elements["Enviar"];

  envio.addEventListener("click", function () {

    let campos = formu.elements["dni","nombre","apellidos","f_nacimiento","web_personal","contrasenia"];

    //Valido el DNI
    let campo_dni = formu.elements["dni"];

    let dni = campo_dni.value;

    if (dni.length === 0) {
      alert("El DNI es obligatorio");
      campo_dni.focus();
    } else if (dni.length !== 9) {
      alert("El DNI debe exactamente 9 caracteres");
      campo_dni.focus();
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

      if (isNaN(p_numerica)) {
        alert("Los primeros 8 caracteres deben ser números");
      } else if (!letras.includes(letra)) {
        alert("El último caracter debe ser una letra");
      } else {
        alert("El DNI está correcto");
      }
    }

    //Valido el nombre

    let campo_nombre = formu.elements["nombre"];

    let nombre = campo_nombre.value;

    let palabras = [];

    palabras = nombre.split(" ");

    if (palabras.length > 2) {
      alert("El nombre no puede tener más de 2 palabras");
    } else {
      alert("Nombre Correcto");
    }

    //Valido los apellidos

    let campo_apellidos = formu.elements["apellidos"];

    let apellidos = campo_apellidos.value;

    palabras = [];

    palabras = apellidos.split(" ");

    if (palabras.length > 2) {
      alert("El nombre no puede tener más de 2 palabras");
    } else {
      alert("Apellido(s) Correcto");
    }

    //Valido la fecha de nacimiento

    let campo_f_nacimiento = formu.elements["f_nacimiento"];

    let f_nacimiento = campo_f_nacimiento.value;

    let calendario = f_nacimiento.split("/");

    if (calendario.length != 3) {
      alert("Formato para la fecha de nacimiento: dd/mm/yyyy");
      console.log(f_nacimiento);
    } else {
      let todo_bien = true;
      for (let i = 0; i < calendario.length && todo_bien; i++) {
        const parte = calendario[i];
        if (isNaN(parte)) {
          alert("La fecha son solo números y la barra (/)");
          todo_bien = false;
        }
      }
      if (todo_bien) {
        alert("Fecha de nacimiento correcta");
      }
    }

    //Valido la web personal

    let campo_web = formu.elements["web_personal"];

    let web = campo_web.value;

    if (web.startsWith("https://")) {
        alert("Web correcta");
    }else{
        alert("La web personal debe empezar por https://");
        campo_web.focus();
    }

    //Valido la contraseña

    let campo_contra = formu.elements["contrasenia"];

    let contra = campo_contra.value;

    if (contra.length < 8 || contra.length > 12) {
        alert("La contraseña debe tener entre 8 y 12 caracteres");
    }else{
        alert("Contraseña correcta");
    }
  });
};
