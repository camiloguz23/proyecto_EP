const pazsal = document.getElementById("pazsalv");
const conpaz = document.getElementById("pazysal");
const fon = document.getElementById("fondo");
const cerrarpaz = document.getElementById("cerrarpazs");

pazsal.addEventListener('click', (e)=>{
    e.preventDefault();
    conpaz.style.opacity="1";
    conpaz.style.visibility="visible";
    fon.style.visibility="hidden";
    pazsal.style.background="rgb(89, 181, 72)";
})

cerrarpaz.addEventListener('click', (e)=>{
    e.preventDefault();
    conpaz.style.opacity="o";
    conpaz.style.visibility="hidden";
    fon.style.visibility="visible";
    pazsal.style.background="white";
})