const trimestral = document.getElementById("bot2");
const quincenal = document.getElementById("bot1");
const mostrartd = document.getElementById("seguimi");
const informacion = document.getElementById("infor");
const eviquin = document.getElementById("evidencias");
const evitri = document.getElementById("evidenciastri2");
const salii = document.getElementById("salirr") 
const fond = document.getElementById("fondo")
const datosapre = document.getElementById("informa")
const cance = document.getElementById("cancelar");
const cance2 = document.getElementById("cancelarr");


cance2.addEventListener('click', (e)=>{
    e.preventDefault();
    evitri.style.opacity="0";
    evitri.style.visibility="hidden";
    datosapre.style.opacity="1";
    datosapre.style.visibility="visible";
})

cance.addEventListener('click', (e)=>{
    e.preventDefault();
    eviquin.style.opacity="0";
    eviquin.style.visibility="hidden";
    datosapre.style.opacity="1";
    datosapre.style.visibility="visible";
})
mostrartd.addEventListener('click', (e)=>{
    e.preventDefault();
    fond.style.opacity="0";
    mostrartd.style.background="#238276";
    informacion.style.opacity="1";
    informacion.style.visibility="visible";
})

salii.addEventListener('click', (e)=>{
    e.preventDefault();
    mostrartd.style.background="#fff";
    informacion.style.opacity="0";
    informacion.style.visibility="hidden";
    fond.style.opacity="1";
})

quincenal.addEventListener('click', (e)=>{
    e.preventDefault();
    eviquin.style.opacity="1";
    eviquin.style.visibility="visible";
    datosapre.style.opacity="0";
    datosapre.style.visibility="hidden";
    evitri.style.opacity="0";
    evitri.style.opacity="0";
})

trimestral.addEventListener('click', (e)=>{
    e.preventDefault();
    evitri.style.opacity="1";
    evitri.style.visibility="visible";
    datosapre.style.opacity="0";
    datosapre.style.visibility="hidden";
    eviquin.style.opacity="0";
    eviquin.style.visibility="hidden";
})