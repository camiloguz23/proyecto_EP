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
                <li><a href="#" id="seguimi"><img class="dos" width="33" height="26" src="../imagenes/Imagen8.png" alt="">SEGUIMIENTO DE EVIDENCIAS</a></li>
                <li id="aprediz"><a href="#"><img class="tres" width="39" height="30" src="../imagenes/Imagen6.png" alt="">APRENDIZ</a></li>
            </ul>
        </nav>

    </header>

    <div class="contper">
        <div id="fondo" class="fondo">
            <img width="1349" height="400" src="../imagenes/INSTRUCTOR.png" alt="">
        </div>
        <div class="naranja"><img class="perfil" src="../imagenes/PERFIL.jpg" alt=""></div>

        <div class="contenedor">
            <div class="date">
                <ul class="datos">
                    <p>Soy una persona empendedora que mira hacia adelante y simepre intenta ser mejor cada dia</p>
                    <p class="text2">NOMBRE: <?= $_SESSION["usuario"] ?> </p>
                    <p class="text2"> TELEFONO: <?= $_SESSION["telefono"] ?></p>
                    <p class="text2">EMAIL: <?= $_SESSION["correo"] ?></p>
                </ul>
            </div>
            <div class="edicion">
                <a href="#" class="button">EDITAR</a>
            </div>
        </div>

        <div class="opcion">
            <a href="#" class="button3"> <img class="butdos" height="26" width="33" src="../imagenes/Imagen8.png" alt="" srcset="">SEGUIMIENTO DE EVIDENCIAS</a>
            <a href="#" class="button4"> <img class="buttres" height="30" width="55" src="../imagenes/Imagen6.png" alt="" srcset="">APRENDICES</a>
        </div>
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
        <div class="evide">
            <form id="fomutievi">
                    <select class="inputR" name="tip_evi" id="tip_evi">
                            <?php
                                foreach($query_ciudad as $tipo_evidencia):?>
                            <option value="<?php echo $tipo_evidencia['id_tip_eviden'] ?> ">
                                <?php echo $tipo_evidencia['nom_tip_eviden'] ?></option>
                            <?php
                                endforeach; 
                                ?>
                    </select>
                <input  type="submit" name="inicio" id="inicio" value="seleccionar">
            </form>
        <div id="fore">

        </div>
        </div>
        

        <script src="archi.js"></script>
        <!--datos del aprendiz -->
        <div class="informa">
            <div id="informa">
                <!--</div>-->
            </div>
         
        </div>
    </div>
    <input type="hidden" id="docinstru" value="<?php echo ($_SESSION['documento']) ?>">
    <footer class="pie">
        <img height="70px" width="70px" src="../imagenes/logo blanco.jpg" alt="">

        <div class="info">
            <p>&copy; Servicio Nacional de Aprendizaje SENA </p>
            <p>Centro de Industria y Construccion- Ibague-Tolima </p>

            <p> Direccion: 141- Sector, Cra. 45 Sur #1255</p>
        </div>
    </footer>
    <script src="app.js"></script>

</body>

</html>