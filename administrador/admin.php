<?php
    session_start();
    $usario = $_SESSION["documento"];
    if ($usario == "" || $usario == null) {
        header("location: ../index.html");
    }
        require_once('../php/connecion.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminis.css">
    <title>ADMINISTRADOR</title>
</head>
<body>
        <!--ENCABEZADO-->
        <header class="princi">
            <div class="logo">
                <h3 class="segui">ADMINISTRADOR<img class="seguiimg" width="30" height="30" src="../imagenes/iconoadmin.jpg.png" alt=""></h3>
                    <ul class="cerrar">
                        <li><a href="../php/salir.php">CERRAR SESIÓN</a></li>
                    </ul>
                    <div class="segun">
                        <img height="220" src="../imagenes/adminis.jpg.png" alt="">
                    </div>
                    <div class="segu">
                        <img height="200" src="../imagenes/verdemoco.png" alt="">
                    </div>
            </div>

            <nav class="navegacion">
                <ul class="menu">
                    <li id="uno"><a href="#"><img class="uno" width="30" height="30"  src="../imagenes/usuarioadmi.png" alt="">CREAR USUARIOS </a></li>
                    <li><a href="#"><img class="dos" width="26" height="30" src="../imagenes/Imagen5.png" alt="">-----------</a></li>
                    <li><a href="#"><img class="tres"  width="37" height="30" src="../imagenes/Imagen6.png" alt="">-----------</a></li>
                </ul>  
            </nav>

        </header>

        <!--CONTENIDO-->
    <div class="contenido">

        <div id="fondo" class="fondo">
            <img width="1349" height="400" src="../imagenes/adminitrador.jpg" alt="">
        </div>
        <div class="naranja" ><img class="perfil" src="../imagenes/PERFIL.jpg" alt=""></div>
        <div class="contenedor">
            <div class="date">
                <ul class="datos">
                    <p>Soy  una persona empendedora que mira hacia adelante y siempre intenta ser mejor cada  dia</p>
                    <p class="text2">NOMBRE: <?=$_SESSION["usuario"]?> </p>
                    <p class="text2"> TELEFONO: <?=$_SESSION["telefono"]?></p>
                    <p class="text2">EMAIL:  <?=$_SESSION["correo"]?></p>
                </ul>
            </div>
        </div>

        <div class="editar">
            <a href="#" class="button">EDITAR</a>
        </div>
        <div class="botmen">
            <a href="#" class="button2"> <img class="butuno" height="30" width="30" src="../imagenes/usuarioadmi.png" alt="" srcset=""> CREAR USUARIOS</a>
            <a href="#" class="button3"> <img class="butdos" height="30" width="30" src="../imagenes/Imagen5.png" alt="" srcset="">-----</a>
            <a href="#" class="button4"> <img class="buttres" height="30" width="55" src="../imagenes/Imagen6.png" alt="" srcset="">-------</a>
        </div>

    </div>

        <!--creacion de usuarios-->
    <div id="creausu" class="creausu">

        <div id="cerrar" class="cerrar">
            <img src="../imagenes/cancelar.png" alt="">
        </div>
    </div>

        <!--pie de pagina-->
    <footer class="pie">
        <img  height="70px" width="70px" src="../imagenes/logo blanco.jpg" alt="">
            <div class="info">
                <p>&copy; Servicio Nacional de Aprendizaje SENA </p>
                <p>Centro de Industria y Construccion- Ibague-Tolima </p>
                
                <p> Direccion: 141- Sector, Cra. 45 Sur #1255</p>
            </div>
    </footer>
<script src="admi.js"></script>
</body>
</html>