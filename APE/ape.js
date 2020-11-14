const pazsal = document.getElementById("paz");
const conpaz = document.getElementById("pazsal");
const fon = document.getElementById("fondo");
const cerrarpaz = document.getElementById("cerrarpaz");

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