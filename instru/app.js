//variables
const mostrartd = document.getElementById("seguimi");//boton para seguimiento de  evidencias 
const informacion = document.getElementById("infor");//div de seguimiento de evidencias
const salii = document.getElementById("salirr");//boton de salir

const mostrarcali = document.getElementById("calificaa");
const vercali = document.getElementById("cali");
const saliii = document.getElementById("salirrr");//boton de salir

const fond = document.getElementById("fondo")//imagen de fondo del perfil del usuario
const inf = document.getElementById("date")
const datosapre = document.getElementById("informa")//informacion del aprendiz
const boton = document.getElementById("boton");//boton para ejecutar la busqueda del aprendiz
const documento = document.getElementById("documento");//input que contiene el documento del aprendiz
const formEvidencia = document.getElementById("tipoEvidencia");//Cuerpo de seleccion de evidencia
const tipoEvidencia = document.getElementById("inicio");//seleccion de evidencia
const salir2 = document.getElementById("salir2");//boton de salir de calidicar
const evidencia1 = document.getElementById("evidencias1");//Formulario evidencia Quincenales
const evidencia2 = document.getElementById("evidencias2");//Formulario evidencia Trimestrales

const calificar = document.querySelector("#calificar");//Boton para calificar
const formu = document.getElementById("fomutievi");
const usuario = document.getElementById("tip_evi");
const formula = document.getElementById("fore");
const che = document.getElementById("che");
const contenedor = document.getElementById('contenedor');

const intento = document.getElementById('intento');
const fragmen = document.createDocumentFragment();
console.log(intento)
console.log(formu)
formu.addEventListener("submit", (e)=>
{
    e.preventDefault();
    console.log(formu)
        const xhr = new XMLHttpRequest();
        xhr.addEventListener("readystatechange",(e)=>{
            if(xhr.readyState !== 4) return;
            if(xhr.status >= 200 && xhr.status <300)
            {
                let json = JSON.parse(xhr.responseText);
                console.log(json)
                if(json[0].id_tip_evi==2)
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
                    
                        label.appendChild(document.createTextNode(texto));
                        label.appendChild(elemento1);

                        contenedor.appendChild(label);
                        fragmen.appendChild(contenedor);
                
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
                        elemento2.setAttribute("value",`${el.id_evidencias}`);
                        
                        labell.appendChild(document.createTextNode(textoo));
                        
                        labell.appendChild(elemento2);
                        contenedorr.appendChild(labell);
                        che.appendChild(contenedorr);
                    })
                    
                    

                }
                const boton=document.createElement('button')
                boton.setAttribute("class","botorara")
                boton.setAttribute("type","submit")
                boton.setAttribute("value","calificar")
                boton.setAttribute("placeholder","calificar")
                che.appendChild(boton)
                che.appendChild(fragmen);
                
            }
        })
        xhr.open("POST","evi.php");
        xhr.send(new FormData(formu));
        
});

formula.addEventListener("submit",(e)=>{
    e.preventDefault();
    let datos = new FormData(formula),
        // documenapre= datos.get('documenapre'),
        check= datos.get('check'),
        data = new URLSearchParams();

    data.append("check",check);
    // data.append("apre",documenapre)

    fetch("evidencias.php",{
        method:'POST',
        body:data
    })
        .then( res => res.ok ? res.json():Promise.reject(res))
        .then(data => {
            console.log(data)

        if (data== 'ok'){
            alert("evidencia calificada")
            location.reload()
        }

        })
        .catch(error => console.log(error))

})



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
            //   info.innerHTML = 
             relacion(docuBase);
             relacionar(docuBase);
          }
      }
      xhr.send()
}

// mostrar opciones de evidencias
mostrartd.addEventListener('click', (e)=>{
    e.preventDefault();
    fond.style.opacity="0";
    inf.style.opacity="0";
    mostrartd.style.background="#238276";
    informacion.style.opacity="1";
    informacion.style.visibility="visible";
    vercali.style.opacity="0";
    vercali.style.visibility="hidden";
    mostrarcali.style.background="#fff";
})

mostrarcali.addEventListener('click', (e)=>{
    e.preventDefault();
    fond.style.opacity="0";
    inf.style.opacity="0";
    mostrarcali.style.background="#238276";
    vercali.style.opacity="1";
    vercali.style.visibility="visible";
    informacion.style.opacity="0";
    informacion.style.visibility="hidden";
    mostrartd.style.background="#fff";
})

// salir de evidencias
salii.addEventListener('click', (e)=>{
    e.preventDefault();
    mostrartd.style.background="#fff";
    informacion.style.opacity="0";
    informacion.style.visibility="hidden";
    fond.style.opacity="1";
    inf.style.opacity="1";
})

saliii.addEventListener('click', (e)=>{
    e.preventDefault();
    mostrarcali.style.background="#fff";
    vercali.style.opacity="0";
    vercali.style.visibility="hidden";
    fond.style.opacity="1";
    inf.style.opacity="1";
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

boton.addEventListener('submit',relacion)

function relacion (apren)
{
    const hidden = document.getElementById("hidden");
    hidden.innerHTML = `<input type="hidden" name="documenapre" value="${apren}" > `
    console.log(hidden)
}


calificar.addEventListener('submit',relacionar)
function relacionar (aprendiz)
{
    const hidden = document.getElementById("apren");
    hidden.innerHTML = `<input type="hidden" name="documenapre" value="${aprendiz}" > `
    console.log(hidden)
}
