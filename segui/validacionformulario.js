const formulario = document.getElementById('registroEmpre');
const inputs = document.querySelectorAll('#registroEmpre');

const expresiones = {
	razon_social: /^[a-zA-ZÀ-ÿ\s]{5,30}$/, // Letras y espacios, pueden llevar acentos maximo 30 caracteres.
    nit:  /^\d{5,20}$/, //numeros de 1 al 20
    nombre_empresa: /^[a-zA-ZÀ-ÿ\s]{3,25}$/, // Letras y espacios, pueden llevar acentos maximo 30 caracteres.
    direccion:  /^[a-zA-Z0-9_.+-]{4,15}$/, // todos los digitos 
    telefono: /^\d{10}$/, // 9 a 11 numeros.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/
}
const campos ={
    razon_social:false,
    nit:false,
    nomEmpre:false,
    direccion:false, 
    telefono:false,
    email:false
    
} 
const validarformulario = (e) =>{
    switch (e.target.name){
        case "socialEm":
            if(expresiones.razon_social.test(e.target.value)){
                 
                document.getElementById('socialEm').classList.remove('inputR-incorrecto');
                document.getElementById('inputR_p').classList.remove('inputR_p-incorrecto');
                campos.razon_social =true;

            } else {
                document.getElementById('socialEm').classList.add('inputR-incorrecto');
                document.getElementById('inputR_p').classList.add('inputR_p-incorrecto');
                campos.razon_social= false;
            }
        break
        case "nit":
            if(expresiones.nit.test(e.target.value)){
                 
                document.getElementById('nit').classList.remove('inputR-incorrecto');
                document.getElementById('inputR_p-n').classList.remove('inputR_p-nit-incorrecto');
                campos.nit =true;

            } else {
                document.getElementById('nit').classList.add('inputR-incorrecto');
                document.getElementById('inputR_p-n').classList.add('inputR_p-nit-incorrecto');
                campos.nit =false;
            }
            
        break
        case "nomEmpre":
                if(expresiones.razon_social.test(e.target.value)){
                 
                    document.getElementById('nomEmpre').classList.remove('inputR-incorrecto');
                    document.getElementById('inputR_p-nom').classList.remove('inputR_p-nom-incorrecto');
                    campos.nomEmpre =true;
    
                } else {
                    document.getElementById('nomEmpre').classList.add('inputR-incorrecto');
                    document.getElementById('inputR_p-nom').classList.add('inputR_p-nom-incorrecto');
                    campos.nomEmpre = false;
                }
            
        break
        case "direccion":
            if(expresiones.direccion.test(e.target.value)){
                 
                document.getElementById('direccion').classList.remove('inputR-incorrecto');
                document.getElementById('inputR_p-d').classList.remove('inputR_p-d-incorrecto');
                campos.direccion = true;

            } else {
                document.getElementById('direccion').classList.add('inputR-incorrecto');
                document.getElementById('inputR_p-d').classList.add('inputR_p-d-incorrecto');
                campos.direccion = false;
            }
            
        break
        case "telefono":
            if(expresiones.telefono.test(e.target.value)){
                 
                document.getElementById('telefono').classList.remove('inputR-incorrecto');
                document.getElementById('inputR_p_t').classList.remove('inputR_t-incorrecto');
                campos.telefono = true;

            } else {
                document.getElementById('telefono').classList.add('inputR-incorrecto');
                document.getElementById('inputR_p_t').classList.add('inputR_t-incorrecto');
                campos.telefono = false;
            }
            
        break
        case "email":
            if(expresiones.correo.test(e.target.value)){
                 
                document.getElementById('email').classList.remove('inputR-incorrecto');
                document.getElementById('inputR_p-c').classList.remove('inputR_p-c-incorrecto');
                campos.email = true;

            } else {
                document.getElementById('email').classList.add('inputR-incorrecto');
                document.getElementById('inputR_p-c').classList.add('inputR_p-c-incorrecto');
                campos.email = false;
            }
            
        break
    }
}
const bloqueo = (e) =>{

    if (campos.razon_social==true && campos.nit==true && campos.nomEmpre && campos.direccion && campos.telefono && campos.email) {

        document.getElementById('bloque').classList.add('bloque-correcto');
    
    }else{
        
        document.getElementById('bloque').classList.remove('bloque-correcto');
    }
} 

inputs.forEach((input)=>{
    input.addEventListener('keyup', validarformulario);
    input.addEventListener('focusout', validarformulario);
    input.addEventListener('keyup', bloqueo);
 
});

/**-----------------------------formulario de aprendices ---------------------------------------*/

const formulario2 = document.getElementById('frmajax');
const inputs2 = document.querySelectorAll('#frmajax');



    
