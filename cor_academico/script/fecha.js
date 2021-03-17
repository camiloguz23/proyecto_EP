const formulario_fecha = document.getElementById("fecha")
const btn_fecha = document.getElementById("btn_fecha")
const texto_fecha = document.getElementById("texto_fecha")

btn_fecha.addEventListener("click", (e) => {
    e.preventDefault()
    const dato_fecha = new FormData(formulario_fecha)
    fetch("fecha.php",{
        method:"POST",
        body: dato_fecha
    }).then(res => res.text()).then(info => {
        texto_fecha.textContent = info
        formulario_fecha.reset()
    })
})
