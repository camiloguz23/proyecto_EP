const creausu = document.getElementById("uno");
const concrea = document.getElementById("creausu");
const fon = document.getElementById("fondo");
const cerrar = document.getElementById("cerrar");
const formulario_apren = document.getElementById("aprendizform")
const boton_enviar = document.getElementById("btn_enviar")
const btn_crear_apre = document.getElementById("create")
const conte_formu_apren = document.getElementById("conteaprendiz")
const cerrar_formu_apren = document.getElementById("btn_cerrra")
const menu_formu = document.getElementById("menu_form")
const link_menu = document.getElementById("link_menu")
const formu_formacion = document.getElementById("formulario_formacion")
const btn_uno = document.getElementById("btn_uno")
const conte_fomu_formulario = document.getElementById("formu_formacion")
const btn_cerrar_formulario = document.getElementById("btn_dos")
const link_formacion = document.getElementById("link_formacion")
const conte_ficha = document.getElementById("conte_ficha")
const formulario_ficha = document.getElementById("formulario_ficha")
const enviar_ficha = document.getElementById("enviar_ficha")
const cerrar_ficha = document.getElementById("cerrar_ficha")
const link_ficha = document.getElementById("link_ficha")
const conte_empresa = document.getElementById("conte_empresa")
const btn_cerrar_empresa = document.getElementById("btn_cerrar_empresa")
const link_empresa = document.getElementById("link_empresa")
const formulario_empresa = document.getElementById("formualario_empresa")
const linkFicha = document.getElementById("linkFicha")

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
            alert("datos ingresados no completos")
        }else if (bd == 3) {
            alert("no envio de datos a la base de datos")
            formulario_apren.reset()
        }else {
            alert(`el aprendiz ya ${bd}`)
            formulario_apren.reset()
        }
    })
})

// *************************** MENU DE FORMULARIOS *****************************

link_menu.addEventListener("click", () => {
    menu_formu.classList.toggle("ocultar")
})

// ****************** FORMULARIO DE FORMACION **********************

link_formacion.addEventListener("click", () => {
    conte_fomu_formulario.style.visibility = "visible"
    menu_formu.classList.toggle("ocultar")
})

btn_cerrar_formulario.addEventListener("click", () => {
    conte_fomu_formulario.style.visibility = "hidden"
    formu_formacion.reset()
})

btn_uno.addEventListener("click", (e) => {
    e.preventDefault()
    const dato = new FormData(formu_formacion)
    fetch("../php/createFormacion.php", {
        method:"POST",
        body: dato
    }).then(res => res.text()).then(info => {
        if (info == 1){
            alert("Formulario incompleto")
        }else if (info == 2){
            formu_formacion.reset()
            alert("Formacion creada")
            window.location = "admin.php"
        }
    })
})

// ***************** FORMULARIO DE CREACION DE FICHA **********************

enviar_ficha.addEventListener("click", (e) => {
    e.preventDefault()

    const dato_ficha = new FormData(formulario_ficha)
    fetch("../php/crearFicha.php", {
        method:"POST",
        body:dato_ficha
    }).then(res => res.text()).then(info_ficha => {
        console.log(info_ficha)
        if (info_ficha == 1){
            alert("Ficha de formacion creada")
            formulario_ficha.reset()
            window.location= "admin.php"
        } else if (info_ficha == 2){
            alert("No se guardo el aprendiz")

        } else if (info_ficha == 3){
            alert("Formulario ficha tiene datos vacios")
        }
    })
})

cerrar_ficha.addEventListener("click", (e) => {
    e.preventDefault()
    conte_ficha.style.visibility = "hidden"
    formulario_ficha.reset()
})

link_ficha.addEventListener("click", (e) => {
    e.preventDefault()
    conte_ficha.style.visibility = "visible"
    menu_formu.classList.toggle("ocultar")


})

linkFicha.addEventListener("click", (e) => {
    e.preventDefault()
    conte_ficha.style.visibility = "visible"
    menu_formu.classList.toggle("ocultar")
})

// ******************************************* FORMULARIO DE EMPRESA ********************

link_empresa.addEventListener("click", (e) => {
    conte_empresa.style.visibility = "visible"
    menu_formu.classList.toggle("ocultar")
})

btn_cerrar_empresa.addEventListener("click", (e) => {
    conte_empresa.style.visibility = "hidden"
    formulario_empresa.reset()

})
