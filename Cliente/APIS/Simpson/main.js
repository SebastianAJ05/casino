const btnPrev = document.getElementById("prev");
const btnNext = document.getElementById("next");

let paginasTotales = null;

// Seleccionamos el contenedor
const contenedor = document.getElementById("personajes");

let paginaActual = 1; // Número página que se está mostrando, empieza por 1
async function obtenerPersonajes() {
  try {
    const response = await fetch(
      "https://thesimpsonsapi.com/api/characters?page=" + paginaActual
    );

    if (!response.ok) {
      throw new Error("Error en la petición: " + response.status);
    }

    const data = await response.json(); // Convertimos la respuesta a JSON

    paginasTotales = data.pages;

    console.log(paginasTotales);

    // Recorremos los personajes
    data.results.forEach((personaje) => {
      const card = document.createElement("article");
      //   card.classList.add("card");

      card.innerHTML = `<h2>${personaje.name}</h2>
        <p><strong>Género:</strong> ${personaje.gender}</p>
        <p><strong>Edad:</strong> ${personaje.age} años</p>
      
        <img src="https://cdn.thesimpsonsapi.com/500${personaje.portrait_path}" alt="Personaje">
      `;

      contenedor.appendChild(card);

      actualizarBotones();
    });
  } catch (error) {
    console.error("Hubo un problema:", error);
  }
}

// Activar / desactivar botones
function actualizarBotones() {
  btnPrev.disabled = paginaActual === 1;
  btnNext.disabled = paginaActual === 60;
}

// Eventos de paginación
btnPrev.addEventListener("click", () => {
  paginaActual--;
  contenedor.innerHTML = "";
  obtenerPersonajes();
});

btnNext.addEventListener("click", () => {
  paginaActual++;
  contenedor.innerHTML = "";
  obtenerPersonajes();
});
// Ejecutamos cuando cargue la página
document.addEventListener("DOMContentLoaded", obtenerPersonajes);
