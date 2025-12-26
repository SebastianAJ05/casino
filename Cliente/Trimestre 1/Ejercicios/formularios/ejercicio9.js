window.onload = function () {
  let formu = document.forms[0];

  let campo_dni = formu.elements["DNI"];

  
    
    
  campo_dni.onblur = function () {
    
    let dni = campo_dni.value;

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
    if (dni.length != 9) {
        alert("El DNI debe tener exactamente 9 dígitos")
    }
    else if (isNaN(dni.substring(0, 8))) {
      alert("Los 8 primeros dígitos deben ser números");
      formu.reset();
    } else {
      let n_dni = parseInt(dni.substring(0, 8));
      console.log(n_dni);
      
      let resto = n_dni % letras.length;
      let letra = dni.charAt(dni.length-1).toUpperCase();
       console.log(resto);
       console.log(letra);
    
      console.log(letras[(resto)]);
      
      if (letra == letras[resto]) {
        alert("DNI CORRECTO!!");
      } else {
        alert("Letra incorrecta para este DNI");
      }
    }
  };
};
