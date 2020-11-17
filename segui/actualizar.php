<?php
    require_once("../php/connecion.php");
    session_start();


/*    echo $usuario; */
    if (strlen($_POST['emailA']) >= 1 && strlen($_POST['telefonoA']) >= 1 && strlen($_POST['claveA']) >= 1) {

       
        $clave= $_POST['claveA'];
        $email=$_POST['emailA'];
        $tel=$_POST['telefonoA'];
        /* $docu= $_POST['docu']; */

        
        $insert=("UPDATE usuario SET correo = '$email', telefono = '$tel', clave = '$clave' WHERE usuario.documento = $docu");
        echo mysqli_query($connection, $insert);
    }else{
        echo $usuario;
        echo "no funciono";
    }
    










?>