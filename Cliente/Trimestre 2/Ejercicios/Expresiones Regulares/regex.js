// 1. Definición en JS

// let texto = "_______";  // Caso 1

let texto = "".value; //Caso 2

 // let er = new RegExp("alumn[oae]st",ig); // Forma 1

let er = /alumn[aeo]st/ig;  // Forma 2

// 2. Buscar coincidencias

er.test(texto); //Devuelve booleano

er.source();

er.flags();

texto.match(er); // Ésta es más completa. Devuelve un array con todas las coincidencias

/*Mete así las expresiones:
\b......\b/
/^......$/
*/

/*Si no pongo la g:
[0] --> alumna
[index] --> 12
[input] --> texto
*/