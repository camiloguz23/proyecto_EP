<?php
require_once("../php/connecion.php");
if(isset($_POST))
{
    // $apre = $_POST["documenapre"];
    $tipo_evi = $_POST['tip_evi'];

    
    $sql_ciudad="SELECT * FROM calificacion INNER JOIN evidencias on calificacion.id_evidencias=evidencias.id_evidencias INNER JOIN tipo_evidencias on evidencias.id_tip_eviden=tipo_evidencias.id_tip_eviden  WHERE id_esta_evi=1 and evidencias.id_tip_eviden=$tipo_evi and id_aprend=1245 ORDER BY evidencias.id_evidencias ASC  ";
    $query_ciudad = mysqli_query($connection, $sql_ciudad);
    $infor=array();
    while($dato =mysqli_fetch_assoc($query_ciudad)){
        array_push($infor, $dato);
    }
    echo json_encode($infor);
    return;
    
}
else{
    echo json_encode("tre");
    return;
}

?>