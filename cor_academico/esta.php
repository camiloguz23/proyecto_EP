<?php
session_start();
$usario = $_SESSION["documento"];
if ($usario == "" || $usario == null) {
    header("location: ../index.html");
}
require_once('../php/connecion.php');

?>
<?php
$sql_lec = "SELECT COUNT(id_estado) from detalle_formacion where id_estado = 1";
$consulta_lec = mysqli_query($connection,$sql_lec);
$dato_lec = mysqli_fetch_array($consulta_lec)
?>
<?php
$sql_leg = "SELECT COUNT(id_estado) from detalle_formacion where id_estado = 2";
$consulta_leg = mysqli_query($connection,$sql_leg);
$dato_leg = mysqli_fetch_array($consulta_leg)
?>
<?php
$sql_pend = "SELECT COUNT(id_estado) from detalle_formacion where id_estado = 4";
$consulta_pend = mysqli_query($connection,$sql_pend);
$dato_pend = mysqli_fetch_array($consulta_pend)
?>
<?php
$sql_fin = "SELECT COUNT(id_estado) from detalle_formacion where id_estado = 5";
$consulta_fin = mysqli_query($connection,$sql_fin);
$dato_fin = mysqli_fetch_array($consulta_fin)
?>
<?php
$sql_cer = "SELECT COUNT(id_estado) from detalle_formacion where id_estado = 3";
$consulta_cer = mysqli_query($connection,$sql_cer);
$dato_cer = mysqli_fetch_array($consulta_cer)
?>
<?php
$sql_centro = "SELECT COUNT(id_deta_forma) FROM detalle_formacion,ficha_programa WHERE detalle_formacion.num_ficha= ficha_programa.num_ficha and ficha_programa.id_cen_forma = 1";
$consulta_centro = mysqli_query($connection,$sql_centro);
$dato_centro = mysqli_fetch_array($consulta_centro)
?>
<?php
$fecha= "SELECT fecha_inicio, fecha_final from ficha_programa where num_ficha = 2060060";
$fecha_consulta = mysqli_query($connection,$fecha);
$dato_fecha = mysqli_fetch_assoc($fecha_consulta);

$fechaUno = date_create($dato_fecha["fecha_inicio"]);
date_default_timezone_set("America/Bogota");
$fecha_actual = date_create(date("y-m-d"));
$resta = $fecha_actual -> diff($fechaUno)
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/codinh.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <link rel="icon" href="../imagenes/favicon.ico">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <title>ESTADISTICAS</title>
</head>
<body>
<header class="princi">

    <div class="logo">

        <img class="imagen"  height="90" width="90" src="../imagenes/coordinador.jpg"  alt="">
        <h3 class="segui">COORDINADOR ACADEMICO<img class="seguiimg" width="30" height="30" src="../imagenes//iconocoordina.jpg" alt=""></h3>

        <div class="cerrar">
            <a href="../php/salir.php">CERRAR SESIÓN</a>
        </div>

        <div class="segun">
            <img height="220" src="../imagenes/verdemoco.png" alt="">
        </div>
    </div>

    <nav class="navegacion">
        <ul class="menu">
            <li id="pazsalvo">
                <a href="#" id="btn_pazysalvo"><img class="dos" width="33" height="26" src="https://www.flaticon.es/svg/static/icons/svg/2091/2091584.svg" alt="">PAZ Y SALVO</a>
                <div class="cuadro" id="cuadro">
                    <div class="b_salir">
                        <a href="#" id="salir"><img class="salir" src="../imagenes/cancelar.png" alt=""></a>
                    </div>

                </div>
            </li>
            <li><a href="#"><img class="tres"  width="39" height="30" src="../imagenes/Imagen6.png" alt="">ESTADISTICA</a></li>
        </ul>
    </nav>

</header>
<h1 class="estadistica">Estadistica</h1>

<div class="title_grafic">
    <h3>Estadisticas de los aprendices </h3>
    <p>Aprendices en etapa lectiva:  <?=$dato_lec[0]?></p>
    <p>Aprendices en etapa de legalizacion:  <?=$dato_leg[0]?></p>
    <p>Aprendices en etapa de certificacion: </> <?=$dato_cer[0]?></p>
    <p>Aprendices en etapa pendiente por el certificado:  <?=$dato_pend[0]?></p>
    <p>Aprendices en etapa certificado entregado:  <?=$dato_fin[0]?></p>
    <p><?=$resta->d?> dias <?=$resta->m?> meses <?=$resta->y?> años <?=$resta->s?> segudos</p> 

</div>
<div class="grafica">
    <canvas id="myChart" width="50px" height="20px"></canvas>
</div>
<div class="title_grafic">
    <h3>Centro de formacion </h3>

</div>


<script>
    console.log(<?=$dato_lec[0]?>)
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: {
            labels: ['lectiva', 'legalizacion', 'certificacio', 'proceso de entraga', 'entregado'],
            datasets: [{
                label: 'ESTADOS DE LOS APRENDICES',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [<?=$dato_lec[0]?>,<?=$dato_leg[0]?> ,<?=$dato_cer[0]?>,<?=$dato_pend[0]?>,<?=$dato_fin[0]?>]
            }]
        },

        // Configuration options go here
        options: {}
    });
</script>

</body>
</html>