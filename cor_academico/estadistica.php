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
$sql_cer = "SELECT COUNT(id_estado) from detalle_formacion where id_estado = 3";
$consulta_cer = mysqli_query($connection,$sql_cer);
$dato_cer = mysqli_fetch_array($consulta_cer)
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
$sql_indu = "SELECT COUNT(id_cen_form) from ficha_programacion where id_cen_form = 1";
$consulta_indu = mssql_query($connection,$sql_indu);
$dato_indu = mysqli_fetch_array($consulta_indu);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/codinh.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <link rel="icon" href="../imagenes/favicon.ico">
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
                <form action="../php/crearPazySalvo.php" autocomplete="off" method="POST" id="frm_1">
                    <label for="documento">Documento de identidad</label>
                    <input class="input" type="number" name="documento" id="documento"  placeholder="Ingrese el documento del aprendiz">
                    <input type="hidden" name="usuario" value="<?php echo $usario?>">
                    <input class="submit" type="submit" value="Buscar">
                </form>
            </div>
        </li>
        <li><a href="#"><img class="tres"  width="39" height="30" src="../imagenes/Imagen6.png" alt="">ESTADISTICA</a></li>
    </ul>
</nav>

</header>
<div class="estadistica">
    <h3>Estadisticas de los aprendices </h3>
    <p><strong>Aprendices en etapa lectiva: </strong> <?=$dato_lec[0]?></p>
    <p><strong>Aprendices en etapa de legalizacion: </strong> <?=$dato_leg[0]?></p>
    <p><strong>Aprendices en etapa de certificacion: </strong> <?=$dato_cer[0]?></p>
    <p><strong>Aprendices en etapa pendiente por el certificado: </strong> <?=$dato_pend[0]?></p>
    <p><strong>Aprendices en etapa certificado entregado: </strong> <?=$dato_fin[0]?></p>

</div>
</body>
</html>
