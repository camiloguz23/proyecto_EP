const boo = document.getElementById("btn_pazysalvo");
const cuadrpa = document.getElementById("cuadro");
const sald = document.getElementById("salir");

boo.addEventListener('click', (e)=>{
    e.preventDefault();
    cuadrpa.style.display= "block";
    boo.style.background ="#238276";
    boo.style.color = "#ffffff";
    boo.style.width ="214px";
});

sald.addEventListener('click', (e)=>{
    e.preventDefault();
    cuadrpa.style.display= "none";
    boo.style.background ="#ffffff";
    boo.style.color ="black";

});
