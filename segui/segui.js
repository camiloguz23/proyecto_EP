// varibles 

const boton = document.getElementById("boton")
const documento = document.getElementById("documento")
const btnEmpresa = document.getElementById("btnEmpresa")
const btnLegalizar = document.getElementById("btnLegalizar")
const formularioEmpresa = document.querySelector(".registroEmpre")
const formularioLegalizacion = document.querySelector(".registroLegal")
const btnaprendiz = document.querySelector("#tres")
const registroAprendiz = document.getElementById("registroAprendiz")
const btnLEgalizacion = document.getElementById("legal");
const formularioDocu = document.getElementById("formularioDocu")
const cerrarEmpresa = document.getElementById("cerrarEmpresa")
const btnCerrarDocu = document.getElementById("btnCerraDocu")
const forbus = document.getElementById("formulabus");
const forb = document.getElementById("most");
const alternativa = document.getElementById("tipoAlte")
const cargaDocu = document.getElementById("cargaDocu")
const certificacion = document.getElementById("dos")
const buscadorCerti = document.querySelector(".datosMostrar2")
const botonCerrarLega = document.getElementById("btnCerrarlega")

const formulariolega = document.getElementById("buscarDocu")
const informar = document.querySelector(".informacion")

// variables para el formulario de certificacion
const formularioCerti = document.getElementById("cargaArchi")
const btnEnviar = document.getElementById("btnEnviar")
const datoAprendiz = document.getElementById("datoAprendiz")


// FUNCIONES 
function formulegalizar(e) {
    e.preventDefault();
    formularioLegalizacion.style.display ="block"



    
}

btnCerraDocu.addEventListener("click", function (e){
    e.preventDefault();
    formulariolega.reset();
    informar.style.display = "none"
    btnLEgalizacion.style.background = ("#ffffff")
    btnLEgalizacion.style.color = ("black")


}, true);

function formuEmpresa(e) {
    e.preventDefault();
    formularioEmpresa.style.display = "block"
    
}

function ocultarEmpresa(e) {
    e.preventDefault();
    console.log(formularioEmpresa)
    formularioEmpresa.style.display = "none";
    console.log(formularioEmpresa)
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
            datoAprendiz.innerHTML = ` <input type="hidden" name="usuario" value="${docuBase}">`
            informar.style.display = "block"
        }
    }
    xhr.send()
}

function crear(e) {
    e.preventDefault();
    console.log(registroAprendiz)
    registroAprendiz.style.display = "block"

}

function mostrar(e) {
    e.preventDefault();
    formularioDocu.style.display = "block";
    btnLEgalizacion.style.background = ("rgb(252, 115, 35)")
    btnLEgalizacion.style.color = ("#ffffff")
}


function ocultarLegalizacion(e) {
    e.preventDefault();
    formularioDocu.style.display = "none"
    
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
    console.log("funciona")
    buscadorCerti.style.display = "block"
    
}

function btncerrarlegal() {
    
    formularioLegalizacion.style.display = "none"
}
// EVENTOS 
btnLegalizar.addEventListener("click", formulegalizar)
btnEmpresa.addEventListener("click", formuEmpresa)
boton.addEventListener("click", consulta)
btnaprendiz.addEventListener("click", crear)
btnLEgalizacion.addEventListener("click", mostrar)
cerrarEmpresa.addEventListener("click", ocultarEmpresa)
btnCerrarDocu.addEventListener("click", ocultarLegalizacion)
alternativa.addEventListener("blur", funAlte)
certificacion.addEventListener("click", buscador)
botonCerrarLega.addEventListener("click", btncerrarlegal)

/// evento de certificacion 

btnEnviar.addEventListener("click", enviaBD)

function enviaBD(e) {
    e.preventDefault();
    const datos = new FormData(formularioCerti)
    fetch("../php/certificado.php", {
        method: "POST",
        body : datos
    })
        .then(res => res.text())
        .then(bd => {
            console.log(bd)
        })
}