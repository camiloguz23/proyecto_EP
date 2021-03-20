<?php
require_once ("connecion.php");
session_start();

$documento = $_POST["docuaprendiz"];
$clave = $_POST["claveaprendiz"];

if ($documento != "" and $clave != ""){

    $sql = "SELECT * from aprendices where id_aprend = $documento and password = $clave";
    $consulta = mysqli_query($connection,$sql);
    $dato_SQL = mysqli_fetch_assoc($consulta);

    if ($dato_SQL){

        $_SESSION['nombre-aprendiz']= $dato_SQL['nombre_aprend'];
        $_SESSION['documento-aprend'] = $dato_SQL['id_aprend'];
        $_SESSION['apellido-aprendiz'] = $dato_SQL['apellido_aprend'];
        $_SESSION['foto'] = $dato_SQL['foto'];
        $_SESSION['direccion'] = $dato_SQL['direccion'];
        $_SESSION['telefono-aprend'] = $dato_SQL['num_celular'];
        $_SESSION['correo-aprendiz'] = $dato_SQL['correo_aprend'];

        header("location: ../aprendiz/index.php");




    }else {
        echo "no consulta";
    }

}else {
    echo"datos vacios";
}
?>
