const btn_ape = document.getElementById("Agenciapublicadeempleo");
const btn_biblioteca = document.getElementById("Biblioteca");
const btn_coordinador = document.getElementById("CoordinadorAcademico");
const btn_bienestar = document.getElementById("Bienestar");
const btn_imprimir = document.getElementById("btn_imprimir");

btn_imprimir.addEventListener("click", (e) => {
    e.preventDefault();
    print();
})
    
    switch(id_tip_usu) {
        case "4":
            btn_ape.classList.add("btn_firma1_activado");
            break;
        case "5":
            btn_bienestar.classList.add("btn_firma1_activado");
            break;
        case "6": 
            btn_coordinador.classList.add("btn_firma1_activado");
            break;
        case "7":
            btn_biblioteca.classList.add("btn_firma1_activado");
            break;
    }