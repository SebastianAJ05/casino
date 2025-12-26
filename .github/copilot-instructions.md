# AI Coding Guidelines for proyecto_cenec

## Project Overview
This is an educational web development project containing exercises in HTML, CSS, and JavaScript. The exercises cover client-side web technologies including DOM manipulation, forms, localStorage, fetch API, promises, and regular expressions. All content is in Spanish.

## Architecture
- **Structure**: Exercises are organized by quarters (Trimestre 1, Trimestre 2) under `Cliente/Ejercicios/`
- **Technology Stack**: Vanilla JavaScript, HTML5, CSS3. No frameworks or build tools.
- **File Organization**: Each exercise typically has `ejercicioX.html`, `ejercicioX.js`, and sometimes `ejercicioX.css` or shared stylesheets.

## Key Patterns and Conventions

### DOM Manipulation
- Use `window.onload` for initialization
- Query elements with `document.querySelector("#id")`, `document.getElementById("id")`, or `document.getElementsByTagName("tag")[index]`
- Create elements dynamically with `document.createElement("tag")` and append with `appendChild()`
- Example: [Cliente/Trimestre 1/Ejercicios/Ejercicios Árbol DOM/ejercicio18.js](Cliente/Trimestre 1/Ejercicios/Ejercicios Árbol DOM/ejercicio18.js)

### Event Handling
- Attach events with `element.onclick = function() { ... }` or `element.addEventListener("click", function() { ... })`
- Disable buttons with `button.setAttribute("disabled", true)` or `button.disabled = true`

### Data Persistence
- Use `localStorage.setItem(key, JSON.stringify(data))` to store objects
- Retrieve with `JSON.parse(localStorage.getItem(key))`
- Example: [Cliente/Trimestre 2/Ejercicios/Ejercicio Objetos y Localstorage/Ejercicio Objetos y Localstorage/jscode/main.js](Cliente/Trimestre 2/Ejercicios/Ejercicio Objetos y Localstorage/Ejercicio Objetos y Localstorage/jscode/main.js)

### API Calls
- Use fetch API with promise chains: `fetch(url).then(res => res.json()).then(data => { ... })`
- Handle errors with `if (!respuesta.ok) throw new Error(...)`
- Example: [Cliente/Trimestre 2/Ejercicios/Fetch/Dragon_Ball/script.js](Cliente/Trimestre 2/Ejercicios/Fetch/Dragon_Ball/script.js)

### Navigation
- Use `window.location.href = "page.html"` for navigation
- Pass data between pages via localStorage

## Development Workflow
- Edit files in VS Code
- Test by opening HTML files directly in browser (no server required)
- Use browser developer tools for debugging
- No build commands or package managers

## Code Style
- Variable names in Spanish where appropriate (e.g., `n_monedas` for number of coins)
- Use `const` and `let` for variables
- Functions defined with `function` keyword or arrow functions
- Comments in Spanish

## Common Tasks
- Implementing interactive features with DOM events and timers
- Persisting user data across page reloads using localStorage
- Fetching and displaying data from external APIs
- Validating forms with regular expressions