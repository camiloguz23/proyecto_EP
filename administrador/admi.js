const creausu = document.getElementById("uno");
const concrea = document.getElementById("creausu");
const fon = document.getElementById("fondo");
const cerrar = document.getElementById("cerrar");

creausu.addEventListener('click', (e)=>{
    e.preventDefault();
    concrea.style.opacity="1";
    concrea.style.visibility="visible";
    fon.style.visibility="hidden";
    creausu.style.background="rgb(25, 130, 118)";
})

cerrar.addEventListener('click', (e)=>{
    e.preventDefault();
    concrea.style.opacity="o";
    concrea.style.visibility="hidden";
    fon.style.visibility="visible";
    creausu.style.background="white";
})