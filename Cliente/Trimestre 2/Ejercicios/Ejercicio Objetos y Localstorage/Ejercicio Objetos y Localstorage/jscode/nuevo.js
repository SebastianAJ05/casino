window.onload = function(){
    var formu = document.forms[0];

    var insercion = document.querySelector("input[type='button']");

    var libros = JSON.parse(localStorage.getItem("libros"));

    insercion.addEventListener("click",function(){
        var titulo = formu.elements["titulo"].value;

        var isbn = formu.elements["isbn"].value;
    
        var numpaginas = formu.elements["numpaginas"].value;
    
        var campo_genero = formu.elements["genero"];
    
        var opciones = campo_genero.options;
    
        for (const opcion of opciones) {
            opcion.value = opcion.text.replace(" ","_");
        }
        
        var genero = campo_genero.value;

        let anio = formu.elements["anio"].value;
    
        let portada = formu.elements["cover"].value;
    
        let autor = formu.elements["autor"].value;
    
        let sinopsis = formu.elements["resumen"].value;

        var libro_nuevo = {
            "title" : titulo,
            "pages" : numpaginas,
            "ISBN" : isbn,
            "genre" : genero,
            "year" : parseInt(anio),
            "cover" : portada,
            "author": autor,
            "synopsis" : sinopsis
        }

        libros.push(libro_nuevo);

        localStorage.setItem("libros",JSON.stringify(libros));

        console.log(localStorage.getItem("libros"));
        

        console.log("TODO INSERTADO");
        
        
    });  

    var cancelacion = document.querySelectorAll("input[type='button']")[1];
    
    cancelacion.addEventListener("click",function(){
        window.location.href = "inicio.html";
    });
}