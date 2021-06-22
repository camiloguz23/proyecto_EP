const alternativ = document.getElementById("tipoAlternativa")
const documentoss = document.getElementById("documentos")

alternativ.addEventListener("blur", (e)=> {
    const datoalter = alternativ.value

    switch (datoalter) {
        case "1":
            documentoss.innerHTML = ` 
            <h5>Contrato De Aprendizaje</h5>
            <div class="uno">
                <h2>Formato GFPI-F-023</h2>
                <a href="documentos/GFPI-F-023_Formato_Planeacion_seguimiento_y_evaluacion_etapa_productiva_V3.docx" download="Formato-GFPI-F-023">Formato GFPI-F-023</a>
                </div>
            <div class="dos">
                <h2>Formato de casta de autorizacion de Coordinacion Academica</h2>
                <a href="documentos/Formato%20carta%20de%20autorizacion%20Coordinacion%20Academica.doc" download="Carta-Autorizacion-Academica">Carta de Autorizacion </a>
            </div>
            `
            break;
        case "2":
            documentoss.innerHTML = `
            <h5>Vinculacion Laboral </h5>
            <div class="uno">
                <h2>Formato GFPI-F-023</h2>
                <a href="documentos/GFPI-F-023_Formato_Planeacion_seguimiento_y_evaluacion_etapa_productiva_V3.docx" download="Formato-GFPI-F-023">Formato GFPI-F-023</a>
                </div>
            <div class="dos">
                <h2>Carta de Solicitud</h2>
                <a href="documentos/Formato%20carta%20de%20autorizacion%20Coordinacion%20Academica.doc" download="Carta-Autorizacion-Academica">Carta de Solicitud </a>
            </div>
            `
            break;
        case "3":  // "Pasantía: Apoyo unidad productiva familiar"
            documentoss.innerHTML = `
            <h5>Monitoria </h5>
                <div class="uno">
                    <h2>Formato GFPI-F-023</h2>
                    <a href="documentos/GFPI-F-023_Formato_Planeacion_seguimiento_y_evaluacion_etapa_productiva_V3.docx" download="Formato-GFPI-F-023">Formato GFPI-F-023</a>
                    </div>
                <div class="dos">
                    <h2>Carta de Solicitud</h2>
                    <a href="documentos/Formato%20carta%20de%20autorizacion%20Coordinacion%20Academica.doc" download="Carta-Autorizacion-Academica">Carta de Solicitud </a>
                </div>
            `
            break;
        case "4":  // "Pasantia:Apoyo entidad estatal, municipal, verdal u OMG"
            documentoss.innerHTML = `
            <h5>Unidades Productivas Familiares </h5>
                <div class="uno">
                    <h2>Formato GFPI-F-023</h2>
                    <a href="documentos/GFPI-F-023_Formato_Planeacion_seguimiento_y_evaluacion_etapa_productiva_V3.docx" download="Formato-GFPI-F-023">Formato GFPI-F-023</a>
                    </div>
                <div class="dos">
                    <h2>Carta de Solicitud</h2>
                    <a href="documentos/Formato%20carta%20de%20autorizacion%20Coordinacion%20Academica.doc" download="Carta-Autorizacion-Academica">Carta de Solicitud </a>
                </div>
            `
            break;
        case "5": // Pasantia : Monitoria
            documentoss.innerHTML = `
            <h5>Pasantias Apoyo a Entidad </h5>
                <div class="uno">
                    <h2>Formato GFPI-F-023</h2>
                    <a href="documentos/GFPI-F-023_Formato_Planeacion_seguimiento_y_evaluacion_etapa_productiva_V3.docx" download="Formato-GFPI-F-023">Formato GFPI-F-023</a>
                    </div>
                <div class="dos">
                    <h2>Carta de Solicitud</h2>
                    <a href="documentos/Formato%20carta%20de%20autorizacion%20Coordinacion%20Academica.doc" download="Carta-Autorizacion-Academica">Carta de Solicitud </a>
                </div>
            `
            break;
        case "6":  // Servicio Militar (social)
            documentoss.innerHTML = `
            <h5>Proyecto Productivo </h5>
                <div class="uno">
                    <h2>Formato GFPI-F-023</h2>
                    <a href="documentos/GFPI-F-023_Formato_Planeacion_seguimiento_y_evaluacion_etapa_productiva_V3.docx" download="Formato-GFPI-F-023">Formato GFPI-F-023</a>
                    </div>
                <div class="dos">
                    <h2>Carta de Solicitud</h2>
                    <a href="documentos/Formato%20carta%20de%20autorizacion%20Coordinacion%20Academica.doc" download="Carta-Autorizacion-Academica">Carta de Solicitud </a>
                </div>
            `
            break;
        case "7": // Proyecto productivo
            documentoss.innerHTML = `
            <h5> Servivio Militar </h5>
                <div class="uno">
                    <h2>Formato GFPI-F-023</h2>
                    <a href="documentos/GFPI-F-023_Formato_Planeacion_seguimiento_y_evaluacion_etapa_productiva_V3.docx" download="Formato-GFPI-F-023">Formato GFPI-F-023</a>
                    </div>
                <div class="dos">
                    <h2>Carta de Solicitud</h2>
                    <a href="documentos/Formato%20carta%20de%20autorizacion%20Coordinacion%20Academica.doc" download="Carta-Autorizacion-Academica">Carta de Solicitud </a>
                </div>
            `
        	break;
        default:
            documentoss.innerHTML =`<input type="hidden" name="">`
            break;
    }
})