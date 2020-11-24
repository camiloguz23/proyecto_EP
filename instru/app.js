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
const formula = document.getElementById("fore");
const fragmen = document.createDocumentFragment();
const contenedor = document.getElementById('contenedor');

formu.addEventListener("submit", (e)=>
{
    e.preventDefault();
        const xhr = new XMLHttpRequest();
        xhr.addEventListener("readystatechange",(e)=>{
            if(xhr.readyState !== 4) return;
            if(xhr.status >= 200 && xhr.status <300)
            {
                let json = JSON.parse(xhr.responseText);
                console.log(json)
                if(json[0].id_tip_eviden==2)
                {
                   
                    json.forEach((el)=>{
                        let texto = el.nom_evidencias;
                        const elemento1 =document.createElement('input');
                        const label = document.createElement('label');
                        const contenedor = document.createElement('div');
                        elemento1.setAttribute("type","checkbox");
                        elemento1.setAttribute("id" , `${el.nom_evidencias}`);
                        label.setAttribute("for" , `${el.nom_evidencias}`);
                        elemento1.setAttribute("class", "check");
                        elemento1.setAttribute("name","check");
                        elemento1.setAttribute("value",`${el.id_evidencias}`)
                        if(el.nom_evidencias === "EVIDENCIA 1"){
                            elemento1.removeAttribute("disabled");
                        }else{
                            elemento1.setAttribute("disabled" , "true");
                        }
                        label.appendChild(document.createTextNode(texto));
                        contenedor.appendChild(elemento1);
                        contenedor.appendChild(label);
                        formula.appendChild(contenedor);
                        //elemento1.style.display ="block";
                        fragmen.appendChild(elemento1);
                    })
                    formula.appendChild(fragmen);
                    
                 // funcion habilitar elemento
                    function habilitar(elemento,habili)
                    {
                        const elementohabilitar = document.getElementById(habili);
                        const habilitardos = document.getElementById(elemento);
                        
    
                                if(habilitardos.checked==true){
                                let conf  = confirm("esta seguro de calificar la actividad");
                                    if(conf== true){
                                        elementohabilitar.removeAttribute("disabled");
                                    }
                                    else{
                                        habilitardos.checked=false;
                                    }
                                    
                                }
                    }

                        function ejecutar(e)
                        {
                        switch (e.target.id) 
                            {
                            case "EVIDENCIA 1":
                                habilitar("EVIDENCIA 1","EVIDENCIA 2");
                                break;
                            case "EVIDENCIA 2":
                                habilitar("EVIDENCIA 2","EVIDENCIA 3");
                                break;
                            case "EVIDENCIA 3":
                                habilitar("EVIDENCIA 3","EVIDENCIA 4");
                                break;
                            case "EVIDENCIA 4":
                                habilitar("EVIDENCIA 4","EVIDENCIA 5");
                                break;
                            case "EVIDENCIA 5":
                                habilitar("EVIDENCIA 5","EVIDENCIA 6");
                                break;
                            case "EVIDENCIA 6":
                                habilitar("EVIDENCIA 6","EVIDENCIA 7");
                                break;
                            case "EVIDENCIA 7":
                                habilitar("EVIDENCIA 7","EVIDENCIA 8");
                                break;
                            case "EVIDENCIA 8":
                                habilitar("EVIDENCIA 8","EVIDENCIA 9");
                                break;
                            case "EVIDENCIA 9":
                                habilitar("EVIDENCIA 9","EVIDENCIA 10");
                                break;
                            case "EVIDENCIA 10":
                                habilitar("EVIDENCIA 10","EVIDENCIA 11");
                                break;
                            case "EVIDENCIA 11":
                                habilitar("EVIDENCIA 11","EVIDENCIA 12");
                                break;

                            default:
                                break;
                            }
                        }
 
                    const opciones =document.querySelectorAll(".check");
                    opciones.forEach((el)=>{
                        el.addEventListener("click",ejecutar);
                        
                    })
    

                }
                else 
                {
                    json.forEach((el)=>{
                        let textoo = el.nom_evidencias;
                        const elemento2 =document.createElement('input');
                        const labell = document.createElement('label');
                        const contenedorr = document.createElement('div');
                        elemento2.setAttribute("type","checkbox");
                        elemento2.setAttribute("id" , `${el.nom_evidencias}`);
                        labell.setAttribute("for" , `${el.nom_evidencias}`);
                        elemento2.setAttribute("class", "check");
                        elemento2.setAttribute("name","check");
                        elemento2.setAttribute("value",`${el.id_evidencias}`)
                        if(el.nom_evidencias === "EVIDENCIA PARCIAL"){
                            elemento2.removeAttribute("disabled");
                        }else{
                            elemento2.setAttribute("disabled" , "true");
                        }
                        labell.appendChild(document.createTextNode(textoo));
                        contenedorr.appendChild(elemento2);
                        contenedorr.appendChild(labell);
                        formula.appendChild(contenedorr);
                        //elemento1.style.display ="block";
                        fragmen.appendChild(elemento2);
                    })
                    formula.appendChild(fragmen);
                    
                 // funcion habilitar elemento
                    function habilitar(elemento,habili)
                    {
                        const elementohabilitar = document.getElementById(habili);
                        const habilitardos = document.getElementById(elemento);
                        
    
                                if(habilitardos.checked==true){
                                let conf  = confirm("esta seguro de calificar la actividad");
                                    if(conf== true){
                                        elementohabilitar.removeAttribute("disabled");
                                    }
                                    else{
                                        habilitardos.checked=false;
                                    }
                                    
                                }
                    }

                        function ejecutar(e)
                        {
                        switch (e.target.id) 
                            {
                            case "EVIDENCIA PARCIAL":
                                habilitar("EVIDENCIA PARCIAL","EVIDENCIA FINAL");
                                break;
                            default:
                                break;
                            }
                        }
 
                    const opciones =document.querySelectorAll(".check");
                    opciones.forEach((el)=>{
                        el.addEventListener("click",ejecutar);
                        
                    })

                }
            
            }
        })
        xhr.open("POST","evi.php");
        xhr.send(new FormData(formu));
        
});



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
    
})



function relacion (apren)
{
    const hidden = document.getElementById("hidden");
    hidden.innerHTML = `<input type="hidden" name="documenapre" value="${apren}" > `
}


