
<?php
require '../php/connecion.php';

$ins = $_POST["docuinst"];
$apre = $_POST["documenapre"];
$cheq =$_POST["check"];

echo($ins);

$evidencia = "INSERT INTO calificacion (id_crear_evi,id_aprend,id_evidencias,id_esta_evi,id_doc_instru,fecha_cali) VALUES(null,'$apre','$cheq',1,'$ins', NOW()) ";
$sql = mysqli_query($connection, $evidencia);

if($sql)
{
    
    header("location: instructor.php");
                            
}else
{
    echo ("morimosss");
                            
}
?>