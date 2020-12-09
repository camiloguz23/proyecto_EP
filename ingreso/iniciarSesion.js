//Botones
const btn_bienestar = document.getElementById("btn_bienestar");
const btn_coordinador = document.getElementById("btn_coordinador");
const btn_biblioteca = document.getElementById("btn_biblioteca");
const btn_subdirector = document.getElementById("btn_subdirector");

//Formularios
const login_box = document.getElementById("login_box");

const login_box_bienestar = document.getElementById("login_box-bienestar");
const login_box_coordinador = document.getElementById("login_box-coordinador");
const login_box_biblioteca = document.getElementById("login_box-biblioteca");
const login_box_subdirector = document.getElementById("login_box-subdirector");

//Desapareciendo formularios
login_box.style.visibility = "hidden";

login_box_bienestar.style.display = "none";
login_box_coordinador.style.display = "none";
login_box_biblioteca.style.display = "none";
login_box_subdirector.style.display = "none";

//Eventos

btn_bienestar.addEventListener("click", function(e) {
    e.preventDefault();
    login_box.style.visibility = "visible";

    login_box_bienestar.style.display = "block";
    login_box_coordinador.style.display = "none";
    login_box_biblioteca.style.display = "none";
    login_box_subdirector.style.display = "none";
});

btn_coordinador.addEventListener("click", function(e) {
    e.preventDefault();
    login_box.style.visibility = "visible";
    
    login_box_bienestar.style.display = "none";
    login_box_coordinador.style.display = "block";
    login_box_biblioteca.style.display = "none";
    login_box_subdirector.style.display = "none";
});

btn_biblioteca.addEventListener("click", function(e) {
    e.preventDefault();
    login_box.style.visibility = "visible";
    
    login_box_bienestar.style.display = "none";
    login_box_coordinador.style.display = "none";
    login_box_biblioteca.style.display = "block";
    login_box_subdirector.style.display = "none";
});

btn_subdirector.addEventListener("click", function(e) {
    e.preventDefault();
    login_box.style.visibility = "visible";
    
    login_box_bienestar.style.display = "none";
    login_box_coordinador.style.display = "none";
    login_box_biblioteca.style.display = "none";
    login_box_subdirector.style.display = "block";
});