window.onload = function(){

    let formu = document.forms[0];

    let div = document.getElementById("divito");

    let colores = formu.color;

    //Apartado A
    

    for (const color of colores) {
        color.onclick = function(){
            div.style.setProperty("background-color", color.value);
        }
    }

    //Apartado B

    for (const color of colores) {
        color.onchange = function(){
            div.style.setProperty("background-color", color.value);
        }
    }    
}