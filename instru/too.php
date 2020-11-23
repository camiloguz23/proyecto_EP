<?php
require_once("../php/connecion.php");
if(isset($_POST))
{
    
    $usuario = $_POST['tip_evi'];
    
    $sql_ciudad="SELECT * FROM evidencias INNER JOIN tipo_evidencias on evidencias.id_tip_eviden=tipo_evidencias.id_tip_eviden WHERE tipo_evidencias.id_tip_eviden='$usuario' ";
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