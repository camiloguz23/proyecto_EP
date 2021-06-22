<?php

require_once('../php/connecion.php');
session_start();


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

    if($tipoArchivo == "png" || $tipoArchivo == "jpg" || $tipoArchivo == "jpeg") {
        if ($tamañoArchivo <= 209715200) {

            if(move_uploaded_file($_FILES["file"]["tmp_name"], $archivo)){
                
                $sql = "UPDATE detalle_pazysalvo SET firma = '$archivo' WHERE detalle_pazysalvo.id_det_pazysalvo = '$id'";
                $consultarSql = mysqli_query($connection,$sql);

                echo'<script type="text/javascript">
                        alert("Se ha subido correctamente la firma");
                        window.location.href="pazysalvo.php";
                    </script>';
            } else {
                echo "<script>alert('Ha ocurrido un error al subir el archivo')</script>";
            }

        } else {
            echo "<script>alert('El peso del archivo es superior a 200MB')</script>";
        }   
    } else {
        echo "<script>alert('El tipo de archivo subido no es admitido, solo se admite imágenes (jpg, png, jpeg)')</script>";
    }
}
        

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="style/editar_usuario.css">
</head>
<body class="fondo">
    
<div class="caja_form">
    <form method="post" enctype="multipart/form-data" class="form_2" id="form_2">
        <h3 class="titulo">Subir Firma</h3>
        <input type="file" name="file" class="boton_personalizado">
        <p class="center"><input id="btn_subirfirma" type="submit" value="Subir Archivo" class="boton_personalizado"></p>
    </form>
</div>

</body>
</html>