<?php
require_once ("../../php/connecion.php");

$documento = $_POST["documento"];

$sql = "UPDATE detalle_formacion SET id_estado = '2' WHERE detalle_formacion.id_aprend = $documento";
$consulta = mysqli_query($connection,$sql);

if ($consulta){
    header("location: ../solicitud.php");
}
?>
