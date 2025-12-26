
 /*  //domcontentLoaded

  console.log("Pidiendo café...");

  setTimeout(function(){
    console.log("Café listo!!!");
    
  },3000);

  console.log("Sigo atendiendo clientes");

  console.log("Le doy cambio a Mateo...");

  console.log("Le vendo tabaco a la ambulancia gitana"); */
  
  let pedido = new Promise(function(resolve, reject){
    
    setTimeout(()=>{
      //fuerzo un fallo
      if (parseInt(Math.random()*3+1) == 3) {
        reject("Su pedido ha sido cancelado");
      }
      resolve("Pedido entregado");
    },3000)
  });

  console.log("Pidiendo café...");

pedido
  .then(function(respuesta){
    return respuesta+23;
    
  })
  .then(function(otraRespuesta){
    console.log(otraRespuesta);
    
  })
  .catch(function(error){
    console.log(error);
    
  })

  console.log("Le doy cambio a Mateo...");

  console.log("Le vendo tabaco a la ambulancia gitana");