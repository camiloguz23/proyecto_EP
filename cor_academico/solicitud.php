<?php
require_once ("../php/connecion.php");

$sql = "SELECT aprendices.id_aprend,nombre_aprend,apellido_aprend,carta FROM aprendices, detalle_formacion WHERE id_estado = 1 and aprendices.id_aprend = detalle_formacion.id_aprend";
$consulta = mysqli_query($connection,$sql)
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
                <a href="cordinh.php" ><img class="dos" width="33" height="26" src="https://www.flaticon.es/svg/static/icons/svg/2091/2091584.svg" alt="">PAGINA DE PERFIL</a>
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
<h1 class="estadistica">Cartas enviadas</h1>

<div class="divtable">
    <table>
        <thead>
        <tr>
            <th>Documento</th>
            <th>Nombre y apellido</th>
            <th>Carta</th>
            <th>Aprobacion</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($consulta as $datoapre){
            ?> <tr>
                <td><?=$datoapre["id_aprend"]?></td>
                <td><?=$datoapre["nombre_aprend"]?> <?=$datoapre["apellido_aprend"]?></td>
                <td><a href="../aprendiz/carta/<?=$datoapre['id_aprend']?>/<?=$datoapre['carta']?>"><?=$datoapre['carta']?></a></td>
                <td>
                    <form method="post" action="php/aprobacion.php" autocomplete="off">
                        <input type="hidden" value="<?=$datoapre['id_aprend']?>" name="documento">
                        <button type="submit">Aprobar</button>
                    </form>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>








