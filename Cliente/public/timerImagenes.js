let imagenes = [
  "img/mario64.jpg",
  "img/Super_Mario_Sunshine.jpg",
  "img/Super_Mario_Galaxy.jpg",
  "img/super_mario_3d_world.jpg",
  "img/super_mario_odyssey.jpg",
];
let timer;
window.onload = function () {
  let imagen = document.getElementById("imagen");
  let posicion = imagenes.indexOf(imagen.getAttribute("src"));
  let avanzar = document.getElementsByTagName("button")[0];

  avanzar.onclick = function () {
    timer = setInterval(function () {
      if (posicion == imagenes.length - 1) {
        posicion = 0;
      } else {
        posicion++;
      }
      imagen.setAttribute("src", imagenes[posicion]);
    }, 500);
    this.disabled = true;
    retroceder.disabled = false;
  };
  let retroceder = document.getElementsByTagName("button")[1];
  retroceder.onclick = function(){
    clearInterval(timer);
    this.disabled = true;
    avanzar.disabled = false;
  }

};
