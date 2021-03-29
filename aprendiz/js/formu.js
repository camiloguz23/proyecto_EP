// boton legal
const alternativa = document.getElementById("tipoAl")
const cargaDocu = document.getElementById("cargaDocu")
const informacionnnn = document.getElementById("documentos2");//
const fondd = document.getElementById("fondo")
const mostrardocc = document.getElementById("datos2");
// Variables para el formulario de legalización
const registroLegal = document.getElementById("registroLegal")
const btn_cerrarForm = document.getElementById("btn_cerrarLegal")

// FUNCIONES 
/* ---------------------------hola------------------------------- */
btn_cerrarForm.addEventListener("click", (e) => {
    e.preventDefault()
    registroLegal.style.display = "none"
    informacionnnn.style.opacity="0";
    informacionnnn.style.visibility="hidden";
    fondd.style.opacity="1";
    mostrardocc.style.background="#fff";
    legalForm.reset();
})



alternativa.addEventListener("blur", (e)=> {
    const datoalter = alternativa.value

    switch (datoalter) {
        case "1":
            cargaDocu.innerHTML = `
            <Label class="form">Formato GFPI-F-023</Label>
            <input class="archivo" type="file" name="GFPI" onchange="return validarExt_GFPI()" id="GFPI" required><br>
            <Label class="form">Contrato de aprendizaje</Label>
            <input class="archivo" type="file" name="ContratoAprendizaje" onchange="return validarExt_ContratoAprendizaje()" id="ContratoAprendizaje" required>
            `
            break;
        case "2":
            cargaDocu.innerHTML = `
            <Label class="form">Formato GFPI-F-023</Label>
            <input class="archivo" type="file" name="GFPI" onchange="return validarExt_GFPI()" id="GFPI" required><br>
            <Label class="form">Carta de solicitud</Label>
            <input class="archivo" type="file" name="CartaSolicitud" onchange="return validarExt_CartaSolicitud()" id="CartaSolicitud" required><br>
            <Label class="form">Constacia de la empresa</Label>
            <input class="archivo" type="file" name="Cartaempresa" onchange="return validarExt_Cartaempresa()" id="Cartaempresa" required>
            `
            break;
        case "3":  // "Pasantía: Apoyo unidad productiva familiar"
            cargaDocu.innerHTML = `
            <Label class="form">Formato GFPI-F-023</Label>
            <input class="archivo" type="file" name="GFPI" onchange="return validarExt_GFPI()" id="GFPI" required><br>
            <Label class="form">Carta de solicitud</Label>
            <input class="archivo" type="file" name="CartaSolicitud" onchange="return validarExt_CartaSolicitud()" id="CartaSolicitud" required><br>
            <Label class="form">Constacia de la empresa</Label>
            <input class="archivo" type="file" name="Cartaempresa" onchange="return validarExt_Cartaempresa()" id="Cartaempresa" required><br>
            <Label class="form">Fotocopia del carnet de afiliacion a EPS o documento Fosyga</Label>
            <input class="archivo" type="file" name="fotocopiaEPS" onchange="return validarExt_fotocopiaEPS()" id="fotocopiaEPS" required><br>
            <Label class="form">Fotocopia de la cedula 150%</Label>
            <input class="archivo" type="file" name="FotocopiaCC" onchange="return validarExt_FotocopiaCC()" id="FotocopiaCC" required>
            `
            break;
        case "4":  // "Pasantia:Apoyo entidad estatal, municipal, verdal u OMG"
            cargaDocu.innerHTML = `
            <Label class="form">Formato GFPI-F-023</Label>
            <input class="archivo" type="file" name="GFPI" onchange="return validarExt_GFPI()" id="GFPI" required><br>
            <Label class="form">Carta de solicitud</Label>
            <input class="archivo" type="file" name="CartaSolicitud" onchange="return validarExt_CartaSolicitud()" id="CartaSolicitud" required><br>
            <Label class="form">Constacia de la empresa</Label>
            <input class="archivo" type="file" name="Cartaempresa" onchange="return validarExt_Cartaempresa()" id="Cartaempresa" required><br>
            <Label class="form">Fotocopia del carnet de afiliacion a EPS o documento Fosyga</Label>
            <input class="archivo" type="file" name="fotocopiaEPS" onchange="return validarExt_fotocopiaEPS()" id="fotocopiaEPS" required><br>
            <Label class="form">Fotocopia de la cedula 150%</Label>
            <input class="archivo" type="file" name="FotocopiaCC" onchange="return validarExt_FotocopiaCC()" id="FotocopiaCC" required>
            `
            break;
        case "5": // Pasantia : Monitoria
            cargaDocu.innerHTML = `
            <Label class="form">Formato GFPI-F-023</Label>
            <input class="archivo" type="file" name="GFPI" onchange="return validarExt_GFPI()" id="GFPI" required><br>
            <Label class="form">Carta de solicitud</Label>
            <input class="archivo" type="file" name="CartaSolicitud" onchange="return validarExt_CartaSolicitud()" id="CartaSolicitud" required><br>
            <Label class="form">Constacia de la empresa</Label>
            <input class="archivo" type="file" name="Cartaempresa" onchange="return validarExt_Cartaempresa()" id="Cartaempresa" required><br>
            <Label class="form">Fotocopia del carnet de afiliacion a EPS o documento Fosyga</Label>
            <input class="archivo" type="file" name="fotocopiaEPS" onchange="return validarExt_fotocopiaEPS()" id="fotocopiaEPS" required><br>
            <Label class="form">Fotocopia de la cedula 150%</Label>
            <input class="archivo" type="file" name="FotocopiaCC" onchange="return validarExt_FotocopiaCC()" id="FotocopiaCC" required>
            `
            break;
        case "6":  // Servicio Militar (social)
            cargaDocu.innerHTML = `
            <Label class="form">Formato GFPI-F-023</Label>
            <input class="archivo" type="file" name="GFPI" onchange="return validarExt_GFPI()" id="GFPI" required><br>
            <Label class="form">Carta de solicitud</Label>
            <input class="archivo" type="file" name="CartaSolicitud" onchange="return validarExt_CartaSolicitud()" id="CartaSolicitud" required><br>
            <Label class="form">Constacia de la empresa</Label>
            <input class="archivo" type="file" name="Cartaempresa" onchange="return validarExt_Cartaempresa()" id="Cartaempresa" required>
            `
            break;
        case "7": // Proyecto productivo
            cargaDocu.innerHTML = `
            <Label class="form">Formato GFPI-F-023</Label>
            <input class="archivo" type="file" name="GFPI" onchange="return validarExt_GFPI()" id="GFPI" required><br>
            <Label class="form">Carta de solicitud</Label>
            <input class="archivo" type="file" name="CartaSolicitud" onchange="return validarExt_CartaSolicitud()" id="CartaSolicitud" required><br>
            <Label class="form">Fotocopia del carnet de afiliacion a EPS o documento Fosyga</Label>
            <input class="archivo" type="file" name="fotocopiaEPS" onchange="return validarExt_fotocopiaEPS()" id="fotocopiaEPS" required><br>
            <Label class="form">Fotocopia de la cedula 150%</Label>
            <input class="archivo" type="file" name="FotocopiaCC" onchange="return validarExt_FotocopiaCC()" id="FotocopiaCC" required>
            `
        	break;
        default:
            cargaDocu.innerHTML =`<input type="hidden" name="">`
            break;
    }
})

// EVENTOS 

alternativa.addEventListener("blur", funAlte)

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
