<?php 
   include("connecion.php");
   

    if (strlen($_POST['tipdocu']) >= 1 && strlen($_POST['nom']) >= 1 && strlen($_POST['ape']) >= 1 && strlen($_POST['email']) >= 1 && strlen($_POST['tel']) >= 1 && strlen($_POST['docu']) >= 1 ) {

        $tipdoc=$_POST['tipdocu'];
        $name=$_POST['nom'];
        $ape=$_POST['ape'];
        $email=$_POST['email'];
        $tel=$_POST['tel'];
        $docu= $_POST['docu'];
        
        $insert="INSERT INTO aprendices (id_aprend, nombre_aprend, apellido_aprend, correo_aprend, telefono_aprend, id_tip_docu)
        VALUES ('$docu', '$name', '$ape', '$email', '$tel', '$tipdoc')";
        echo mysqli_query($connection, $insert);
    }

   
?>