//Botones
const btn_administrador = document.getElementById("btn_administrador");
const btn_seguimiento = document.getElementById("btn_seguimiento");
const btn_instructor = document.getElementById("btn_instructor");
const btn_agenciaPublica = document.getElementById("btn_agenciaPublica");
const btn_bienestar = document.getElementById("btn_bienestar");
const btn_coordinador = document.getElementById("btn_coordinador");
const btn_biblioteca = document.getElementById("btn_biblioteca");
const btn_subdirector = document.getElementById("btn_subdirector");

//Imagen de la mascota 
const Img_macota = document.getElementById('imagenMascota');

//Formularios

const login_box1 = document.getElementById("login-box1");
const login_box2 = document.getElementById("login-box2");
const login_box3 = document.getElementById("login-box3");
const login_box4 = document.getElementById("login-box4");
const login_box5 = document.getElementById("login-box5");
const login_box6 = document.getElementById("login-box6");
const login_box7 = document.getElementById("login-box7");
const login_box8 = document.getElementById("login-box8");

btn_administrador.addEventListener('click',(e)=>{
    e.preventDefault();
    login_box1.style.display = "block";
    login_box2.style.display = "none";
    login_box3.style.display = "none";
    login_box4.style.display = "none";
    login_box5.style.display = "none";
    login_box6.style.display = "none";
    login_box7.style.display = "none";
    login_box8.style.display = "none";
    Img_macota.style.display = "none";
    
})

btn_seguimiento.addEventListener('click',(e)=>{
    e.preventDefault();
    login_box1.style.display = "none";
    login_box2.style.display = "block";
    login_box3.style.display = "none";
    login_box4.style.display = "none";
    login_box5.style.display = "none";
    login_box6.style.display = "none";
    login_box7.style.display = "none";
    login_box8.style.display = "none";
    Img_macota.style.display = "none";
})

btn_instructor.addEventListener('click',(e)=>{
    e.preventDefault();
    login_box1.style.display = "none";
    login_box2.style.display = "none";
    login_box3.style.display = "block";
    login_box4.style.display = "none";
    login_box5.style.display = "none";
    login_box6.style.display = "none";
    login_box7.style.display = "none";
    login_box8.style.display = "none";
    Img_macota.style.display = "none";
})

btn_agenciaPublica.addEventListener('click',(e)=>{
    e.preventDefault();
    login_box1.style.display = "none";
    login_box2.style.display = "none";
    login_box3.style.display = "none";
    login_box4.style.display = "block";
    login_box5.style.display = "none";
    login_box6.style.display = "none";
    login_box7.style.display = "none";
    login_box8.style.display = "none";
     Img_macota.style.display = "none";
})

btn_bienestar.addEventListener('click',(e)=>{
    e.preventDefault();
    login_box1.style.display = "none";
    login_box2.style.display = "none";
    login_box3.style.display = "none";
    login_box4.style.display = "none";
    login_box5.style.display = "block";
    login_box6.style.display = "none";
    login_box7.style.display = "none";
    login_box8.style.display = "none";
    Img_macota.style.display = "none";
   
})

btn_coordinador.addEventListener('click',(e)=>{
    e.preventDefault();
    login_box1.style.display = "none";
    login_box2.style.display = "none";
    login_box3.style.display = "none";
    login_box4.style.display = "none";
    login_box5.style.display = "none";
    login_box6.style.display = "block";
    login_box7.style.display = "none";
    login_box8.style.display = "none";
    Img_macota.style.display = "none";
   
})

btn_biblioteca.addEventListener('click',(e)=>{
    e.preventDefault();
    login_box1.style.display = "none";
    login_box2.style.display = "none";
    login_box3.style.display = "none";
    login_box4.style.display = "none";
    login_box5.style.display = "none";
    login_box6.style.display = "none";
    login_box7.style.display = "block";
    login_box8.style.display = "none";
    Img_macota.style.display = "none";
   
})

btn_subdirector.addEventListener('click',(e)=>{
    e.preventDefault();
    login_box1.style.display = "none";
    login_box2.style.display = "none";
    login_box3.style.display = "none";
    login_box4.style.display = "none";
    login_box5.style.display = "none";
    login_box6.style.display = "none";
    login_box7.style.display = "none";
    login_box8.style.display = "block";
    Img_macota.style.display = "none";
   
})
