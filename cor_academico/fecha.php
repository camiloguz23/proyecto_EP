<?php
require_once ("../php/connecion.php");

$dato_fechaF = $_POST["ficha"];

$fecha= "SELECT fecha_inicio, fecha_final from ficha_programa where num_ficha = $dato_fechaF";
$fecha_consulta = mysqli_query($connection,$fecha);
$dato_fecha = mysqli_fetch_assoc($fecha_consulta);

$sql_ficha = "SELECT num_ficha, pro_formacion.nom_formacion from ficha_programa, pro_formacion WHERE ficha_programa.id_formacion=pro_formacion.id_formacion and ficha_programa.num_ficha = $dato_fechaF";
$consulta_ficha = mysqli_query($connection,$sql_ficha);
$dato_ficha = mysqli_fetch_assoc($consulta_ficha);

$fechaUno = date_create($dato_fecha["fecha_inicio"]);
date_default_timezone_set("America/Bogota");
$fecha_actual = date_create(date("y-m-d"));
$resta = $fecha_actual -> diff($fechaUno);

echo "La formacion ".$dato_ficha['num_ficha']." ".$dato_ficha['nom_formacion']."\nTiempo faltante es de ".$resta->d." dias, ".$resta->m." meses, ".$resta->y." años para inicio de la etapa productiva y termina la etapa productiva el ".$dato_fecha['fecha_final']

?>
