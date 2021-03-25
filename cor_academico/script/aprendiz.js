const btn_enviar = document.getElementById("btn_enviar")
const formulario_dato = document.getElementById("formulario_dato")
const dato_aprendiz = document.getElementById("dato-aprendiz")
const botonApre = document.querySelector(".botones-aprendiz")
const pdf = document.getElementById("pdf")
const  conte_pdf = document.getElementById("conte-pdf")
const formu_dos = document.getElementById("formudos-aprendiz")
const add_input = document.getElementById("agregar")
const docuPDF = document.getElementById("docupdf")

btn_enviar.addEventListener("click", (e) => {

    e.preventDefault()
    const pdf_envio = docuPDF.value
    agregar(pdf_envio)
    const documento = new FormData(formulario_dato)
    fetch("php/informe-aprendiz.php", {
        method:"POST",
        body: documento
    }).then(res => res.text()).then(info => {
        dato_aprendiz.innerHTML = info
        botonApre.style.visibility = "visible"
    })
})

pdf.addEventListener("click", (e) => {
    e.preventDefault()
    const dato = new FormData(formu_dos)
    console.log(dato+"aaaaa")
    fetch("php/pdfaprendiz.php", {
        method: "POST",
        body: dato
    }).then(res => res.text()).then(info => {
        console.log("dddd"+info)
        conte_pdf.innerHTML = info
    })
})

function agregar(docu) {
    console.log(docu)

    add_input.innerHTML =  `<input type="hidden" value="${docu}" name="documentopdf">`

}