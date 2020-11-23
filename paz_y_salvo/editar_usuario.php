<?php

require_once('../php/connecion.php');


$usario = $_GET['usuario'];
$id = $_GET['id'];
$documento = $_GET['documento'];

if(isset($_FILES['file'])) {
    $directorio = "../uploads/" . $usario;
    
    if (!file_exists($directorio)) {
        mkdir($directorio, 0777, true);
    }

    $directorio = $directorio . "/";

    $archivo = $directorio . basename($_FILES["file"]["name"]); // uploads/carta.pdf
    $nombreArchivo = $_FILES["file"]["name"];
    $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
    $tamañoArchivo = $_FILES["file"]["size"];

    
        if ($tamañoArchivo <= 209715200) {

            if(move_uploaded_file($_FILES["file"]["tmp_name"], $archivo)){
                
                $sql = "UPDATE detalle_pazysalvo SET firma = '$archivo' WHERE detalle_pazysalvo.id_det_pazysalvo = '$id'";
                $consultarSql = mysqli_query($connection,$sql);
                header("location: pazysalvo.php");
                
            } else {
                echo "<script>alert('Ha ocurrido un error al subir el archivo')</script>";
            }

        } else {
            echo "<script>alert('El peso del archivo es superior a 200MB')</script>";
        }   
}

?>

<h1>Subir Firma</h1>

<div class="caja_form">
    <form method="post" enctype="multipart/form-data" class="form_2" id="form_2">
        <h3>Subir Firma</h3>
        <input type="file" name="file">
        <p class="center"><input id="btn_subirfirma" type="submit" value="Subir Archivo"></p>
    </form>
</div>