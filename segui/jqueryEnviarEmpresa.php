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

    $validar = "SELECT * from empresa where nom_empre = '$nomEM' and nit_empresa = '$nitEM'";
    $sqlValidar = mysqli_query($connection,$validar);
    $datoValidar= mysqli_fetch_assoc($sqlValidar);

    if ($datoValidar) {
        echo "<script >".$datoValidar["nom_empre"]."</script>";
    }else {
        $consul = "INSERT INTO empresa(nit_empresa, nom_empre, direc_empre, nom_jef_inme, cargo, telefono, correo,id, razon_social_empresa) 
        VALUES ('$nitEM','$nomEM','$direcEM','$nomJefInme','$cargo','$telefono','$correo','$ciudad','$socialEm')";
    
        echo mysqli_query($connection,$consul);
    }


    






?>