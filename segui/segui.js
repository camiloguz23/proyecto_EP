// varibles 

const boton = document.getElementById("boton")
const documento = document.getElementById("documento")
const btnEmpresa = document.getElementById("btnEmpresa")
const btnLegalizar = document.getElementById("btnLegalizar")
const formularioEmpresa = document.querySelector(".registroEmpre")
const formularioLegalizacion = document.querySelector(".registroLegal")
const formularioEmpresaCerrar = document.querySelector("#registroEmpre")
// boton aprendiz
const btnaprendiz = document.querySelector("#tres")
const registroAprendiz = document.getElementById("registroAprendiz")
const btncerrarAprendiz = document.getElementById("btncerrarAprendiz")
// boton legal
const btnLEgalizacion = document.getElementById("legal");
const formularioDocu = document.getElementById("formularioDocu")
const cerrarEmpresa = document.getElementById("cerrarEmpresa")
const btnCerrarDocu = document.getElementById("btnCerraDocu")
const forbus = document.getElementById("formulabus");
const forb = document.getElementById("most");
const alternativa = document.getElementById("tipoAlte")
const cargaDocu = document.getElementById("cargaDocu")
// boton certificación
const certificacion = document.getElementById("dos")
const buscadorCerti = document.querySelector(".datosMostrar2")
const botonCerrarLega = document.getElementById("cerrarCerti")

const formulariolega = document.getElementById("buscarDocu")
const informar = document.querySelector(".informacion")

// variables para el formulario de certificacion
const formularioCerti = document.getElementById("formularioCertificacion")
const btnEnviar = document.getElementById("btnEnviar")
const datoAprendiz = document.getElementById("datoAprendiz")

const resetformuceti = document.getElementById("cargaArchi")


// Variables para el formulario de legalización
const registroLegal = document.getElementById("registroLegal")
const btn_cerrarForm = document.getElementById("btn_cerrarLegal")
const legalForm = document.getElementById("legalForm")


// Formulario de legalizar 
const formLegalizar = document.getElementById("formLegalizar")
const botonCrear =document.getElementById("crear")

// Formulario actualizar
const formactualizar = document.getElementById("formularito")
const botoneditar =document.getElementById("botonEditar")

const botonaparecere =document.getElementById("aparecerE")

botonaparecere.addEventListener("click", (e) => {
    e.preventDefault()
    formactualizar.style.display = "block"
    
})

/*cerrarcer.addEventListener("click", (e) => {
    e.preventDefault()
    formularioCerti.style.display = "none"
})*/


botoneditar.addEventListener("click", (e) => {
    e.preventDefault()
    formactualizar.style.display = "none"
    legalForm.reset();
})


// FUNCIONES 
function formulegalizar(e) {
    e.preventDefault();
    let xhr = new XMLHttpRequest();
    const docuBase = documento.value 
    xhr.open("get","../php/validarEstado.php?documento=" + docuBase,true)
    xhr.onreadystatechange = function () {
        if(xhr.readyState == 4 && xhr.status == 200){
            if (xhr.responseText == 2) {
                alert("aprendiz ya esta legalizado")           
            }else{
                formularioLegalizacion.style.display ="block"
            }
           
        }
    }
    xhr.send()
    
}

btnCerraDocu.addEventListener("click", function (e){
    e.preventDefault();
    formulariolega.reset();
    informar.style.display = "none"
    btnLEgalizacion.style.background = ("#ffffff")
    btnLEgalizacion.style.color = ("black")


}, true);

btn_cerrarForm.addEventListener("click", (e) => {
    e.preventDefault()
    registroLegal.style.display = "none"
    legalForm.reset();
})

function formuEmpresa(e) {
    e.preventDefault();
    formularioEmpresa.style.display = "block"
    
}

function ocultarEmpresa(e) {
    e.preventDefault();
    console.log(formularioEmpresa)
    formularioEmpresa.style.display = "none";
    console.log(formularioEmpresa)
    formularioEmpresaCerrar.reset();
}


function consulta(e) {
  e.preventDefault();  
    let xhr = new XMLHttpRequest();
    const docuBase = documento.value 
    xhr.open("get","../php/aprendiz.php?documento=" + docuBase,true)
    xhr.onreadystatechange = function () {
        if(xhr.readyState == 4 && xhr.status == 200){
            const info = document.querySelector("#informa")
            info.innerHTML = xhr.responseText;
            estudiante(docuBase);
            datoAprendiz.innerHTML = ` <input type="hidden" name="docuAprendiz" value="${docuBase}">`
            informar.style.display = "block"
            const estadoAprend = document.getElementById("estadoAprend").value
            console.log(estadoAprend+"funciona")
        }
    }
    xhr.send()
}
// formulario de registro del aprendiz
function crear(e) {
    e.preventDefault();
    console.log(registroAprendiz)
    registroAprendiz.style.display = "block"
    
    formularioDocu.style.display = "none"


}

function cerrarAprendiz(e) {
    e.preventDefault();
    const form = document.getElementById("frmajax")
    registroAprendiz.style.display = "none";
    form.reset();
}

function mostrar(e) {
    e.preventDefault();
    formularioDocu.style.display = "block";
    btnLEgalizacion.style.background = ("rgb(252, 115, 35)")
    btnLEgalizacion.style.color = ("#ffffff")
    registroAprendiz.style.display = "none"
}


function ocultarLegalizacion(e) {
    e.preventDefault();
    formularioDocu.style.display = "none"
    formulegalizar.reset();
    
}

function funAlte() {
    const datoalter = alternativa.value

    switch (datoalter) {
        case "1":
            cargaDocu.innerHTML = `
            <Label class="label">Formato GFPI-F-023</Label>
            <input class="archivo" type="file" name="GFPI"><br>
            <Label class="label">Contrato de aprendizaje</Label>
            <input class="archivo" type="file" name="ContratoAprendizaje">
            `
            break;
        case "2":
            cargaDocu.innerHTML = `
            <Label class="label">Formato GFPI-F-023</Label>
            <input class="archivo" type="file" name="GFPI"><br>
            <Label class="label">Carta de solicitud</Label>
            <input class="archivo" type="file" name="CartaSolicitud"><br>
            <Label class="label">Constacia de la empresa</Label>
            <input class="archivo" type="file" name="Cartaempresa">
            `
            break;
        case "3":  // "Pasantía: Apoyo unidad productiva familiar"
            cargaDocu.innerHTML = `
            <Label class="label">Formato GFPI-F-023</Label>
            <input class="archivo" type="file" name="GFPI"><br>
            <Label class="label">Carta de solicitud</Label>
            <input class="archivo" type="file" name="CartaSolicitud"><br>
            <Label class="label">Constacia de la empresa</Label>
            <input class="archivo" type="file" name="Cartaempresa"><br>
            <Label class="label">Fotocopia del carnet de afiliacion a EPS o documento Fosyga</Label>
            <input class="archivo" type="file" name="fotocopiaEPS"><br>
            <Label class="label">Fotocopia de la cedula 150%</Label>
            <input class="archivo" type="file" name="FotocopiaCC">
            `
            break;
        case "4":  // "Pasantia:Apoyo entidad estatal, municipal, verdal u OMG"
            cargaDocu.innerHTML = `
            <Label class="label">Formato GFPI-F-023</Label>
            <input class="archivo" type="file" name="GFPI"><br>
            <Label class="label">Carta de solicitud</Label>
            <input class="archivo" type="file" name="CartaSolicitud"><br>
            <Label class="label">Constacia de la empresa</Label>
            <input class="archivo" type="file" name="Cartaempresa"><br>
            <Label class="label">Fotocopia del carnet de afiliacion a EPS o documento Fosyga</Label>
            <input class="archivo" type="file" name="fotocopiaEPS"><br>
            <Label class="label">Fotocopia de la cedula 150%</Label>
            <input class="archivo" type="file" name="FotocopiaCC">
            `
            break;
        case "5": // Pasantia : Monitoria
            cargaDocu.innerHTML = `
            <Label class="label">Formato GFPI-F-023</Label>
            <input class="archivo" type="file" name="GFPI"><br>
            <Label class="label">Carta de solicitud</Label>
            <input class="archivo" type="file" name="CartaSolicitud"><br>
            <Label class="label">Constacia de la empresa</Label>
            <input class="archivo" type="file" name="Cartaempresa"><br>
            <Label class="label">Fotocopia del carnet de afiliacion a EPS o documento Fosyga</Label>
            <input class="archivo" type="file" name="fotocopiaEPS"><br>
            <Label class="label">Fotocopia de la cedula 150%</Label>
            <input class="archivo" type="file" name="FotocopiaCC">
            `
            break;
        case "6":  // Servicio Militar (social)
            cargaDocu.innerHTML = `
            <Label class="label">Formato GFPI-F-023</Label>
            <input class="archivo" type="file" name="GFPI"><br>
            <Label class="label">Carta de solicitud</Label>
            <input class="archivo" type="file" name="CartaSolicitud"><br>
            <Label class="label">Constacia de la empresa</Label>
            <input class="archivo" type="file" name="Cartaempresa">
            `
            break;
        case "7": // Proyecto productivo
            cargaDocu.innerHTML = `
            <Label class="label">Formato GFPI-F-023</Label>
            <input class="archivo" type="file" name="GFPI"><br>
            <Label class="label">Carta de solicitud</Label>
            <input class="archivo" type="file" name="CartaSolicitud"><br>
            <Label class="label">Fotocopia del carnet de afiliacion a EPS o documento Fosyga</Label>
            <input class="archivo" type="file" name="fotocopiaEPS"><br>
            <Label class="label">Fotocopia de la cedula 150%</Label>
            <input class="archivo" type="file" name="FotocopiaCC">
            `
        	break;
        default:
            cargaDocu.innerHTML =`<input type="hidden" name="">`
            break;
    }
}

function estudiante(datoEstu) {
    
    const estudiante = document.getElementById("estudiante")
    estudiante.innerHTML = ` <input type="hidden" name="docuEstudiante" value="${datoEstu}">`
}

function buscador(e) {
    e.preventDefault();
    console.log("funciona 227")
    formularioCerti.style.display = "block"
}

function btncerrarlegal() {
    
    formularioCerti.style.display = "none"
    resetformuceti.reset()
}
// EVENTOS 
btnLegalizar.addEventListener("click", formulegalizar)
btnEmpresa.addEventListener("click", formuEmpresa)
botonCrear.addEventListener("click", formuEmpresa)
boton.addEventListener("click", consulta)
btnaprendiz.addEventListener("click", crear)
btnLEgalizacion.addEventListener("click", mostrar)
cerrarEmpresa.addEventListener("click", ocultarEmpresa)
btnCerrarDocu.addEventListener("click", ocultarLegalizacion)
alternativa.addEventListener("blur", funAlte)
certificacion.addEventListener("click", buscador)
btncerrarAprendiz.addEventListener("click", cerrarAprendiz)
botonCerrarLega.addEventListener("click", btncerrarlegal)

/// evento de certificacion 

btnEnviar.addEventListener("click", enviaBD)

function enviaBD(e) {
    e.preventDefault();
    console.log("funciona")
    const datos = new FormData(resetformuceti)
    fetch("../php/certificado.php", {
        method: "POST",
        body : datos
    })
        .then(res => res.text())
        .then(bd => {
            console.log(bd)
            if (bd == "existo") {
                alert("alumno ya esta en inicio de certificacion")
                setTimeout(() => {
                    resetformuceti.reset();
                    formularioCerti.style.display="none"
                }, 2000);
            }
        })
        .catch(error => console.log(error))
}