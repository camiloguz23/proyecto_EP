<?php
require_once("connecion.php");
$documento = $_POST["documento"];

if($documento == "" || $documento == null){
    echo "Ingrese el documento del aprendiz";
}else{
    $consulta = "SELECT * from detalle_formacion where id_aprend = '$documento'";
    $sql = mysqli_query($connection,$consulta);
    $dato = mysqli_fetch_assoc($sql);

    if ($dato["id_estado"] == 1) {
        echo 1;
    }elseif ($dato["id_estado"] > 2) {
        echo 2;
    }else{
        
        $consultaCer = "SELECT id_esta_evi FROM calificacion WHERE id_aprend = '$documento' and id_esta_evi = 2";
        $sqlCer = mysqli_query($connection,$consultaCer);
        $datoCer = mysqli_fetch_array($sqlCer);
        $contador = $datoCer;
        
        if ($contador != "" || $contador != null) {

            $datoCer = mysqli_fetch_array($sqlCer);
            $contador = count($datoCer);
            $contadorAray = count($datoCer);
            if ($contadorAray == 2) {
                echo 3;
            
            }else{
                echo("Solo le han calificado ". $contador." evidencias");
            }

        }else {
            echo "No ha comenzado proceso de calificacion";
        }
        
    }

}


?>