<?php
require_once("connecion.php");

$documento = $_POST["docuEstuPDF"];

$consulta = "SELECT * from legalizacion where id_aprend= '$documento'";
$sql = mysqli_query($connection,$consulta);
$dato = mysqli_fetch_assoc($sql);

if ($dato) {
    $alternativa = $dato["id_alternativa"];

    if ($dato["id_alternativa"] == 1) {
        echo ("<iframe src='pdfLEgalizacion/".$dato["form_023"]."' width='650' height='500'></iframe><br>
        <iframe src='pdfLEgalizacion/".$dato["contra_copia"]."' width='650' height='500'></iframe>
        ");

    }elseif ($dato["id_alternativa"] == 2 || $dato["id_alternativa"] == 6) {
        echo ("<iframe src='pdfLEgalizacion/".$dato["form_023"]."' width='650' height='500'></iframe><br>
        <iframe src='pdfLEgalizacion/".$dato["cart_solicitud"]."' width='650' height='500'></iframe><br>
        <iframe src='pdfLEgalizacion/".$dato["const_empre"]."' width='650' height='500'></iframe>
        ");

    }elseif ($dato["id_alternativa"] == 3 || $dato["id_alternativa"] == 4|| $dato["id_alternativa"] == 5) {
        echo ("<iframe src='pdfLEgalizacion/".$dato["form_023"]."' width='650' height='500'></iframe><br>
        <iframe src='pdfLEgalizacion/".$dato["cart_solicitud"]."' width='650' height='500'></iframe><br>
        <iframe src='pdfLEgalizacion/".$dato["const_empre"]."' width='650' height='500'></iframe><br>
        <iframe src='pdfLEgalizacion/".$dato["eps_copia"]."' width='650' height='500'></iframe><br>
        <iframe src='pdfLEgalizacion/".$dato["cedu_copia"]."' width='650' height='500'></iframe>
        ");

    }elseif ($dato["id_alternativa"] == 7) {
        echo("<iframe src='pdfLEgalizacion/".$dato["form_023"]."' width='650' height='500'></iframe><br>
        <iframe src='pdfLEgalizacion/".$dato["cart_solicitud"]."' width='650' height='500'></iframe><br>
        <iframe src='pdfLEgalizacion/".$dato["eps_copia"]."' width='650' height='500'></iframe><br>
        ");

    }else {
        echo "no";
    }
}

?>