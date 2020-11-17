//variables
const mostrartd = document.getElementById("seguimi");//boton para seguimiento de  evidencias 
const informacion = document.getElementById("infor");//div de seguimiento de evidencias
const salii = document.getElementById("salirr");//boton de salir
const fond = document.getElementById("fondo")//imagen de fondo del perfil del usuario
const datosapre = document.getElementById("informa")//informacion del aprendiz
const boton = document.getElementById("boton");//boton para ejecutar la busqueda del aprendiz
const documento = document.getElementById("documento");//input que contiene el documento del aprendiz
const formu = document.getElementById("fomutievi");
const usuario = document.getElementById("tip_evi");
const formula = document.getElementById("fore");
const fragmen = document.createDocumentFragment();

// funcion para tipos de evidencia
formu.addEventListener("submit", (e)=>
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
                    // json.forEach((el)=>{
                    //     const elemento1=document.createElement('input');
                    //     elemento1.setAttribute("type","checkbox");
                    //     //elemento1.setAttribute("id",`${el[0].nom_evidencias}`)
                    //     elemento1.innerHTML=`${el.nom_evidencias}`;
                    //     fragmen.appendChild(elemento1);
                    // })
                    // formula.appendChild(fragmen)
                    
                    const form = `
                    <form class=""  action="" id="evidencias" method="POST">
                        <input type="number" id="docu" placeholder="DOCUMENTO DEL APRENDIZ"> <br>
                        <input type="checkbox" id="chec1" class="check"> evidencia N°1<br>
                        <input type="checkbox" id="chec2" disabled="" class="check"> evidencia N°2 <br>
                        <input type="checkbox" id="chec3" disabled="" class="check"> evidencia N°3  <br>
                        <input type="checkbox" id="chec4" disabled="" class="check"> evidencia N°4 <br>   
                        <input type="checkbox" id="chec5" disabled="" class="check"> evidencia N°5 <br> 
                        <input type="checkbox" id="chec6" disabled="" class="check"> evidencia N°6 <br>
                        <input type="checkbox" id="chec7" disabled="" class="check"> evidencia N°7 <br> 
                        <input type="checkbox" id="chec8" disabled="" class="check"> evidencia N°8 <br> 
                        <input type="checkbox" id="chec9" disabled="" class="check"> evidencia N°9  <br>
                        <input type="checkbox" id="chec10" disabled="" class="check"> evidencia N°10 <br> 
                        <input type="checkbox" id="chec11" disabled="" class="check"> evidencia N°11 <br> 
                        <input type="checkbox" id="chec12" disabled="" class="check"> evidencia N°12  <br>         
                        <div class="botoonn">
                        <input type="date" id="fecha">
                            <div class="funsi">
                                <button id="cancelar" type="submit">Cancelar</button>
                                <button id="guardar" type="submit">Guardar</button>
                            </div>
                        </div>
                    </form>`;

                    formula.innerHTML=form;
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
                            case "chec1":
                                habilitar("chec1","chec2");
                                break;
                            case "chec2":
                                habilitar("chec2","chec3");
                                break;
                            case "chec3":
                                habilitar("chec3","chec4");
                                break;
                            case "chec4":
                                habilitar("chec4","chec5");
                                break;
                            case "chec5":
                                habilitar("chec5","chec6");
                                break;
                            case "chec6":
                                habilitar("chec6","chec7");
                                break;
                            case "chec7":
                                habilitar("chec7","chec8");
                                break;
                            case "chec8":
                                habilitar("chec8","chec9");
                                break;
                            case "chec9":
                                habilitar("chec9","chec10");
                                break;
                            case "chec10":
                                habilitar("chec10","chec11");
                                break;
                            case "chec11":
                                habilitar("chec11","chec12");
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
                else if(json.id_tip_eviden ==1)
                {
                    const formu2=`´
                    <form class=""  action="" id="evidenciaas2"  method="POST">

                        <div class="formann">
                            <div class="evi3">
                                <span class="" id="">Evidencia N°1 - - - - - - </span>  <input type="checkbox"> <br>
                                
                                <span class="" id="">Evidencia N°2 - - - - - - </span>  <input type="checkbox">  
                                    
                            </div>  

                        </div>
                        <div class="botoonnn">
                                <input type="date" id="fecha1">
                                <div class="funsin">
                                    <button id="cancelarr" type="submit">Cancelar</button>
                                    <button id="guardarr" type="submit">Guardar</button>
                                </div>
                        </div>
                    </form>`;
                    formula.innerHTML=formu2;

                }
            
            }
        })
        xhr.open("POST","evi.php");
        xhr.send(new FormData(formu));
        
});

//funcion para consultar
boton.addEventListener("click", consulta);
function consulta(e) {
    e.preventDefault();  
      let xhr = new XMLHttpRequest();
      const docuBase = documento.value 
      xhr.open("get","../php/aprendiz.php?documento=" + docuBase,true)
      xhr.onreadystatechange = function () {
          if(xhr.readyState == 4 && xhr.status == 200){
              const info = document.querySelector("#informa")
              info.innerHTML = xhr.responseText;
            //   estudiante(docuBase);
          }
      }
      xhr.send()
}



// mostrar opciones de legalizacion
mostrartd.addEventListener('click', (e)=>{
    e.preventDefault();
    fond.style.opacity="0";
    mostrartd.style.background="#238276";
    informacion.style.opacity="1";
    informacion.style.visibility="visible";
})

// salir de legalizacion
salii.addEventListener('click', (e)=>{
    e.preventDefault();
    mostrartd.style.background="#fff";
    informacion.style.opacity="0";
    informacion.style.visibility="hidden";
    fond.style.opacity="1";
})



