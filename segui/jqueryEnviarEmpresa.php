<?php
 require '../php/connecion.php';

    $socialEm = $_POST['socialEm'];
    $nitEM = $_POST['nit'];
    $nomEM = $_POST['nomEmpre'];
    $direcEM = $_POST['direccion'];
    $nomJefInme = $_POST['nomJefe'];
    $cargo = $_POST['cargo'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['email'];
    $ciudad = $_POST["id_ciu"];

    
    $consul = "INSERT INTO empresa(nit_empresa, nom_empre, direc_empre, nom_jef_inme, cargo, telefono, correo,id, razon_social_empresa) 
    VALUES ('$nitEM','$nomEM','$direcEM','$nomJefInme','$cargo','$telefono','$correo','$ciudad','$socialEm')";

    echo mysqli_query($connection,$consul); 






?>