const mostrar = document.getElementById("datos");//boton para información
const informacion = document.getElementById("infor");//div de información
const salii = document.getElementById("salirr");//boton de salir
const saliii = document.getElementById("salirrr");//boton de salir
const fond = document.getElementById("fondo")
const descargardoc = document.getElementById("datos2");
const mostrardoc = document.getElementById("calificaa");//boton para información
const informacionn = document.getElementById("documentos1");//div de información
const informacionnn = document.getElementById("documentos2");//
const formul_legalizacion = document.getElementById('legalForm');

mostrar.addEventListener('click', (e)=>{
    e.preventDefault();
    fond.style.opacity="0";
    mostrar.style.background="#238276";
    informacion.style.opacity="1";
    informacion.style.visibility="visible";  
})

mostrardoc.addEventListener('click', (e)=>{
    e.preventDefault();
    fond.style.opacity="0";
    mostrardoc.style.background="#238276";
    informacionn.style.opacity="1";
    informacionn.style.visibility="visible";  
})

descargardoc.addEventListener('click', (e)=>{
    e.preventDefault();
    fond.style.opacity="0";
    descargardoc.style.background="#238276";
    informacionnn.style.opacity="1";
    informacionnn.style.visibility="visible";  
    formul_legalizacion.style.opacity="1";
    formul_legalizacion.style.visibility="visible";
    formul_legalizacion.style.display=""
})

salii.addEventListener('click', (e)=>{
    e.preventDefault();
    mostrar.style.background="#fff";
    informacion.style.opacity="0";
    informacion.style.visibility="hidden";
    fond.style.opacity="1";
})

saliii.addEventListener('click', (e)=>{
    e.preventDefault();
    mostrardoc.style.background="#fff";
    informacionn.style.opacity="0";
    informacionn.style.visibility="hidden";
    fond.style.opacity="1";
})
// const formactualizar = document.getElementById("formularito")
// const botonaparecere =document.getElementById("aparecerE")

// botonaparecere.addEventListener("click", (e) => {
//     e.preventDefault()
//     formactualizar.style.display = "block"
    
// })