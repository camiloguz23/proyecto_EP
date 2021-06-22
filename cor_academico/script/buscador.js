const documento = document.getElementById("docuaprend")
const boton = document.getElementById("btn_enviar")
const formulario = document.getElementById("formulario_buscador")
const cuerpo = document.getElementById("cuerpo")

documento.addEventListener("keyup", () => {
    const dato = new FormData(formulario)

    fetch("php/BDbuscador.php", {
        method : "POST",
        body: dato
    }).then(res => res.text()).then(info => {
        console.log(info)
        cuerpo.innerHTML = info
    })
})