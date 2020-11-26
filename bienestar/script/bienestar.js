const boto = document.getElementById("btn_pazysalvo");
const cuadropa = document.getElementById("cuadro");
const salid = document.getElementById("salir");

boto.addEventListener('click', (e)=>{
    e.preventDefault();
    cuadropa.style.display= "block";
    boto.style.background ="#fc7323";
    boto.style.color = "#ffffff";
    boto.style.width ="214px";
});

salid.addEventListener('click', (e)=>{
    e.preventDefault();
    cuadropa.style.display= "none";
    boto.style.background ="#ffffff";
    boto.style.color ="black";

});
