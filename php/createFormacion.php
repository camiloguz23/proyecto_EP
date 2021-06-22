<?php
require_once ("connecion.php");

$nombre = $_POST['nom_formacion'];

if ($nombre != "" ){

    $sql = "INSERT INTO pro_formacion (nom_formacion) values ('$nombre')";
    $consulta = mysqli_query($connection,$sql);

    if ($consulta){
        echo 2;
    }
}else{
    echo 1;
}


?>

