<?php
require_once("connecion.php");

$compromisoCERT= $_FILES["CompromisoCertificacion"] ["name"];
$rutaComCERT = $_FILES["CompromisoCertificacion"] ["tmp_name"];
$destinoComCERt = "../segui/pdfCertificacion/".$compromisoCERT;

$chequeo = $_POST["chequeo"]; #evidencia de la etapa produtiva

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

$validarestu = "SELECT * FROM detalle_formacion where id_aprend = '$cedulaAprendiz'";
$sqlvalidar = mysqli_query($connection,$validarestu);
$datovalidar = mysqli_fetch_assoc($sqlvalidar);

if ($datovalidar["id_estado"] == 2) {

    if ($cedulaAprendiz != "" || $cedulaAprendiz != null) {

        if (copy($rutaComCERT,$destinoComCERt) && copy($rutaCosntLabo,$destinoConsLabo) && copy($rutaFormaSegui,$destinoFormaSegui) && copy($rutaProsaber,$destinoProsaber) && copy($rutaPazysalvo,$destinoPAzysalvo) && copy($rutaEPA,$destinoEPA) && copy($rutacedula,$destinocedula)) {
    
            $consulta = "INSERT INTO certificacion(id_certificacion, id_aprend, documento, fecha, evidencias_etapa_productiva, Compromiso_Certificación, Constancia_laboral, Formato_Seguimiento, Formato_Prueba_Saber_Pro, Paz_y_Salvo, Formato_APE, CC_fotocopia) VALUES ('','$cedulaAprendiz','$cedulaUsuario',NOW(),'$chequeo','$compromisoCERT','$constaciaLabo','$formaSegui','$prosaber','$pazysalvo','$EPA','$cedula')";
            $sql = mysqli_query($connection,$consulta);
    
            if ($sql) {
                $estado ="UPDATE detalle_formacion SET id_estado = '3' WHERE detalle_formacion.id_aprend = '$cedulaAprendiz'";
                $sqlEstado= mysqli_query($connection,$estado);
    
                if ($sqlEstado) {
                    echo ("2");
                }else{
                    echo "fallo en cambio de estado";
                }
            }else {
                echo "fallo en la cosulta de certificado";
            }
        }else{
            echo "copia de documentos";
        }
    }else{
        echo "4";
    }
}elseif ($datovalidar["id_Estado"] == 3) {
    echo "3";
}else{
    echo "1";
}




?>