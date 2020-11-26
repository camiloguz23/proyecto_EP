const botono = document.getElementById("btn_pazysalvo");
const cuadropaz = document.getElementById("cuadro");
const salida = document.getElementById("salir");

botono.addEventListener('click', (e)=>{
    e.preventDefault();
    cuadropaz.style.display= "block";
    botono.style.background ="#fc7323";
    botono.style.color = "#ffffff";
    botono.style.width ="214px";
});

salida.addEventListener('click', (e)=>{
    e.preventDefault();
    cuadropaz.style.display= "none";
    botono.style.background ="#ffffff";
    botono.style.color ="black";

});
