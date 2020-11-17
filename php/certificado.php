<?php
$compromisoCERT= $_FILES["CompromisoCertificacion"]["name"];
$rutaComCERT = $_FILES["CompromisoCertificacion"] ["tmp_name"];
$destinoComCERt = "../segui/pdfCertificacion/".$compromisoCERT;

$chequeo = $_POST["chequeo"];
$constaciaLabo = $_FILES["ConstanciaLaboral"]["name"];
$rutaCosntLaboabo = $_FILES["CompromisoCertificacion"] ["tmp_name"];
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
?>