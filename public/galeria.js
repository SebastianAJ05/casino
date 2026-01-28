let imagenes = [
  "img/mario64.jpg",
  "img/Super_Mario_Sunshine.jpg",
  "img/Super_Mario_Galaxy.jpg",
  "img/super_mario_3d_world.jpg",
  "img/super_mario_odyssey.jpg",
];

function cambiar_imagen(mover) {
  let imagen = document.getElementById("imagen");
  let posicion = imagenes.indexOf(imagen.getAttribute("src"));

  //Posición del array de imágenes
  if (mover) {
    if (posicion == imagenes.length - 1) {
      posicion = 0;
    } else {
      posicion++;
    }
  } else {
    if (posicion == 0) {
        posicion = imagenes.length-1;
    }else{
        posicion--;
    }
    
  }
  imagen.setAttribute("src", imagenes[posicion]);
}
