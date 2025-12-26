// Ejercicio 1
var tutor = {
  nombre: "Jaime",
  edad: 43,
  DNI: "12345678A",
  titulo_universitario: "Ninguno"
};

console.log(typeof tutor);

console.log(tutor);

var asignatura = {
  //EL esqueleto de los objetos asignatura
  nombre: "",
  curso: 3,
  n_horas: 50,
};

class Asignatura {
  constructor(nombre, curso, n_horas) {
    this.nombre = nombre;
    this.curso = curso;
    this.n_horas = n_horas;
  }
  mostrar() {
    return `Nombre: ${this.nombre}\nCurso: ${this.curso}\nHoras: ${this.n_horas}`;
  }
}

//Ejercicio 2
const asignatura1 = new Asignatura("Lengua", 3, 50);
const asignatura2 = new Asignatura("Matemáticas", 4, 50);
const asignatura3 = new Asignatura("Geografía",2,50);
const asignatura4 = new Asignatura("TIC",1,55);
var asignaturas = [
  asignatura1, asignatura2, asignatura3, asignatura4
];
console.log(typeof asignaturas);

//Ejercicio 3

var alumno = {
  nombre: "Paco",
  edad: 23,
  ciclo: "DAW",
  curso: 2,
  tutor: tutor,
  asignaturas: asignaturas,
  notas_medias: [8, 7, 8, 9],
};

console.log(alumno);

//Ejercicio 4
window.onload = function () {
  var div = document.getElementById("datos");
  var texto;
  console.log(div);

  for (const dato in alumno) {
    var parrafo = document.createElement("p");
    if (Array.isArray(alumno[dato])) {
      for (const element of alumno[dato]) {
        var valor = alumno[dato][element];

        if (Array.isArray(valor)) {
        } else if (typeof valor == "object") {
          for (const desmenucion in valor[element]) {
            var des = valor[element];
            texto = document.createTextNode(
              `${desmenucion}: ${des[desmenucion]}`
            );
            parrafo.appendChild(texto);
            div.appendChild(parrafo);
          }
        } else {
          //La lista de objetos asignaturas
          if (typeof element == "object") {
            for (const elementillo in element) {
              console.log(`${elementillo}: ${element[elementillo]}`);
              texto = document.createTextNode(
                `${elementillo} : ${element[elementillo]} `
              );
              parrafo.appendChild(texto);
              div.appendChild(parrafo);
            }
          } else {
            texto = document.createTextNode(element + " ");
            parrafo.appendChild(texto);
            console.log(element);
            div.appendChild(parrafo);
          }
        }
      }
    } else if (typeof alumno[dato] == "object") {
      for (const datillo in alumno[dato]) {
        console.log(`${dato[datillo]}`);
        texto = document.createTextNode(
          `${datillo} : ${alumno[dato][datillo]} `
        );
        parrafo.appendChild(texto);
        div.appendChild(parrafo);
      }
    } else {
      console.log(`${dato}: ${alumno[dato]}`);
      texto = document.createTextNode(`${dato}: ${alumno[dato]}`);
      parrafo.appendChild(texto);
      div.appendChild(parrafo);
    }
  }
  div.appendChild(parrafo);
  console.log("OK");

};
