<?php
require_once ("connecion.php");



$nit = $_POST["nit"];
$razon_social = $_POST["razon_social"];
$nom_empresa = $_POST["nom_empresa"];
$direccion = $_POST["dire_empresa"];
$telefono = $_POST["tel_empresa"];
$correo = $_POST["correo"];
$ciudad = $_POST["ciu_empresa"];

echo " 1 ".$nit." 2 ".$razon_social." 3 ".$nom_empresa." 4 ".$direccion." 5 ".$telefono." 6 ".$correo." 7 ".$ciudad."  ";


if ($nit != "" && $razon_social != "" && $nom_empresa != "" && $direccion != "" && $telefono != "" && $correo != "" && $ciudad != ""){

    echo "bien ";
    $sql = "INSERT INTO empresa (nit_empresa, nom_empre, direc_empre, telefono, correo, id, razon_social_empresa) VALUES ('$nit','$nom_empresa','$direccion','$telefono','$correo','$ciudad','$razon_social')";

    $consulta = mysqli_query($connection,$sql);

    if ($consulta){
        header("location: ../administrador/admin.php");
    }else{
        echo "fallo la consulta";
    }
}else{
    echo "no entra dato ";
}


?>