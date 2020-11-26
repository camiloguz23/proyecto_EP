<?php
require '../php/connecion.php';

$ins = $_POST["docuinst"];
$cheq =$_POST["check"];


$consul = "UPDATE detalle_formacion INNER JOIN calificacion on detalle_formacion.id_aprend=calificacion.id_aprend SET id_estado=3  WHERE calificacion.id_esta_evi=2 ";
$sqli = mysqli_query($connection, $consul);


if($sqli)
{
    $evidencia = "UPDATE calificacion SET id_esta_evi=2,id_doc_instru=$ins,fecha_cali=now() WHERE `id_evidencias`=$cheq ";
    $sql = mysqli_query($connection, $evidencia);
    
    echo("<script>alert(' calificacion de correcta')</script>");
    // header("location: instructor.php");
                            
}else
{
    echo ("morimosss");
                            
}
?>