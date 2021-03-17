<?php
session_start();
$usario = $_SESSION["documento"];
if ($usario == "" || $usario == null) {
    header("location: ../index.html");
}
require_once('../php/connecion.php');

?>
<?php
require '../php/connecion.php';
$sql_ciudad = "SELECT * FROM tipo_evidencias";
$query_ciudad = mysqli_query($connection, $sql_ciudad);
$fila_ciudad = mysqli_fetch_assoc($query_ciudad);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="instructor.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="icon" href="../imagenes/favicon.ico">


    <title>INSTRUCTOR</title>
</head>

<body>
    <header class="princi">

        <div class="logo">

            <img class="imagen" height="90" width="90" src="../imagenes/Imagen2.png" alt="">
            <h3 class="segui">INSTRUCTOR<img class="seguiimg" width="30" height="30" src="../imagenes/Imagen7.png" alt=""></h3>

            <div class="cerrar">
                <a href="../php/salir.php">CERRAR SESIÓN</a>
            </div>

            <div class="segun">
                <img height="220" src="../imagenes/naranja.png" alt="">
            </div>
        </div>

        <nav class="navegacion">
            <ul class="menu">
                <li><a href="#" id="seguimi"><img class="dos" width="33" height="26" src="../imagenes/Imagen8.png" alt="">CALIFICACION DE ACTIVIDADES</a></li>
                <li ><a href="#" id="calificaa"><img class="tres" width="39" height="30" src="../imagenes/Imagen6.png" alt="">SEGUIMIENTO DE EVIDENCIAS</a></li>
            </ul>
        </nav>

    </header>


    <div id="fondo" class="fondo">

    </div>

    <div class="naranja">
        <img class="perfil" src="../fotoPerfil/instructor/<?=$_SESSION["foto"]?>" alt="">
    </div>

    <div id="date" class="contenedor">
        <div class="date">


            <ul class="datos">
                <p class="frase"></p>
                <p class="text2">NOMBRE: <?= $_SESSION["usuario"] ?> <br><br>
                TELEFONO:<?= $_SESSION["telefono"] ?><br><br>
                E-Mail:<?= $_SESSION["correo"] ?></p>
            </ul>

            <a href="#" class="button">EDITAR</a>

        </div>
    </div>

    <div class="opcion">

        <a href="#" class="button3"> <img class="butdos" height="26" width="33" src="../imagenes/Imagen8.png" alt="" srcset=""> EVIDENCIAS</a>
        <a href="#" class="button3"> <img class="buttres" height="30" width="55" src="../imagenes/Imagen6.png" alt="" srcset="">APRENDICES</a>
        <a href="#" class="button3"> <img height="26" width="33" src="https://www.flaticon.es/svg/static/icons/svg/2091/2091584.svg" alt="" srcset="">PAZ Y SALVO</a>


    </div>

    <div id="infor" class="seguimiento">
        <div class="sali">
            <a href="#" id="salirr"><img class="salir" src="../imagenes/cancelar.png" alt=""></a>
        </div>

        <div class="informa2">
            <div class="buscador2">
                <h3 class="subTitulo2">BUSCAR DOCUMENTO</h3>
                <div class="buscarDocu">
                    <form method="POST" id="buscarDocu" autocomplete="off">
                        <input type="number" name="aprendiza" placeholder="Numero De Documento" id="documento">
                        <div class="boton">
                            <a href="#" id="boton"><img class="boton" src="../imagenes/Imagen3.png" height="50px" width="50px"></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--datos del aprendiz -->
        <div class="informa">
            <form action="evide.php" method="POST" class="regica" id="intento">
                <div class="aprendiz" id="hidden">
                </div>
                
                <input type="hidden" name="docuinst" value="<?php echo ($_SESSION['documento']) ?>">
                <input class="inisegui" id="btnsegui" type="submit" value="INICIAR SEGUIMIENTO">
                <input class="calificar" id="calificar" type="submit" value="CALIFICACION">
            </form>

            <div id="informa">
                <!--</div>-->
            </div>
            <div class="tipoEvidencia" id="tipoEvidencia">
                <form id="fomutievi" class="fomutievi" name="fomutievi">
                    <div class="aprendiz" id="hidden" >
                    
                    </div>
                    <label  for="">SELECCIONE EL TIPO DE EVIDENCIA QUE DESEA CALIFICAR:</label><br>
                    <select class="inputR" name="tip_evi" id="tip_evi">
                        <?php
                        foreach ($query_ciudad as $tipo_evidencia) : ?>
                            <option value="<?php echo $tipo_evidencia['id_tip_eviden'] ?> ">
                                <?php echo $tipo_evidencia['nom_tip_eviden'] ?></option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                    <button id="inicio">Seleccionar</button><br><br>
                    <button id="salir2" class="salir2">Cancelar</button>
                </form>

               
                    <form method="POST" id="fore">

                        <div class="aprendiz" id="hidden">
                            
                        </div>
                        <div class="che" id="che">
                        </div>
                        <input type="hidden" name="docuinst" value="<?php echo ($_SESSION['documento']) ?>">

                    </form>
                
            </div>
        </div>
    </div>

    <div id="cali" class="cali">
        <div class="sali">
            <a href="#" id="salirrr"><img class="salir" src="../imagenes/cancelar.png" alt=""></a>
        </div>
        <div class="informa3">
            <div class="buscador3">
                <h3 class="subTitulo3">BUSCAR DOCUMENTO</h3>
                <div class="buscarDocu3">
                    <form method="POST" id="buscarDocu3" autocomplete="off">
                        <input type="number" name="aprendiza" placeholder="Numero De Documento" id="documento3">
                        <input type="hidden" name="docuinst" value="<?php echo ($_SESSION['documento']) ?>">
                        <div class="boton3">
                            <a href="#" id="boton3"><img class="boton3" src="../imagenes/Imagen3.png" height="50px" width="50px"></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        
            <div id="informa3" class="repre">
                    <h6>Seguimiento de entrega de evidencias de los aprendices</h6>
            </div>
       
       
    </div>
    

    <footer class="pie">
        <img height="70px" width="70px" src="../imagenes/logo blanco.jpg" alt="">

        <div class="info">
            <p>&copy; Servicio Nacional de Aprendizaje SENA </p>
            <p>Centro de Industria y Construccion- Ibague-Tolima </p>

            <p> Direccion: 141- Sector, Cra. 45 Sur #1255</p>
        </div>
    </footer>

    <script src="app.js"></script>
    <script src="archi.js"></script>
</body>

</html>