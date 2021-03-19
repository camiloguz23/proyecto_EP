<?php
require_once ("php/connecion.php");
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
$nom_ficha = "SELECT num_ficha,nom_formacion from ficha_programa, pro_formacion where ficha_programa.id_formacion = pro_formacion.id_formacion";
$consulta_ficha = mysqli_query($connection,$nom_ficha);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" href="imagenes/favicon.ico">

    <title>INICIO</title>
</head>
<body>

    <header class="princi">
       
        <div class="logo">
            <img class="imagen"  height="67" width="90" src="imagenes/iconoinicio.jpg.png"  alt="">
            <h3 class="segui">SEA| <h4>SEGUIMIENTO A EL ESTADO DEL APRENDIZ<img class="seguiimg" width="20" height="20" src="imagenes/iconoii.jpg" alt=""></h4></h3>
            <p class="parrafo">Procesos y seguimiento de la estapa productiva del aprendiz</p>
            <div class="segun">
                <img height="220" src="imagenes/verdemoco.png" alt="">
            </div>
        </div>
        


        <nav class="navegacion">
            <ul class="menu">
                <li><a href="#"><img class="uno" width="25" height="25"  src="imagenes/casa.jpg" alt="">INICIO </a></li>
                <li><a href="ingreso/ingreso.html"><img class="tres"  width="25" height="25" src="imagenes/ingresar.jpg" alt="">INGRESAR</a></li>
            </ul>  
        </nav>

    </header>

    <div class="contenido">

        <div class="video">
            <iframe src="https://www.powtoon.com/embed/eeZpDKZQsfe/" frameborder="0" ></iframe>
        </div>
        <div class="imagn">
        <img src="imagenes/unnamed.png" alt="">
      </div>
    </div>

    <div class="paginas">
        <a href="http://oferta.senasofiaplus.edu.co/sofia-oferta/" target="_blank"><img height="52" width="58" src="imagenes/sofia.png" alt=""></a><br>
        <a href="https://www.sena.edu.co/es-co/Paginas/default.aspx" target="_blank"><img height="52" width="55" src="imagenes/sena.png" alt=""></a><br>
        <a href="https://sena.territorio.la/index.php?login=true" target="_blank"><img height="49" width="55" src="imagenes/terrritorium.png" alt=""></a><br>
    </div>

    <footer class="pie">
        <img  height="70px" width="70px" src="imagenes/logo blanco.jpg" alt="">
        <div class="info">
            <p>&copy; Servicio Nacional de Aprendizaje SENA </p>
            <p>Centro de Industria y Construccion- Ibague-Tolima </p>
            <p> Direccion: 141- Sector, Cra. 45 Sur #1255</p>
        </div>

    </footer>
    <div class="container">
        <div class="contenido1">

            <div class="unoss">
            <div class="primero">
            <img src="imagenes/unnamed.png" alt="">
            <h2>SEA|SEGUIMIENTO A EL ESTADO DEL APRENDIZ </h2>
            </div>

            <div class="cerr" id="cerrar">
                <p class="cerrar" >X</p>
            </div>

            </div>
            <div class="dato_mensaje">
                <p>Aprendices en etapa lectiva <span><?=$dato_lec[0]?></span></p>
                <p>Aprencices legalizados <span><?=$dato_leg[0]?></span></p>
                <p>Aprendices inicio de certificacion <span><?=$dato_cer[0]?> </span> </p>
                <p>Aprendices con certificado <span><?=$dato_fin[0]?> </span></p>
            </div>
        </div>

    </div>
    <script src="index.js" type="module"></script>
</body>
</html>