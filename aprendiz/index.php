<?php
session_start();
$usuario = $_SESSION['documento-aprend'];

if ($usuario == "" || $usuario == null ){
    header("location: ../index.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="icon" href="../imagenes/favicon.ico">


    <title>APRENDIZ</title>
</head>

<body>
    <header class="princi">

        <div class="logo">

            <img class="imagen" height="80" width="80" src="../imagenes/Imagen1.png" alt="no aparece">
            <h3 class="segui">APRENDIZ<img class="seguiimg" width="30" height="30" src="../imagenes/Imagen7.png" alt=""></h3>

            <div class="cerrar">
                <a href="../php/salir.php">CERRAR SESIÓN</a>
            </div>

            <div class="segun">
                <img height="220" src="../imagenes/verdemoco.png" alt="">
            </div>
        </div>

        <nav class="navegacion">
            <ul class="menu">
                <li><a href="#" id="seguimi"><img class="dos" width="33" height="26" src="../imagenes/Imagen8.png" alt="">#</a></li>
                <li ><a href="#" id="calificaa"><img class="tres" width="39" height="30" src="../imagenes/Imagen6.png" alt="">#</a></li>
            </ul>
        </nav>

    </header>


    <div id="fondo" class="fondo">

    </div>

    <div class="naranja">
        <img class="perfil" src="../fotoPerfil/aprendices/<?=$_SESSION['foto']?>" alt="foto de perfil">
    </div>

    <div id="date" class="contenedor">
        <div class="date">


             <ul class="datos">
                <p class="text2">NOMBRE: <?= $_SESSION['nombre-aprendiz'] ?> <br>
                TELEFONO:<?= $_SESSION['telefono-aprend'] ?><br>
                E-Mail:<?= $_SESSION['correo-aprendiz'] ?></p>
            </ul>

            <a href="#" class="button">EDITAR</a>

        </div>
    </div>

    <div class="opcion">

        <a href="#" class="button3"> <img class="butdos" height="26" width="33" src="../imagenes/Imagen8.png" alt="" srcset=""> #</a>
        <a href="#" class="button3"> <img class="buttres" height="30" width="55" src="../imagenes/Imagen6.png" alt="" srcset="">#</a>
        <a href="#" class="button3"> <img height="26" width="33" src="https://www.flaticon.es/svg/static/icons/svg/2091/2091584.svg" alt="" srcset="">#</a>


    </div>
      
    <footer class="pie">
        <img height="70px" width="70px" src="../imagenes/logo blanco.jpg" alt="">

        <div class="info">
            <p>&copy; Servicio Nacional de Aprendizaje SENA </p>
            <p>Centro de Industria y Construccion- Ibague-Tolima </p>

            <p> Direccion: 141- Sector, Cra. 45 Sur #1255</p>
        </div>
    </footer>

    
</body>

</html>