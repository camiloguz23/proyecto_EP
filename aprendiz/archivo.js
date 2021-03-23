const mostrar = document.getElementById("datos");//boton para información
const informacion = document.getElementById("infor");//div de información
const salii = document.getElementById("salirr");//boton de salir
const fond = document.getElementById("fondo")
mostrar.addEventListener('click', (e)=>{
    e.preventDefault();
    fond.style.opacity="0";
    mostrar.style.background="#238276";
    informacion.style.opacity="1";
    informacion.style.visibility="visible";  
})

salii.addEventListener('click', (e)=>{
    e.preventDefault();
    mostrar.style.background="#fff";
    informacion.style.opacity="0";
    informacion.style.visibility="hidden";
    fond.style.opacity="1";
})