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
    <link rel="stylesheet" href="style/ape.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <title>APE</title>
</head>
<body>
    <header class="princi">
       
        <div class="logo">

            <img class="imagen"  height="80" width="85" src="../imagenes/iconoape.jpg.png"  alt="">
            <h3 class="segui">AGENCIA PUBLICA DE EMPLEO<img class="seguiimg" width="35" height="30" src="https://image.flaticon.com/icons/png/512/2111/2111091.png" alt=""></h3>

            <div class="cerrar">
                <a href="../php/salir.php">CERRAR SESIÓN</a>
            </div>

            <div class="segun">
                <img height=213 src="../imagenes/verdemoco.png" alt="">
            </div>
        </div>

        <nav class="navegacion">
            <ul class="menu">
                <li id="paz">
                    <a href="#" id="btn_pazysalvo"><img class="dos" width="36" height="26" src="https://www.flaticon.es/svg/static/icons/svg/2091/2091584.svg" alt="">PAZ Y SALVO</a>
                    <div class="cuadro" id="cuadro">
                        <form action="../paz_y_salvo/pazysalvo.php" method="POST" id="frm_1">
                            <label for="documento">Documento de identidad</label>
                            <input class="input" type="number" name="documento" id="documento" placeholder="Ingrese el documento">
                            <input type="hidden" name="usuario" value="<?php echo $usario?>">
                            <input class="submit" type="submit" value="Buscar">
                        </form>
                    </div>
                </li>
                <li><a href="#"><img class="tres"  width="39" height="30" src="../imagenes/Imagen6.png" alt="">APRENDIZ</a></li>
            </ul>  
        </nav>

    </header>

    <div class="contper">
            <div id="fondo" class="fondo">
                <img width="1349" height="400" src="../imagenes/ape.jpg" alt="">
            </div>
        <div class="naranja" ><img class="perfil" src="../imagenes/PERFIL.jpg" alt=""></div>

        <div class="contenedor">
            <div class="date">
                <ul class="datos">
                    <p>Soy  una persona empendedora que siempre mira hacia adelante y simepre intenta ser mejor cada  dia</p>
                    <p class="text2">NOMBRE: <?=$_SESSION["usuario"]?> </p>
                    <p class="text2"> TELEFONO: <?=$_SESSION["telefono"]?></p>
                    <p class="text2">EMAIL:  <?=$_SESSION["correo"]?></p>
                </ul>
            </div>
            <div class="edicion">
                <a href="#" class="button">EDITAR</a>
            </div> 
        </div>
        
            <div class="opcion">
                <a href="#" class="button3"> <img class="butdos" height="26" width="33" src="https://www.flaticon.es/svg/static/icons/svg/2091/2091584.svg" alt="" srcset="">PAZ Y SALVO</a>
                <a href="#" class="button4"> <img class="buttres" height="30" width="55" src="../imagenes/Imagen6.png" alt="" srcset="">APRENDICES</a>
            </div>
    </div>

    </div>
    <div id="pazsal" class="pazsal">

        <div id="cerrarpaz" class="cerrarpaz">
            <img src="../imagenes/cancelar.png" alt="">
        </div>
    </div>
    <footer class="pie">
        <img  height="70px" width="70px" src="../imagenes/logo blanco.jpg" alt="">

        <div class="info">
            <p>&copy; Servicio Nacional de Aprendizaje SENA </p>
            <p>Centro de Industria y Construccion- Ibague-Tolima </p>
            
            <p> Direccion: 141- Sector, Cra. 45 Sur #1255</p>
        </div>
    </footer>
   

<script src="script/ape.js"></script>
</body>
</html>