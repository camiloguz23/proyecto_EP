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
    <link rel="stylesheet" href="style/biene.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <link rel="icon" href="../imagenes/favicon.ico">
    <title>BIENESTAR</title>
</head>
<body>
    <header class="princi">
       
        <div class="logo">

            <img class="imagen"  height="90" width="90" src="https://cdn.icon-icons.com/icons2/1154/PNG/512/1486564400-account_81513.png"  alt="">
            <h3 class="segui">BIENESTAR<img class="seguiimg" width="30" height="30" src="../imagenes/Imagen7.png" alt=""></h3>

            <div class="cerrar">
                <a href="../php/salir.php">CERRAR SESIÓN</a>
            </div>

            <div class="segun">
                <img height="195" src="../imagenes/verdeazulado.png" alt="">
            </div>
        </div>

        <nav class="navegacion">
            <ul class="menu">
                <li id="pazbi">
                    <a href="#" id="btn_pazysalvo"><img class="dos" width="33" height="26" src="https://www.flaticon.es/svg/static/icons/svg/2091/2091584.svg" alt="">PAZ Y SALVO</a></li>
                    <div class="cuadro" id="cuadro">
                        <form action="../php/crearPazySalvo.php" method="POST" id="frm_1">
                            <label for="documento">Documento de identidad</label>
                            <input class="input" type="number" name="documento" id="documento" placeholder="Ingrese el documento">
                            <input type="hidden" name="usuario" value="<?php echo $usario?>">
                            <input class="submit" type="submit" value="Buscar">
                        </form>
                    </div>
                <li><a href="#"><img class="tres"  width="39" height="30" src="../imagenes/Imagen6.png" alt="">APRENDIZ</a></li>
            </ul>  
        </nav>

    </header>

    <div class="contper">
            <div id="fondo" class="fondo">
                <img width="1349" height="400" src="../imagenes/bienestar.jpg" alt="">
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

    <div id="pazybi" class="pazybi">

        <div id="cerrarbi" class="cerrarbi">
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
    <script src="script/bienestar.js"></script>
</body>
</html>