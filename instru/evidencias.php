<?php
require '../php/connecion.php';

$ins = $_POST["docuinst"];
$apre = $_POST["documenapre"];
$cheq =$_POST["check"];

echo($ins);

$evidencia = "UPDATE calificacion SET id_esta_evi=2,id_doc_instru=$ins,fecha_cali=now() WHERE `id_evidencias`=$cheq ";
$sql = mysqli_query($connection, $evidencia);

if($sql)
{
    
    header("location: instructor.php");
                            
}else
{
    echo ("morimosss");
                            
}
?>