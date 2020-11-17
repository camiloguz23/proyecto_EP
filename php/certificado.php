<?php
$compromisoCERT= $_FILES["CompromisoCertificacion"]["name"];
$rutaComCERT = $_FILES["CompromisoCertificacion"] ["tmp_name"];
$destinoComCERt = "../segui/pdfCertificacion/".$compromisoCERT;

$chequeo = $_POST["chequeo"];
$constaciaLabo = $_FILES["ConstanciaLaboral"]["name"];
$rutaCosntLabo = $_FILES["CompromisoCertificacion"] ["tmp_name"];
$destinoConsLabo = "../segui/pdfCertificacion/".$constaciaLabo;

$formaSegui = $_FILES["formatoSeguimiento"]["name"];
$rutaFormaSegui = $_FILES["CompromisoCertificacion"] ["tmp_name"];
$destinoFormaSegui = "../segui/pdfCertificacion/".$formaSegui;

$prosaber= $_FILES["proSaber"]["name"];
$rutaProsaber = $_FILES["proSaber"]["tmp_name"];
$destinoProsaber ="../segui/pdfCertificacion/".$prosaber;

$pazysalvo = $_FILES["pazSAlvo"]["name"];
$rutaPazysalvo = $_FILES["pazSAlvo"]["tmp_name"];
$destinoPAzysalvo = "../segui/pdfCertificacion/".$pazysalvo;

$EPA = $_FILES["formatoAPE"]["name"];
$rutaEPA = $_FILES["formatoAPE"]["tmp_name"];
$destinoEPA = "../segui/pdfCertificacion/".$EPA;

$cedula = $_FILES["cedula"]["name"];
$rutacedula = $_FILES["cedula"]["tmp_name"];
$destinocedula = "../segui/pdfCertificacion/".$cedula;

$cedulaAprendiz = $_POST["docuAprendiz"];
$cedulaUsuario = $_POST["usuario"];
if ($cedulaAprendiz == "" || $cedulaAprendiz == null) {
    if (copy($rutaComCERT,$destinoComCERt) && copy($rutaCosntLabo,$destinoConsLabo) && copy($rutaFormaSegui,$destinoFormaSegui) && copy($rutaProsaber,$destinoProsaber) && copy($rutaPazysalvo,$destinoPAzysalvo) && copy($rutaEPA,$destinoEPA) && copy($rutacedula,$destinocedula)) {
        INSERT INTO `certificacion`( `id_aprend`, `documento`, `fecha`, `evidencias_etapa_productiva`, `Compromiso_Certificación`, `Constancia_laboral`, `Formato_Seguimiento`, `Formato_Prueba_Saber_Pro`, `Paz_y_Salvo`, `Formato_APE`, `CC_fotocopia`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11])
    }
}

?>