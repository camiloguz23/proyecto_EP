<?php
require_once("connecion.php");

if ($_POST["docuEstudiante"] == "" || $_POST["docuEstudiante"] == null) {
    echo("identifique el aprendiz");
}else {
    if ($_POST["seleccionTipo"] == "Contrato de aprendizaje") {
        $nombre= $_FILES['GFPI'] ['name'];
        $ruta = $_FILES["GFPI"] ["tmp_name"];
        $destino = "../pdfLEdakizacion/".$nombre;
        $nombreDOs= $_FILES['ContratoAprendizaje'] ['name'];
        $rutaDos = $_FILES["ContratoAprendizaje"] ["tmp_name"];
        $destinoDos = "../pdfLEdakizacion/".$nombre;
        $documento = $_POST["docuEstudiante"];
        if ($nombre != "") {
            if (copy($ruta,$destino)) {
                $consulta = "INSERT INTO pdf (nombres,descripcion,ruta,tipo,documento) VALUES ('$nombre','$descripcion','$destino','$tipo','$documento')";
                $sql = mysqli_query($basedeDatos,$consulta);
            }
        }
    }
    
}   
?>