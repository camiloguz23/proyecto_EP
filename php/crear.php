<?php 
   include("connecion.php");
    $tipdoc=$_POST['tipdocu'];
    $name=$_POST['nom'];
    $ape=$_POST['ape'];
    $email=$_POST['email'];
    $tel=$_POST['tel'];
    $docu= $_POST['docu'];

    $insert="INSERT INTO aprendices (id_aprend, nombre_aprend, apellido_aprend, correo_aprend, telefono_aprend, id_tip_docu)
    VALUES ('$docu', '$name', '$ape', '$email', '$tel', '$tipdoc')";
    echo mysqli_query($connection, $insert);
?>