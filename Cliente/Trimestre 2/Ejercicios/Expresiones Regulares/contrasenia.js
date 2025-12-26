window.onload = function(){
    var formu = document.forms[0];
    var contrasenia = formu.elements["contra"];
    var checkbox = formu.elements["mostrar_c"];

    //Mediante el checkbox

   /*  checkbox.onclick = function(){
        if (checkbox.checked) {
            mostrar_contrasenia();
        }else{
            ocultar_contrasenia();
        }
    }
     */
    // Mediante el ojo
    var ojo = document.getElementById("ojo");
    
    function mostrar_contrasenia() {
        contrasenia.setAttribute("type","text");
    }
    function ocultar_contrasenia() {
        contrasenia.setAttribute("type","password");
    }
    ojo.addEventListener("mousedown",mostrar_contrasenia);
    ojo.addEventListener("mouseup",ocultar_contrasenia);
}

