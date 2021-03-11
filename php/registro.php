<?php
$connection = new mysqli("localhost", "root","","ep_proyecto");


$documento = $_POST['doc'];
$nombre = $_POST['nom'];
$apellido = $_POST['ape'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$tipo_usu = $_POST['tipousu'];
$tipo_docu = $_POST['tipDocu'];
$clave = $_POST["clave"];
$foto = $_FILES['imagen1'] ['name'];
$rutafoto = $_FILES['imagen1'] ['tmp_name'];
if ($tipo_usu == 1){
    $destinfoto = "../fotoPerfil/administrador/".$foto;
} elseif ($tipo_usu == 2){
    $destinfoto = "../fotoPerfil/seguimiento/".$foto;
} elseif ($tipo_usu == 3){
    $destinfoto = "../fotoPerfil/instructor/".$foto;
} elseif ($tipo_usu == 4){
    $destinfoto = "../fotoPerfil/APE/".$foto;
}elseif ($tipo_usu == 5){
    $destinfoto = "../fotoPerfil/bienestar/".$foto;
}elseif ($tipo_usu == 6){
    $destinfoto = "../fotoPerfil/coordinador/".$foto;
}elseif ($tipo_usu == 7){
    $destinfoto = "../fotoPerfil/biblioteca/".$foto;
} elseif ($tipo_usu == 8){
    $destinfoto = "../fotoPerfil/subdirector/".$foto;
}

if ($documento != "" && $nombre != "" && $apellido != "" && $clave != "" && copy($rutafoto,$destinfoto)){

    $sql = "INSERT INTO usuario (documento, nombre, apellido, correo, telefono, id_tip_usu, id_tip_docu, clave, foto) VALUES ('$documento','$nombre','$apellido','$correo','$telefono','$tipo_usu','$tipo_docu','$clave','$foto')";
    $consulta = mysqli_query($connection,$sql);

    if ($consulta){
        header("location: ../administrador/admin.php");
    }else {
        echo "error en la consulta";
    }
}else{
    echo "error en el if";

}





?>