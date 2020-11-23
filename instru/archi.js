const formu = document.getElementById("fomutievi");
const usuario = document.getElementById("tip_evi");
const formula = document.getElementById("fore");


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
                    
                    const form = `
                    <form class=""  action="" id="evidencias" method="POST">
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
                else 
                {
                    const formu2=`
                    <form class=""  action="" id="evidenciaas2"  method="POST">

                    <input type="checkbox" id="chec13" class="check"> evidencia N°1<br>
                    <input type="checkbox" id="chec14" disabled="" class="check"> evidencia N°2 <br>
                        <div class="botoonnn">
                                <input type="date" id="fecha1">
                                <div class="funsin">
                                    <button id="cancelarr" type="submit">Cancelar</button>
                                    <button id="guardarr" type="submit">Guardar</button>
                                </div>
                        </div>
                    </form>`;
                    formula.innerHTML=formu2;

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
                            case "chec13":
                                habilitar("chec13","chec14");
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


