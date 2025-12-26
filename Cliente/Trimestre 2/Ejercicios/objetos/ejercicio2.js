// Ejercicio 1
var tutor = {
  nombre: "Jaime",
  edad: 43,
  DNI: "12345678A",
  titulo_universitario: "Ninguno",
  //Funciones del ejercicio 5
  mostrar: function () {
    return `Datos del tutor:\nNombre: ${this.nombre}\nEdad: ${this.edad}\nDNI: ${this.DNI}\nTítulo universitario: ${this.titulo_universitario}`;
  },
  cambiarNombre: function (nuevo) {
    tutor.nombre = nuevo;
  },
};

console.log(typeof tutor);

console.log(tutor);

//Ejercicio 2
class Asignatura {
  constructor(nombre, curso, n_horas) {
    this.nombre = nombre;
    this.curso = curso;
    this.n_horas = n_horas;
  }
  //Funciones para el ejercicio 6
  mostrar() {
    return `Datos de la asignatura:\nNombre: ${this.nombre}\nCurso: ${this.curso}\nHoras: ${this.n_horas}`;
  }
  cambiarHoras(nueva) {
    this.n_horas = nueva;
  }
}

const asignatura1 = new Asignatura("Lengua", 3, 50);
const asignatura2 = new Asignatura("Matemáticas", 4, 50);
const asignatura3 = new Asignatura("Geografía", 2, 50);
const asignatura4 = new Asignatura("TIC", 1, 55);
var asignaturas = [asignatura1, asignatura2, asignatura3, asignatura4];
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
  //Funciones ejercicio 7
  calcularMedia: function () {
    var medias = 0;
    for (const nota of this.notas_medias) {
      medias += nota;
    }
    return medias / this.notas_medias.length;
  },
  MediaAsignatura: function () {
    var cadena = "";
    for (let i = 0; i < this.notas_medias.length; i++) {
      cadena += asignaturas[i].nombre + " : " + this.notas_medias[i] + "\n";
    }
    return cadena;
  },
  mostrar: function () {
    var cadena_asignaturas = "";
    for (const asignatura of asignaturas) {
    }
    return `Datos del alumno:\nNombre: ${this.nombre}\nEdad: ${
      this.edad
    }\nCiclo: ${this.ciclo}\nCurso: ${
      this.curso
    }\n${this.tutor.mostrar()}\nAsignaturas:\n${this.MediaAsignatura()}\nMedia de las asignaturas: ${this.calcularMedia()}`;
  },
};

console.log(alumno);

//Ejercicio 4
window.onload = function () {
  var div = document.getElementById("datos");

  var lineas = alumno.mostrar().split("\n");
  for (const linea of lineas) {
    var parrafo = document.createElement("p");
    var texto = document.createTextNode(linea);
    parrafo.appendChild(texto);
    div.appendChild(parrafo);
  }

  console.log(div);
};
