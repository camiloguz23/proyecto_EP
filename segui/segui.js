// varibles 

const boton = document.getElementById("boton")
const documento = document.getElementById("documentole")
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
const cerrarEmpresad = document.getElementById("cerrarEmpresad")

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
const legalForm = document.getElementById('legalForm');


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
/* ---------------------------hola------------------------------- */
function ocultarEmpresa(e) {
    e.preventDefault();
    console.log(formularioEmpresa)
    formularioEmpresa.style.display = "none";
    console.log(formularioEmpresa)
    formularioEmpresaCerrar.reset();
}

function ocultarEmpresad(e) {
    e.preventDefault();
    console.log(formularioEmpresa)
    formularioEmpresa.style.display = "none";
    console.log(formularioEmpresa)
    formularioEmpresaCerrar.reset();
}


function consulta(e) {
  e.preventDefault();  
  console.log(documento.value)
    let xhr = new XMLHttpRequest();
    const docuBase = documento.value 
    xhr.open("get","../php/aprendiz.php?documento=" + docuBase,true)
    xhr.onreadystatechange = function () {
        if(xhr.readyState == 4 && xhr.status == 200){
            const info = document.querySelector("#informa")
            info.innerHTML = xhr.responseText;
            estudiante(docuBase);
            datoAprendizinnerHTML = ` <input type="hidden" name="docuAprendiz" value="${docuBase}">`
            informar.style.display = "block"
            // const estadoAprend = document.getElementById("estadoAprend").value
            // console.log(estadoAprend+"funciona")
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
            <input class="archivo" type="file" name="GFPI" onchange="return validarExt_GFPI()" id="GFPI" required><br>
            <Label class="label">Contrato de aprendizaje</Label>
            <input class="archivo" type="file" name="ContratoAprendizaje" onchange="return validarExt_ContratoAprendizaje()" id="ContratoAprendizaje" required>
            `
            break;
        case "2":
            cargaDocu.innerHTML = `
            <Label class="label">Formato GFPI-F-023</Label>
            <input class="archivo" type="file" name="GFPI" onchange="return validarExt_GFPI()" id="GFPI" required><br>
            <Label class="label">Carta de solicitud</Label>
            <input class="archivo" type="file" name="CartaSolicitud" onchange="return validarExt_CartaSolicitud()" id="CartaSolicitud" required><br>
            <Label class="label">Constacia de la empresa</Label>
            <input class="archivo" type="file" name="Cartaempresa" onchange="return validarExt_Cartaempresa()" id="Cartaempresa" required>
            `
            break;
        case "3":  // "Pasantía: Apoyo unidad productiva familiar"
            cargaDocu.innerHTML = `
            <Label class="label">Formato GFPI-F-023</Label>
            <input class="archivo" type="file" name="GFPI" onchange="return validarExt_GFPI()" id="GFPI" required><br>
            <Label class="label">Carta de solicitud</Label>
            <input class="archivo" type="file" name="CartaSolicitud" onchange="return validarExt_CartaSolicitud()" id="CartaSolicitud" required><br>
            <Label class="label">Constacia de la empresa</Label>
            <input class="archivo" type="file" name="Cartaempresa" onchange="return validarExt_Cartaempresa()" id="Cartaempresa" required><br>
            <Label class="label">Fotocopia del carnet de afiliacion a EPS o documento Fosyga</Label>
            <input class="archivo" type="file" name="fotocopiaEPS" onchange="return validarExt_fotocopiaEPS()" id="fotocopiaEPS" required><br>
            <Label class="label">Fotocopia de la cedula 150%</Label>
            <input class="archivo" type="file" name="FotocopiaCC" onchange="return validarExt_FotocopiaCC()" id="FotocopiaCC" required>
            `
            break;
        case "4":  // "Pasantia:Apoyo entidad estatal, municipal, verdal u OMG"
            cargaDocu.innerHTML = `
            <Label class="label">Formato GFPI-F-023</Label>
            <input class="archivo" type="file" name="GFPI" onchange="return validarExt_GFPI()" id="GFPI" required><br>
            <Label class="label">Carta de solicitud</Label>
            <input class="archivo" type="file" name="CartaSolicitud" onchange="return validarExt_CartaSolicitud()" id="CartaSolicitud" required><br>
            <Label class="label">Constacia de la empresa</Label>
            <input class="archivo" type="file" name="Cartaempresa" onchange="return validarExt_Cartaempresa()" id="Cartaempresa" required><br>
            <Label class="label">Fotocopia del carnet de afiliacion a EPS o documento Fosyga</Label>
            <input class="archivo" type="file" name="fotocopiaEPS" onchange="return validarExt_fotocopiaEPS()" id="fotocopiaEPS" required><br>
            <Label class="label">Fotocopia de la cedula 150%</Label>
            <input class="archivo" type="file" name="FotocopiaCC" onchange="return validarExt_FotocopiaCC()" id="FotocopiaCC" required>
            `
            break;
        case "5": // Pasantia : Monitoria
            cargaDocu.innerHTML = `
            <Label class="label">Formato GFPI-F-023</Label>
            <input class="archivo" type="file" name="GFPI" onchange="return validarExt_GFPI()" id="GFPI" required><br>
            <Label class="label">Carta de solicitud</Label>
            <input class="archivo" type="file" name="CartaSolicitud" onchange="return validarExt_CartaSolicitud()" id="CartaSolicitud" required><br>
            <Label class="label">Constacia de la empresa</Label>
            <input class="archivo" type="file" name="Cartaempresa" onchange="return validarExt_Cartaempresa()" id="Cartaempresa" required><br>
            <Label class="label">Fotocopia del carnet de afiliacion a EPS o documento Fosyga</Label>
            <input class="archivo" type="file" name="fotocopiaEPS" onchange="return validarExt_fotocopiaEPS()" id="fotocopiaEPS" required><br>
            <Label class="label">Fotocopia de la cedula 150%</Label>
            <input class="archivo" type="file" name="FotocopiaCC" onchange="return validarExt_FotocopiaCC()" id="FotocopiaCC" required>
            `
            break;
        case "6":  // Servicio Militar (social)
            cargaDocu.innerHTML = `
            <Label class="label">Formato GFPI-F-023</Label>
            <input class="archivo" type="file" name="GFPI" onchange="return validarExt_GFPI()" id="GFPI" required><br>
            <Label class="label">Carta de solicitud</Label>
            <input class="archivo" type="file" name="CartaSolicitud" onchange="return validarExt_CartaSolicitud()" id="CartaSolicitud" required><br>
            <Label class="label">Constacia de la empresa</Label>
            <input class="archivo" type="file" name="Cartaempresa" onchange="return validarExt_Cartaempresa()" id="Cartaempresa" required>
            `
            break;
        case "7": // Proyecto productivo
            cargaDocu.innerHTML = `
            <Label class="label">Formato GFPI-F-023</Label>
            <input class="archivo" type="file" name="GFPI" onchange="return validarExt_GFPI()" id="GFPI" required><br>
            <Label class="label">Carta de solicitud</Label>
            <input class="archivo" type="file" name="CartaSolicitud" onchange="return validarExt_CartaSolicitud()" id="CartaSolicitud" required><br>
            <Label class="label">Fotocopia del carnet de afiliacion a EPS o documento Fosyga</Label>
            <input class="archivo" type="file" name="fotocopiaEPS" onchange="return validarExt_fotocopiaEPS()" id="fotocopiaEPS" required><br>
            <Label class="label">Fotocopia de la cedula 150%</Label>
            <input class="archivo" type="file" name="FotocopiaCC" onchange="return validarExt_FotocopiaCC()" id="FotocopiaCC" required>
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
    hidden.innerHTML =  ` <input type="hidden" name="docuEstuPDF" value="${datoEstu}">`
}

function buscador(e) {
    e.preventDefault();
    const buscaCer = document.getElementById("buscadorCer")
    buscaCer.style.display = "block"
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
cerrarEmpresad.addEventListener("click", ocultarEmpresad)
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
            if (bd == "2") {
                alert("alumno ya esta en inicio de certificacion")
                setTimeout(() => {
                    resetformuceti.reset();
                    formularioCerti.style.display="none"
                }, 2000);
            }else if (bd == "3"){
                alert("El aprendiz ya esta certificado")
                resetformuceti.reset();
            }else if(bd == "4") {
                alert("ingrese documento del aprendiz")
                resetformuceti.reset();
                    formularioCerti.style.display="none"
            }else {
                alert("el aprendiz no esta legalizado")
            }
        })
        .catch(error => console.log(error))
}

// ********************  MOSTRAR DOCUMENTO PDF *******************************
const formuPDF = document.getElementById("formuPDF")
const botonPDFR = document.getElementById("DocuPDF")
const hidden = document.getElementById("hidden")
const btncerrarPDF = document.getElementById("cerrarPDF")
const contePDF = document.getElementById("contePDF")


botonPDFR.addEventListener("click", mostrarPDF)

function mostrarPDF() {
    const docuBPDF = documento.value 
    const readPDF = document.getElementById("readPDF")
    if (docuBPDF == "" || docuBPDF == null) {
        alert("ingreso aprendiz")
    } else {
        const file = new FormData(formuPDF)
        
        fetch("../php/pdf.php", {
            method: "POST",
            body: file
        }).then(res => res.text()).then(valor => {
            if(valor == "no"){
                alert("aprendiz no esta legalizado")
            }else{
                contePDF.style.display = "block"
                readPDF.innerHTML = `${valor}`
            }
            
        })
    }
}

btncerrarPDF.addEventListener("click", (e) => {
    e.preventDefault();
    contePDF.style.display = "none"
})

// *********************************** BOTON DE CERRAR FORMULARIO DE FICHA DE FORMACION *****************

const btnFicha = document.getElementById("btnficha")
const formFicha = document.getElementById("fichaOcul")
const cerrarFicha = document.getElementById("cerrarF")

btnFicha.addEventListener("click", () => formFicha.style.display = "block")
cerrarFicha.addEventListener("click", (e) => {
    e.preventDefault();
    formFicha.style.display = "none"
})


/************************************************validar extencion de los archivos **********************/

function validarExt_GFPI()
{
    var archivoInput = document.getElementById('GFPI');
    var archivoRuta = archivoInput.value;
    var extPermitidas = /(.pdf)$/i;
    if(!extPermitidas.exec(archivoRuta)){
        alert('Asegurese de haber seleccionado un PDF');
        archivoInput.value = '';
        return false;
    }
    else
    {
       
    }
}
function validarExt_ContratoAprendizaje()
{
    var archivoInput = document.getElementById('ContratoAprendizaje');
    var archivoRuta = archivoInput.value;
    var extPermitidas = /(.pdf)$/i;
    if(!extPermitidas.exec(archivoRuta)){
        alert('Asegurese de haber seleccionado un PDF');
        archivoInput.value = '';
        return false;
    }
    else
    {
       
    }
}
function validarExt_CartaSolicitud()
{
    var archivoInput = document.getElementById('CartaSolicitud');
    var archivoRuta = archivoInput.value;
    var extPermitidas = /(.pdf)$/i;
    if(!extPermitidas.exec(archivoRuta)){
        alert('Asegurese de haber seleccionado un PDF');
        archivoInput.value = '';
        return false;
    }
    else
    {
       
    }
}
function validarExt_Cartaempresa()
{
    var archivoInput = document.getElementById('Cartaempresa');
    var archivoRuta = archivoInput.value;
    var extPermitidas = /(.pdf)$/i;
    if(!extPermitidas.exec(archivoRuta)){
        alert('Asegurese de haber seleccionado un PDF');
        archivoInput.value = '';
        return false;
    }
    else
    {
       
    }
}
function validarExt_fotocopiaEPS()
{
    var archivoInput = document.getElementById('fotocopiaEPS');
    var archivoRuta = archivoInput.value;
    var extPermitidas = /(.pdf)$/i;
    if(!extPermitidas.exec(archivoRuta)){
        alert('Asegurese de haber seleccionado un PDF');
        archivoInput.value = '';
        return false;
    }
    else
    {
       
    }
}
function validarExt_FotocopiaCC()
{
    var archivoInput = document.getElementById('FotocopiaCC');
    var archivoRuta = archivoInput.value;
    var extPermitidas = /(.pdf)$/i;
    if(!extPermitidas.exec(archivoRuta)){
        alert('Asegurese de haber seleccionado un PDF');
        archivoInput.value = '';
        return false;
    }
    else
    {
       
    }
}
// ******************************** CERTIFICACION CONSULTAS Y VALIDACION ***********************

const formularioBuscaCer = document.getElementById("forBus")
const btnmostrar = document.getElementById("btnMostrar")
const cerrarBusCert = document.getElementById("cerrarBusCert")
const inputdocu = document.getElementById("docuvalicer")
btnmostrar.disabled = true
formularioBuscaCer.addEventListener("submit", (e) => {
    e.preventDefault()
    let datos = new FormData(formularioBuscaCer)
    fetch("../php/buscadorCer.php", {
        method:"POST",
        body: datos
    }).then(dato => dato.text()).then(res => {

        
        if (res == 1) {
            alert("El aprendiz no esta legalizado ")
            formularioBuscaCer.reset()
        }else if (res == 2) {
            alert("El aprendiz ya esta certificado")
            formularioBuscaCer.reset()
        } else if(res == 3) {
            const docubase = inputdocu.value
            datoAprendiz.innerHTML = ` <input type="hidden" name="docuAprendiz" value="${docubase}">`
            console.log(res)
            btnmostrar.disabled=false
        }else {
            alert(res)
            formularioBuscaCer.reset()
        }
    })
})

cerrarBusCert.addEventListener("click", (e) =>{
    e.preventDefault()
    const buscaCer = document.getElementById("buscadorCer")
    buscaCer.style.display="none";
    btnmostrar.disabled = true
    formularioBuscaCer.reset()
})

btnmostrar.addEventListener("click", (e) => {
    e.preventDefault()
    formularioCerti.style.display = "block"
    const buscaCer = document.getElementById("buscadorCer")
    buscaCer.style.display="none";
    formularioBuscaCer.reset()
    btnmostrar.disabled = true
} )

// ****** FORMULARIO DE REGISTRO DE APRENDIZ *******************  /////

// const form = document.getElementById("frmajax")
const btnenviarapren = document.getElementById("btnguardar")

btnenviarapren.addEventListener("click", (e) => {
    e.preventDefault()
    console.log("entre nontlf")
    const formA = document.getElementById("frmajax")
    const dataP = new FormData(formA)

    fetch("../php/crear.php", {
        method:"POST",
        body: dataP
    }).then(res => res.text()).then(apren => {
        console.log(apren)
        if (apren == 1) {
            alert('Se agrego correctamente');
            setTimeout(() => {
                document.querySelector("#frmajax").reset()
                // window.location = "segui.php"

            }, 2000);

        } else if (apren == "existe") {
            alert('Aprendiz ya existe');
        } else if (apren == 3 ) {
            alert('llena los campos correctamente' )
        } else {
            alert("llena todos campos correctamente")
        }
    })
})