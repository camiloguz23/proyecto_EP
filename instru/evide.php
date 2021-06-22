<?php

require_once '../php/connecion.php';

if(isset($_POST)){
    
$ins = $_POST["docuinst"];
$apre = $_POST["documenapre"];
$buscar= "SELECT id_aprend FROM calificacion WHERE id_aprend=$apre";
$query_evi = mysqli_query($connection, $buscar);
$dato_evi =mysqli_fetch_all($query_evi);
$evide = (count($dato_evi));

    if($evide ==14){
        echo("<script>alert('usted ya inicializo la calificacion de actividades de este aprendiz')</script>");
         header("location: instructor.php");
    }
    else{
        $consul = "INSERT INTO calificacion (`id_crear_evi`,`id_aprend`,`id_evidencias`,`id_esta_evi`,`id_doc_instru`,`fecha_cali`) VALUES (null,'$apre',1,1,$ins,null),(null,'$apre',2,1,$ins,null),(null,'$apre',3,1,$ins,null),(null,'$apre',4,1,$ins,null),(null,'$apre',5,1,$ins,null),(null,'$apre',6,1,$ins,null),(null,'$apre',7,1,$ins,null),(null,'$apre',8,1,$ins,null),(null,'$apre',9,1,$ins,null),(null,'$apre',10,1,$ins,null),(null,'$apre',11,1,$ins,null),(null,'$apre',12,1,$ins,null),(null,'$apre',13,1,$ins,null), (null,'$apre',14,1,$ins,null) "; 
        $query_est = mysqli_query($connection, $consul);
        echo("<script>alert('inicializacion de calificacion de actividades correcta')</script>");
        header("location: instructor.php");
    };
}
?>
