import modal from "./modal.js";
document.addEventListener("DOMContentLoaded", (e)=>{
    e.preventDefault();
    modal(".container", ".contenido1" , "#cerrar");
})