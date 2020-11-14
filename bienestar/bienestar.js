const pazsal = document.getElementById("pazbi");
const conpaz = document.getElementById("pazybi");
const fon = document.getElementById("fondo");
const cerrarpaz = document.getElementById("cerrarbi");

pazsal.addEventListener('click', (e)=>{
    e.preventDefault();
    conpaz.style.opacity="1";
    conpaz.style.visibility="visible";
    fon.style.visibility="hidden";
    pazsal.style.background="#fc7323";
})

cerrarpaz.addEventListener('click', (e)=>{
    e.preventDefault();
    conpaz.style.opacity="o";
    conpaz.style.visibility="hidden";
    fon.style.visibility="visible";
    pazsal.style.background="white";
})