<?php
require_once("../../php/connecion.php");

$documento = $_POST["documentopdf"];

$consulta = "SELECT * from legalizacion where id_aprend= '$documento'";
$sql = mysqli_query($connection,$consulta);
$dato = mysqli_fetch_assoc($sql);

if ($dato) {
    $alternativa = $dato["id_alternativa"];

    if ($dato["id_alternativa"] == 1) {
        echo ("<iframe src='../aprendiz/pdfLEgalizacion/".$dato["form_023"]."' width='650' height='500'></iframe><br>
        <iframe src='../aprendiz/pdfLEgalizacion/".$dato["contra_copia"]."' width='650' height='500'></iframe>
        ");

    }elseif ($dato["id_alternativa"] == 2 || $dato["id_alternativa"] == 6) {
        echo ("<iframe src='../../aprendiz/pdfLEgalizacion/".$dato["form_023"]."' width='650' height='500'></iframe><br>
        <iframe src='../aprendiz/pdfLEgalizacion/".$dato["cart_solicitud"]."' width='650' height='500'></iframe><br>
        <iframe src='../aprendiz/pdfLEgalizacion/".$dato["const_empre"]."' width='650' height='500'></iframe>
        ");

    }elseif ($dato["id_alternativa"] == 3 || $dato["id_alternativa"] == 4|| $dato["id_alternativa"] == 5) {
        echo ("<iframe src='../aprendiz/pdfLEgalizacion/".$dato["form_023"]."' width='650' height='500'></iframe><br>
        <iframe src='../aprendiz/pdfLEgalizacion/".$dato["cart_solicitud"]."' width='650' height='500'></iframe><br>
        <iframe src='../aprendiz/pdfLEgalizacion/".$dato["const_empre"]."' width='650' height='500'></iframe><br>
        <iframe src='../aprendiz/pdfLEgalizacion/".$dato["eps_copia"]."' width='650' height='500'></iframe><br>
        <iframe src='../aprendiz/pdfLEgalizacion/".$dato["cedu_copia"]."' width='650' height='500'></iframe>
        ");

    }elseif ($dato["id_alternativa"] == 7) {
        echo("<iframe src='../aprendiz/pdfLEgalizacion/".$dato["form_023"]."' width='650' height='500'></iframe><br>
        <iframe src='../aprendiz/pdfLEgalizacion/".$dato["cart_solicitud"]."' width='650' height='500'></iframe><br>
        <iframe src='../aprendiz/pdfLEgalizacion/".$dato["eps_copia"]."' width='650' height='500'></iframe><br>
        ");

    }else {
        echo "No ha subido documentos";
    }
}else{
    echo "Aprendiz no registrado";
}

?>../