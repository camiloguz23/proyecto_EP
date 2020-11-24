
<?php
require '../php/connecion.php';

$ins = $_POST["docuinst"];
$apre = $_POST["documenapre"];
$check1 = $_POST["evi1"];
$fecha = $_POST ["fechaE"];

$evidencia = "INSERT INTO calificacion (id_calificaciones,id_docu_instru,id_docu_apren,id_evidencias,fecha,estado) VALUES (null,'$ins','$apre','$check1', '$fecha','calificado')";
$sql = mysqli_query($connection, $evidencia);

if($sql)
{
    
    header("location: instructor.php");
                            
}else
{
    echo ("morimosss");
                            
}
?>