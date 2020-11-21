<?php
require_once("connecion.php");

$docu = $_GET["documento"];

$consultaEstado = "SELECT * FROM detalle_formacion where id_aprend = '$docu'";
$sql = mysqli_query($connection,$consultaEstado);
$dato = mysqli_fetch_assoc($sql);

if ($dato) {
    echo $dato["id_estado"];
}
?>