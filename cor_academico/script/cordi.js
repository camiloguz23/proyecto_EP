const boton = document.getElementById("btn_pazysalvo");
const cuadro = document.getElementById("cuadro");
const salida = document.getElementById("salir");


boton.addEventListener('click', (e)=>{
    e.preventDefault();
    cuadro.style.display= "block";
    boton.style.background ="#fc7323";
    boton.style.color = "#ffffff";
    boton.style.width ="214px";
})

salida.addEventListener('click', (e)=>{
    e.preventDefault();
    cuadro.style.display= "none";
    boton.style.background ="#ffffff";
    boton.style.color ="black";

})

// ****************  FORMULARIO DE FECHA **********************

