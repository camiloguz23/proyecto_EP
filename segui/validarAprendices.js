//validar formulario
const formularioAprendices = document.getElementById("frmajax")
const inputFormAprendices = document.querySelectorAll("#frmajax input")
const btn_aprendices = document.getElementById("btnguardar")


const expresionesAprendices = {
    documento: /^\d{7,13}$/, // 9 a 13 numeros.
    nombre: /^[a-zA-ZÀ-ÿ\s]{2,40}$/, // Letras y espacios, pueden llevar acentos.
    apellido: /^[a-zA-ZÀ-ÿ\s]{2,40}$/, // Letras y espacios, pueden llevar acentos.
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    direccion: /^[a-zA-Z0-9_.+-\s]{2,40}$/, // Letras y espacios, pueden llevar acentos.
    telefono: /^\d{7,14}$/ // 7 a 14 numeros.
}

const camposAprendices = {
    docu: false,
    nom: false,
    ape: false,
    email: false,
    tel: false,
    celular: false,
    direccion: false
}

const validarFormulario = (e) => {
    switch(e.target.name) {
        case "docu":
            if(expresionesAprendices.documento.test(e.target.value)){
                document.getElementById("docu").classList.remove("grupo__aprendiz-incorrecto")
                document.getElementById("parrafoAprendiz_1").classList.remove("parrafoAprendiz-activado")
                camposAprendices["docu"] = true
            } else {
                document.getElementById("docu").classList.add("grupo__aprendiz-incorrecto")
                document.getElementById("parrafoAprendiz_1").classList.add("parrafoAprendiz-activado")
                camposAprendices["docu"] = false
            }
            break;
        case "nom":
            if(expresionesAprendices.nombre.test(e.target.value)){
                document.getElementById("nom").classList.remove("grupo__aprendiz-incorrecto")
                document.getElementById("parrafoAprendiz_2").classList.remove("parrafoAprendiz-activado")
                camposAprendices["nom"] = true
            } else {
                document.getElementById("nom").classList.add("grupo__aprendiz-incorrecto")
                document.getElementById("parrafoAprendiz_2").classList.add("parrafoAprendiz-activado")
                camposAprendices["nom"] = false
            }
            break;
        case "ape":
            if(expresionesAprendices.apellido.test(e.target.value)){
                document.getElementById("ape").classList.remove("grupo__aprendiz-incorrecto")
                document.getElementById("parrafoAprendiz_3").classList.remove("parrafoAprendiz-activado")
                camposAprendices["ape"] = true
            } else {
                document.getElementById("ape").classList.add("grupo__aprendiz-incorrecto")
                document.getElementById("parrafoAprendiz_3").classList.add("parrafoAprendiz-activado")
                camposAprendices["ape"] = false
            }
            break;
        case "email":
            if(expresionesAprendices.correo.test(e.target.value)){
                document.getElementById("email").classList.remove("grupo__aprendiz-incorrecto")
                document.getElementById("parrafoAprendiz_4").classList.remove("parrafoAprendiz-activado")
                camposAprendices["email"] = true
            } else {
                document.getElementById("email").classList.add("grupo__aprendiz-incorrecto")
                document.getElementById("parrafoAprendiz_4").classList.add("parrafoAprendiz-activado")
                camposAprendices["email"] = false
            }
            break;
        case "tel":
            if(expresionesAprendices.telefono.test(e.target.value)){
                document.getElementById("tel").classList.remove("grupo__aprendiz-incorrecto")
                document.getElementById("parrafoAprendiz_5").classList.remove("parrafoAprendiz-activado")
                camposAprendices["tel"] = true
            } else {
                document.getElementById("tel").classList.add("grupo__aprendiz-incorrecto")
                document.getElementById("parrafoAprendiz_5").classList.add("parrafoAprendiz-activado")
                camposAprendices["tel"] = false
            }
            break;
        case "celular":
            if(expresionesAprendices.telefono.test(e.target.value)){
                document.getElementById("celular").classList.remove("grupo__aprendiz-incorrecto")
                document.getElementById("parrafoAprendiz_6").classList.remove("parrafoAprendiz-activado")
                camposAprendices["celular"] = true
            } else {
                document.getElementById("celular").classList.add("grupo__aprendiz-incorrecto")
                document.getElementById("parrafoAprendiz_6").classList.add("parrafoAprendiz-activado")
                camposAprendices["celular"] = false
            }
            break;
        case "direccion":
            if(expresionesAprendices.direccion.test(e.target.value)){
                document.getElementById("direccion").classList.remove("grupo__aprendiz-incorrecto")
                document.getElementById("parrafoAprendiz_7").classList.remove("parrafoAprendiz-activado")
                camposAprendices["direccion"] = true
            } else {
                document.getElementById("direccion").classList.add("grupo__aprendiz-incorrecto")
                document.getElementById("parrafoAprendiz_7").classList.add("parrafoAprendiz-activado")
                camposAprendices["direccion"] = false
            }
            break;
    }
}


btn_aprendices.disabled = true;
const bloquearBoton = () => {
    if(camposAprendices.ape && camposAprendices.celular && camposAprendices.direccion && camposAprendices.docu && camposAprendices.email && camposAprendices.nom && camposAprendices.tel) {
        btn_aprendices.disabled = false;
    } else {
        btn_aprendices.disabled = true;
    }
} 

inputFormAprendices.forEach((input) => {
    input.addEventListener("keyup", validarFormulario)
    input.addEventListener("blur", validarFormulario)
    input.addEventListener("keyup", bloquearBoton)
})

/// cpdigo de lany

const NomJefe = document.getElementById('nomjefe');
const CargoJefe = document.getElementById('cargojefe');
const error = document.getElementById('error');
const boton523 = document.getElementById('boton523');
error.style.color = 'red';

NomJefe.addEventListener("blur", () => {
    if(NomJefe.value === null || NomJefe.value === ''){
        let mensaje = 'Por Favor Llenar Todos los Datos'
        error.innerHTML = `<h2>${mensaje}</h2>`
        boton523.style.display = "none";
    }
    else{

        error.innerHTML = ``
        boton523.style.display = "block";
    }
})
CargoJefe.addEventListener("blur", () => {
    if(CargoJefe.value === null || CargoJefe.value === ''){
        let mensaje = 'Por Favor Llenar Todos los Datos'
        error.innerHTML = `<h2>${mensaje}</h2>`
        boton523.style.display = "none";
    }
    else{
        error.innerHTML = ``
        boton523.style.display = "block";
    }
})