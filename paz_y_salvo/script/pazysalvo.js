const btn_ape = document.getElementById("Agenciapublicadeempleo");
const btn_biblioteca = document.getElementById("Biblioteca");
const btn_coordinador = document.getElementById("CoordinadorAcademico");
const btn_bienestar = document.getElementById("Bienestar");
const btn_imprimir = document.getElementById("btn_imprimir");
const acciones = document.getElementsByClassName("desaparecer");

btn_imprimir.addEventListener("click", (e) => {
    e.preventDefault();
    print();
})
    
    switch(id_tip_usu) {
        case "4": 
            btn_biblioteca.style.visibility = "hidden";
            btn_coordinador.style.visibility = "hidden";
            btn_bienestar.style.visibility = "hidden";
            btn_ape.style.visibility = "visible";
            break;
        case "5": 
            btn_biblioteca.style.visibility = "hidden";
            btn_coordinador.style.visibility = "hidden";
            btn_ape.style.visibility = "hidden";
            btn_bienestar.style.visibility = "visible";
            break;
        case "6": 
            btn_biblioteca.style.visibility = "hidden";
            btn_ape.style.visibility = "hidden";
            btn_bienestar.style.visibility = "hidden";
            btn_coordinador.style.visibility = "visible";
            break;
        case "7": 
            btn_ape.style.visibility = "hidden";
            btn_coordinador.style.visibility = "hidden";
            btn_bienestar.style.visibility = "hidden";
            btn_biblioteca.style.visibility = "visible";
            break;
    }