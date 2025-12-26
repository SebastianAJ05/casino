window.onload = function(){
    let formu = document.forms[0];

    let nombre = formu.elements["nombre"];

    let clave = formu.elements["clave"];

    if (nombre.value != "") {
        sessionStorage["nombre"] = nombre.value;
    }
    if (clave.value != "") {
        sessionStorage["clave"] = clave.value;
    }
    


}