const formulario_legalizacion = document.getElementById('legalForm');
const inputs_formulario_legalizacion = document.querySelectorAll('#legalForm');
const select_formulario_legalizar_alternativa = document.getElementById('tipoAlte');
const select_formulario_legalizar_empresa = document.getElementById('selec_empresa');

const expresiones_legalizacion = {
	solo_letras: /^[a-zA-ZÀ-ÿ\s]{5,30}$/, // Letras y espacios, pueden llevar acentos maximo 30 caracteres.
}

const campos_Legalizacion ={
    nombre_jefe:false,
    cargoJefe:false
}


const validarformulario_L = (e) =>{
    switch (e.target.name){
        case "jefe":
            if(expresiones_legalizacion.solo_letras.test(e.target.value)){
                 
                document.getElementById('nombre_jefe').classList.remove('seleccionTipo_n-incorrecto');
                document.getElementById('p-nombre-jefe').classList.remove('p-cargo-jefe-incorrecto');
                campos_Legalizacion.nombre_jefe =true;

            } else {
                document.getElementById('nombre_jefe').classList.add('seleccionTipo_n-incorrecto');
                document.getElementById('p-nombre-jefe').classList.add('p-cargo-jefe-incorrecto');
                campos_Legalizacion.nombre_jefe =false;
            }
        break
        case "cargoJefe":
            if(expresiones_legalizacion.solo_letras.test(e.target.value)){
                 
                document.getElementById('cargoJefe').classList.remove('seleccionTipo_n-incorrecto');
                document.getElementById('p-cargo-jefe').classList.remove('p-nombre-jefe-incorrecto');
                campos_Legalizacion.cargoJefe =true;

            } else {
                document.getElementById('cargoJefe').classList.add('seleccionTipo_n-incorrecto');
                document.getElementById('p-cargo-jefe').classList.add('p-nombre-jefe-incorrecto');
                campos_Legalizacion.cargoJefe =false;
            }
            
        break
    }
}

const bloqueo_L = (e) =>{

    if (campos_Legalizacion.nombre_jefe==true && campos_Legalizacion.cargoJefe==true) {

        document.getElementById('boton523').style.display = "block"
        
    }else{
        
        document.getElementById('boton523').style.display = "none"
    
    }
} 


inputs_formulario_legalizacion.forEach((input)=>{
    input.addEventListener('keyup', validarformulario_L);
    input.addEventListener('focusout', validarformulario_L);
    input.addEventListener('keyup', bloqueo_L);
 
});