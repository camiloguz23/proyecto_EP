<?php
require_once('connecion.php');
session_start();

if(isset($_POST)){
    $docAprendiz = $_POST['documento'];
    $_SESSION['docAprendiz'] = $docAprendiz;

    $consultaPazysalvo = "SELECT * FROM paz_y_salvo WHERE id_aprend = '$docAprendiz'";
    $queryPazysalvo = mysqli_query($connection, $consultaPazysalvo);
    $pazysalvo = mysqli_fetch_assoc($queryPazysalvo);
        if(empty($pazysalvo)){

            $crearPazysalvo = "INSERT INTO paz_y_salvo (id_pazysalvo, id_aprend, fecha_diligenciamiento) VALUES ('', '$docAprendiz', NOW())";
            $querycrearPaz = mysqli_query($connection, $crearPazysalvo);

            header("location: ../paz_y_salvo/pazysalvo.php");
        } else {
            header("location: ../paz_y_salvo/pazysalvo.php");
        }
}

?>
