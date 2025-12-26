window.onload = function () {
  let abuelo = document.querySelector("section");
  let padre = document.querySelector("div");
  let hijo = document.querySelector("p");

  /* 
        abuelo.onclick = function(){
        alert("Soy el abuelo");
    }

    padre.onclick = function(){
        alert("Soy el padre");
    }

    hijo.onclick = function(){
        alert("Soy el hijo");
    } */

  /* 
        abuelo.addEventListener("click",function(){
            alert("Soy el abuelo SECTION");
        });

        padre.addEventListener("click",function(){
            alert("Soy el padre DIV");
        },true);

        hijo.addEventListener("click",function(){
            alert("Soy el hijo P");
        },true); 
        */

  /* 
    hijo.onclick = function(){
        alert("Soy el primero");
    }
    hijo.onclick = function(){
        alert("Soy el segundo");
    }
    hijo.onclick = function(){
        alert("Soy el tercero");
    } 
    */

  /* hijo.addEventListener("click",function(){
        alert("Soy el primero");
    }); 

    hijo.addEventListener("click",function(){
        alert("Soy el segundo");
    },true); 

    hijo.addEventListener("click",function(){
        alert("Soy el tercero");
    },true);
 */

    function antinolo() {
        alert("Soy el primero");
    }
  hijo.addEventListener("click", antinolo);

  let boton = document.querySelector("input[type='button']");

  boton.onclick = function () {
    alert("Borrando evento de hijo");

    hijo.removeEventListener("click",antinolo);
  };
};
