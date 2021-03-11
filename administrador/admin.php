<?php
    session_start();
    $usario = $_SESSION["documento"];
    if ($usario == "" || $usario == null) {
        header("location: ../index.html");
    }



?>

<?php
require_once ("../php/connecion.php");
$connection = new mysqli("localhost","root","","ep_proyecto");
$sql = "SELECT * from tip_usu";
$info = mysqli_query($connection,$sql);
$fila = mysqli_fetch_assoc($info)
?>
<?php
$sql_docu = "SELECT * from tip_docu";
$consulta = mysqli_query($connection,$sql_docu);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminis.css">
    <link rel="icon" href="../imagenes/favicon.ico">
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
        <div class="naranja" ><img class="perfil" src="../fotoPerfil/administrador/<?=$_SESSION["foto"]?>" alt=""></div>
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

        <div class="container">
        
        <div class="formu">
            <form class="formm" action="../php/registro.php" method="POST" id="form" enctype="multipart/form-data">
                <h1>REGISTRO DE USUARIOS</h1>
                <div class="conten">
                    <div class="fila">
                        <label for="user">Documento</label>
                        <input type="text" id="usu" name="doc" placeholder="Ingrese su usuario o Documento" required autocomplete="off">
                        <label for="nombre">Nombre completo</label>
                        <input type="text" id="nom" name="nom" placeholder="Ingrese su nombre completo" required autocomplete="off">
                        <label for="apellido">Apellido completo</label>
                        <input type="text" id="ape" name="ape" placeholder="Ingrese su apellido completo" required autocomplete="off">
                        <label for="direccion">Correo</label>
                        <input type="email" id="corr" name="correo" placeholder="Ingrese su Correo" required autocomplete="off">
                        <label for="tipo_docu">Tipo de Documento</label>
                        <select name="tipDocu">
                            <option>Elege una opcion</option>
                            <?php
                            foreach ($consulta as $docu){
                                ?><option value="<?=$docu['id_tip_docu']?>"><?=$docu['nom_docu']?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                        <div class="fila2">
                            <label for="telefono">Teléfono</label>
                            <input type="text" id="tel" name="telefono" placeholder="Ingrese su Teléfono" required autocomplete="off">
                            <label for="clave">Clave</label>
                            <input type="password" id="contra" name="clave" placeholder="Ingrese su Contraseña" required autocomplete="off">
                            <label for="imagen1">foto</label>
                            <input type="file" name="imagen1" class="btnsubir" accept="image/*" />
                            <label>Tipo de Usuario</label>
                            <select name="tipousu">
                                <option>......</option>
                                <?php
                                foreach ($info as $dato){
                                   ?><option value="<?php echo $dato['id_tip_usu']?>"><?php echo $dato['nom_tip_usu']?></option>
                                <?php
                                }
                                ?>

                            </select>
                        </div>
                </div>
                <input type="submit" name="enviar" id="env" value="Registrar">

                <a href="../index.php" class="regreso">Regresar</a>

            </form>
        </div>
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