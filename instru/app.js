//variables
const mostrartd = document.getElementById("seguimi");//boton para seguimiento de  evidencias 
const informacion = document.getElementById("infor");//div de seguimiento de evidencias
const salii = document.getElementById("salirr");//boton de salir

const fond = document.getElementById("fondo")//imagen de fondo del perfil del usuario
const datosapre = document.getElementById("informa")//informacion del aprendiz
const boton = document.getElementById("boton");//boton para ejecutar la busqueda del aprendiz
const documento = document.getElementById("documento");//input que contiene el documento del aprendiz
const formEvidencia = document.getElementById("tipoEvidencia");//Cuerpo de seleccion de evidencia
const tipoEvidencia = document.getElementById("inicio");//seleccion de evidencia
const salir2 = document.getElementById("salir2");//boton de salir de calidicar
const evidencia1 = document.getElementById("evidencias1");//Formulario evidencia Quincenales
const evidencia2 = document.getElementById("evidencias2");//Formulario evidencia Trimestrales

const formu = document.getElementById("fomutievi");
const usuario = document.getElementById("tip_evi");


const calificar = document.getElementById("calificar");//Boton para calificar


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

//Abir calificador
calificar.addEventListener('click', (e)=>{
    e.preventDefault();
    formEvidencia.style.display= "block";
    datosapre.style.display= "none";
    
})

// salir calificador
salir2.addEventListener('click', (e)=>{
    e.preventDefault();
    formEvidencia.style.display= "none";
    datosapre.style.display= "block";
    evidencia1.style.display= "none";
    evidencia2.style.display= "none";
    
})

// funcion para tipos de evidencia
tipoEvidencia.addEventListener("click", (e)=>
{
    e.preventDefault();
        const xhr = new XMLHttpRequest();
        xhr.addEventListener("readystatechange",(e)=>{
            if(xhr.readyState !== 4) return;
            if(xhr.status >= 200 && xhr.status <300)
            {
                let json = JSON.parse(xhr.responseText);
                console.log(json[0].id_tip_eviden)
                if(json[0].id_tip_eviden==2)
                { 
                    evidencia1.style.display= "block";
                    evidencia2.style.display= "none";
                }
                else if (json[0].id_tip_eviden==1)
                { 
                    evidencia2.style.display= "block";
                    evidencia1.style.display= "none";
                }
            }
        })
        xhr.open("POST","evi.php");
        xhr.send(new FormData(formu));
        
});

function relacion (apren)
{
    const hidden = document.getElementById("hidden");
    hidden.innerHTML = `<input type="hidden" name="documenapre" value="${apren}" > `

}


