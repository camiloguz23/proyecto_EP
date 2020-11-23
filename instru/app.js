//variables
const mostrartd = document.getElementById("seguimi");//boton para seguimiento de  evidencias 
const informacion = document.getElementById("infor");//div de seguimiento de evidencias
const salii = document.getElementById("salirr");//boton de salir
const fond = document.getElementById("fondo")//imagen de fondo del perfil del usuario
const datosapre = document.getElementById("informa")//informacion del aprendiz
const boton = document.getElementById("boton");//boton para ejecutar la busqueda del aprendiz
const documento = document.getElementById("documento");//input que contiene el documento del aprendiz
const calificaci =document.getElementById("calificarr");
const califi =document.getElementById("datosgen");


 //funcion para consultar
boton.addEventListener("click", consulta);
function consulta(e) {
    e.preventDefault();  
      let xhr = new XMLHttpRequest();
      const docuBase = documento.value 
      xhr.open("get","aprendi.php?documento=" + docuBase,true)
      xhr.onreadystatechange = function () {
          if(xhr.readyState == 4 && xhr.status == 200){
              const info = document.querySelector("#informa")
              info.innerHTML = xhr.responseText;
             relacion(docuBase);
          }
      }
      xhr.send()
}

// mostrar opciones de evidencias
mostrartd.addEventListener('click', (e)=>{
    e.preventDefault();
    fond.style.opacity="0";
    mostrartd.style.background="#238276";
    informacion.style.opacity="1";
    informacion.style.visibility="visible";
})

// salir de evidencias
salii.addEventListener('click', (e)=>{
    e.preventDefault();
    mostrartd.style.background="#fff";
    informacion.style.opacity="0";
    informacion.style.visibility="hidden";
    fond.style.opacity="1";
})



// funcion
function relacion (apren){
    console.log(apren)
    const docinstru = document.getElementById("docinstru").value
    console.log(docinstru)
    let xhr = new XMLHttpRequest();
      xhr.open("get","evidencias.php?documenapre=" + apren+"&docuinst="+docinstru,true)
      xhr.onreadystatechange = function () {
          if(xhr.readyState == 4 && xhr.status == 200){
             console.log(xhr.responseText)
          }
      }
      xhr.send()
}

