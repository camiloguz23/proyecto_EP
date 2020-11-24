const legalFormdo = document.getElementById('legalFormdo');
const input_legal = document.querySelectorAll('#legalFormdo');


const expresiones = {
	nombre: /^[a-zA-ZÀ-ÿ\s]{5,30}$/, // Letras y espacios, pueden llevar acentos maximo 30 caracteres.
}
const campos ={
    nombre_jefe:false,
    cargoJefe:false
}

const validarformulario_L = (e) =>{
    switch (e.target.name){
        case "nombre_jefe":
            if(expresiones.nombre.test(e.target.value)){
                 
                document.getElementById('nombre_jefe').classList.remove('seleccionTipo_n-incorrecto');
                document.getElementById('p-nombre-jefe').classList.remove('p-cargo-jefe-incorrecto');
                campos.jefe =true;

            } else {
                document.getElementById('nombre_jefe').classList.add('seleccionTipo_n-incorrecto');
                document.getElementById('p-nombre-jefe').classList.add('p-cargo-jefe-incorrecto');
                campos.jefe= false;
            }
        break
        case "cargoJefe":
            if(expresiones.nombre.test(e.target.value)){
                 
                document.getElementById('cargoJefe').classList.remove('seleccionTipo_n-incorrecto');
                document.getElementById('p-cargo-jefe').classList.remove('p-nombre-jefe-incorrecto');
                campos.cargoJefe =true;

            } else {
                document.getElementById('cargoJefe').classList.add('seleccionTipo_n-incorrecto');
                document.getElementById('p-cargo-jefe').classList.add('p-nombre-jefe-incorrecto');
                campos.ncargoJefe =false;
            }
            
      
    }
}

const bloqueo_L= (e) =>{

    if (campos.nombre_jefe==true && campos.cargoJefe==true) {
        
        document.getElementById('botonEM').style.display = "block"
    
    }else{
        
        document.getElementById('botonEM').style.display = "none"
        
    }
} 



pancracia.forEach((input)=>{
    input.addEventListener('keyup', validarformulario_L);
    input.addEventListener('focusout', validarformulario_L);
    input.addEventListener('keyup', bloqueo_L);
 
});

