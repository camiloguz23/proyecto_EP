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
        
        echo ("ya estan creadas las calificaciones");
       
    }
    else{
        $consul = "INSERT INTO calificacion (`id_crear_evi`,`id_aprend`,`id_evidencias`,`id_esta_evi`,`id_doc_instru`,`fecha_cali`) VALUES (null,'$apre',1,1,null,null),(null,'$apre',2,1,null,null),(null,'$apre',3,1,null,null),(null,'$apre',4,1,null,null),(null,'$apre',5,1,null,null),(null,'$apre',6,1,null,null),(null,'$apre',7,1,null,null),(null,'$apre',8,1,null,null),(null,'$apre',9,1,null,null),(null,'$apre',10,1,null,null),(null,'$apre',11,1,null,null),(null,'$apre',12,1,null,null),(null,'$apre',13,1,null,null), (null,'$apre',14,1,null,null) "; 
        $query_est = mysqli_query($connection, $consul);
        header("location: instructor.php");
    };
}
?>
