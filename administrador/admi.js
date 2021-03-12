const creausu = document.getElementById("uno");
const concrea = document.getElementById("creausu");
const fon = document.getElementById("fondo");
const cerrar = document.getElementById("cerrar");
const formulario_apren = document.getElementById("aprendizform")
const boton_enviar = document.getElementById("btn_enviar")
const btn_crear_apre = document.getElementById("create")
const conte_formu_apren = document.getElementById("conteaprendiz")
const cerrar_formu_apren = document.getElementById("btn_cerrra")

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

//***************************** MOSTRAR y CERRAR EL FOMULARIO DEL APRENDIZ **************

btn_crear_apre.addEventListener("click", () => {
    conte_formu_apren.style.visibility = "visible"
})

cerrar_formu_apren.addEventListener("click", (e) => {
    e.preventDefault()
    conte_formu_apren.style.visibility = "hidden"
    formulario_apren.reset()
})


// ************************ FORMULARIO DE APRENDIZ ***************************

boton_enviar.addEventListener("click", (e) => {

    e.preventDefault()
    const dat_formu = new FormData(formulario_apren)
    fetch("../php/crear.php", {
        method : "POST",
        body : dat_formu

    }).then(res => res.text()).then(bd =>{
        console.log(bd)

        if (bd == 1){
            formulario_apren.reset()
            alert("aprendiz registrado")
        } else if (bd == 2){
            alert("datos no ingresados completos")
        }else {
            alert("no envio de datos a la base de datos")
        }
    })
})