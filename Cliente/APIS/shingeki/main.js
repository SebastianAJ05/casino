async function obtenerPersonajes() {
  try {
    const response = await fetch(
      "https://api.attackontitanapi.com/characters"
    );

    if (!response.ok) {
      throw new Error("Error en la petición: " + response.status);
    }
    console.log(response);
    console.log("Antes de convertir a JSON");
    
    const data = await response.json(); // Convertimos la respuesta a JSON

    console.log("Después de convertir a JSON");

    console.log(data);
    

    // Seleccionamos el contenedor
    const contenedor = document.getElementById("personajes");
    console.log(data.message);

    // Recorremos los personajes
    data.results.forEach((personaje) => {
      const card = document.createElement("article");
      //   card.classList.add("card");

      card.innerHTML = `<h2>${personaje.name}</h2>
        <p><strong>Género:</strong> ${personaje.gender}</p>
        <p><strong>Edad:</strong> ${personaje.age} años</p>
      
        <img src="${personaje.img}" alt="Personaje">
      `;

      contenedor.appendChild(card);
    });
  } catch (error) {
    console.error("Hubo un problema:", error);
  }
}

// Ejecutamos cuando cargue la página
document.addEventListener("DOMContentLoaded", obtenerPersonajes);
