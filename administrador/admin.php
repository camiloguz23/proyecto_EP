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
<!--****** TABLA DE TIPO DE DOCUMENTO  ***********-->
<?php
$sql_docu = "SELECT * from tip_docu";
$consulta = mysqli_query($connection,$sql_docu);

?>
<?php
$sql_tip_docu = "SELECT * from tip_docu";
$consulta_tip_docu = mysqli_query($connection,$sql_tip_docu)
?>
<!-- ************** TABLA DE LAS CIUDADES ***************-->
<?php
$sql_ciudad = "SELECT id,nombre from municipios";
$consulta_ciudad = mysqli_query($connection,$sql_ciudad)
?>
<!-- ************** TABLA DE FICHA DE FORMACION ****************** -->
<?php
$sql_ficha = "SELECT num_ficha, pro_formacion.nom_formacion FROM ficha_programa, pro_formacion WHERE ficha_programa.id_formacion = pro_formacion.id_formacion";
$consulta_ficha = mysqli_query($connection,$sql_ficha)
?>
<!-- ******************* TABLA DE CENTRO DE FORMACION ***************-->
<?php
$sql_centro_formacion = "SELECT * from cen_formacion";
$consulta_centro_formacion = mysqli_query($connection,$sql_centro_formacion)
?>
<!-- ************ NIVEL DE FORMACION *************************-->
<?php
$sql_nivel_formacion = "SELECT * from nivel_formacion";
$consulta_nivel_formacion = mysqli_query($connection,$sql_nivel_formacion)
?>
<!-- ****************** TABLA DE JORNADA  **************************** -->
<?php
$sql_jornada = "SELECT * from jornada";
$consulta_jornada = mysqli_query($connection,$sql_jornada)
?>
<!-- ******************** TABLA DE FORMACION ********************************** -->
<?php
$sql_formacion = "SELECT * from pro_formacion";
$consulta_formacion = mysqli_query($connection,$sql_formacion)
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
                    <li><a href="#" id="create"><img class="dos" width="26" height="30" src="../imagenes/Imagen5.png" alt="">CREAR APRENDIZ</a></li>
                    <li><a href="#" id="link_menu"><img class="tres"  width="37" height="30" src="../imagenes/Imagen6.png" alt="">FORMULARIO</a></li>
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
            <a href="#" class="button3" id="create"> <img class="butdos" height="30" width="30" src="../imagenes/Imagen5.png" alt="" srcset="">CREAR APRENDIZ</a>
            <a href="#" class="button4"> <img class="buttres" height="30" width="55" src="../imagenes/Imagen6.png" alt="" srcset="">-------</a>
        </div>

    </div>

        <!--creacion de usuarios-->
    <div id="creausu" class="creausu">

        <div id="cerrar" class="cerrar">
            <img src="../imagenes/cancelar.png" alt="">
        </div>

        <div class="container">
<!--    *******************************   FORMULARIO DE CREAR USUARIOS  *******************************************    -->
        <div class="formu">
            <form class="formm" action="../php/registro.php" method="POST" id="form" enctype="multipart/form-data">
                <h1>REGISTRO DE USUARIOS</h1>
                <div class="conten">
                    <div class="fila">
                        <label for="user">Documento</label>
                        <input type="text" id="usu" name="doc" placeholder="Ingrese su usuario o Documento" required pattern="[0-9] {6-12}" autocomplete="off">
                        <label for="nombre">Nombre completo</label>
                        <input type="text" id="nom" name="nom" placeholder="Ingrese su nombre completo" required autocomplete="off">
                        <label for="apellido">Apellido completo</label>
                        <input type="text" id="ape" name="ape" placeholder="Ingrese su apellido completo" required autocomplete="off">
                        <label for="direccion">Correo</label>
                        <input type="email" id="corr" name="correo" placeholder="Ingrese su Correo" required autocomplete="off">
                        <label for="tipo_docu">Tipo de Documento</label>
                        <select name="tipDocu" required>
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
                <button type="submit">Registrar</button>

                <button type="reset">Borrar datos</button>

            </form>
        </div>
    </div>

        </div>
    <!-- ***************************************  FORMUALRIO DE CREAR APRENDIZ ************************************ -->
            <div id="conteaprendiz">
                <form method="POST" action="" enctype="multipart/form-data" id="aprendizform">
                    <fieldset>
                        <legend>datos del aprendiz</legend>
                        <label>Documento</label><br>
                        <input type="number" name="docu" pattern="[0-9] {7-12}" title="minimo 7 digitos"><br>
                        <label>Tipo de documento</label><br>
                        <select name="tipdocu" required>
                            <option>Elige una opcion</option>
                            <?php
                            foreach ($consulta_tip_docu as $tip_docu){
                                ?><option value="<?=$tip_docu['id_tip_docu']?>"><?=$tip_docu['nom_docu']?></option>
                            <?php
                            }
                            ?>

                        </select><br>
                        <label>Nombre del aprendiz</label><br>
                        <input type="text" name="nom" required pattern="[a-z] {4-30}" title="•Solo letras de la A - Z, • minimo 4 caracteres y maximo 30"><br>
                        <label>Apellido del aprendiz</label><br>
                        <input type="text" required name="ape" pattern="[a-z] {4-30}" title="•Solo letras de la A - Z, • minimo 4 caracteres y maximo 30"><br>
                        <label>Correo del aprendiz</label><br>
                        <input type="email" name="email" required><br>
                        <label>Telefono del aprendiz</label><br>
                        <input type="tel" pattern="[0-9]{7}" title="•maximo 11 numeros\n •Solo numeros" name="tel" required><br>
                        <button type="reset">Restaurar formulario</button>

                    </fieldset>
                    <fieldset>
                        <legend>Datos del Aprendiz</legend>
                        <label>Direccion del aprendiz</label><br>
                        <input type="text" name="direccion"><br>
                        <labe>Numero de celular del aprendiz</labe><br>
                        <input type="tel" pattern="[0-9] {10}" title="•Debe tener 11 digitos, • solo numeros" name="celular" ><br>
                        <label>Fecha de expedicion</label><br>
                        <input type="date" name="fechaexp"><br>
                        <label>Lugar de expedicion</label><br>
                        <select name="lugarexp">
                            <option>Sleccione la ciudad</option>
                            <?php
                            foreach ($consulta_ciudad as $ciudad){
                                ?><option value="<?=$ciudad['nombre']?>"><?=$ciudad['nombre']?></option>
                            <?php
                            }
                            ?>
                        </select><br>
                        <label>Ingresar una foto</label><br>
                        <input type="file" name="foto" accept="multipart/form-data"><br>
                        <label>Ficha de formacion</label><br>
                        <select name="ficha">
                            <option>Elegir ficha de formacion</option>
                            <?php
                            foreach ($consulta_ficha as $ficha){
                                ?><option value="<?=$ficha['num_ficha']?>"><?=$ficha['num_ficha'] ?> <?=$ficha['nom_formacion']?></option>
                            <?php
                            }
                            ?>
                        </select><br>
                        <button type="submit" id="btn_enviar">Enviar</button>
                        <button type="button" id="btn_cerrra">Cerrar</button>
                    </fieldset>
                </form>
            </div>

            <div class="menu_create" id="menu_form">
                <p id="link_formacion">Crear formacion</p>
                <p id="link_ficha">Crear ficha</p>
                <p id="link_empresa">crear empresa</p>
            </div>
<!--        *****************************      FORMULARIO DE FORMACION  ******************************       -->

            <div class="formu-formacion" id="formu_formacion">
                <form method="POST" id="formulario_formacion">
                    <label>Nombre de la formacion</label><br>
                    <input name="nom_formacion" type="text" required><br>
                    <button type="button" id="btn_uno">Enviar</button>
                    <button type="button" id="btn_dos">Cerrar</button>
                </form>
            </div>
<!--        ******************** FORMULARIO DE FICHA DE FORMACION ****************************     -->
        <div class="conte_ficha" id="conte_ficha">
            <h4>Formulario de crear ficha de formacion</h4>
            <form id="formulario_ficha" method="POST" autocomplete="off">
                <label>Numero de ficha</label><br>
                <input type="number" name="numf"><br>
                <label>Jornada</label><br>
                <select name="jornadaF">
                    <option>Eligue una opcion</option>
                    <?php
                    foreach ($consulta_jornada as $jornada){
                        ?><option value="<?=$jornada['id_jornada']?>"><?=$jornada['nom_jornada']?></option>
                    <?php
                    }
                    ?>
                </select><br>
                <label>Nivel de formacion</label><br>
                <select name="NivelFormacion">
                    <option>Eligue una opcion</option>
                    <?php
                    foreach ($consulta_nivel_formacion as $nivel){
                        ?><option value="<?=$nivel['id_nivel']?>"><?=$nivel['nom_nivel']?></option>
                    <?php
                    }
                    ?>
                </select><br>
                <label>Nombre de formacion</label><br>
                <select name="programaformacion">
                    <option>Eligue una opcion</option>
                    <?php
                    foreach ($consulta_formacion as $formacion){
                        ?><option value="<?=$formacion['id_formacion']?>"><?=$formacion['nom_formacion']?></option>
                    <?php
                    }
                    ?>
                </select><br>
                <label>Centro de formacion</label><br>
                <select name="centroFormacion" >
                    <option>Eliegue una opcion</option>
                    <?php
                    foreach ($consulta_centro_formacion as $centro){
                        ?><option value="<?=$centro['id_cen_forma']?>"><?=$centro['nom_cen_forma']?></option>
                    <?php
                    }
                    ?>
                </select><br>
                <label>Fecha de inicio de Etapa Productiva</label><br>
                <input type="date" name="fechaiF"><br>
                <label>Fecha terminacion de la Etapa Productiva</label><br>
                <input type="date" name="fechaF"><br>
                <button type="button" id="enviar_ficha">Enviar</button>
                <button type="button" id="cerrar_ficha">Cerrar</button>
            </form>

        </div>
<!--      *********************** TABLA DE EMPRESA **********************************      -->
        <div class="conte_empresa" id="conte_empresa">
            <h4>Formulario crear empresa</h4>
            <form method="POST" id="formualario_empresa" autocomplete="off" action="../php/empresa.php">
                <label>Nit de la empresa</label><br>
                <input type="number" required pattern="[0-9] {10-12}" title="·Solo numero, · minimo 10digitos" name="nit" maxlength="12"  minlength="10"><br>
                <label>Razon social de la empresa</label><br>
                <input type="text" required name="razon_social"><br>
                <label>Nombre de la empresa</label><br>-
                <input type="text" name="nom_empresa" required><br>
                <label>Direccion de la empresa</label><br>
                <input type="text" required name="dire_empresa"><br>
                <label>Telefono de la empresa</label><br>
                <input type="number" name="tel_empresa" pattern="[0-9] {7-10}" title="·No corresponde a un numero telefono ni celular" required maxlength="10" minlength="6"><br>
                <label>Correo de la empresa</label><br>
                <input type="email" required name="correo"><br>
                <select name="ciu_empresa">
                    <?php
                    foreach ($consulta_ciudad as $ciu_empre){
                        ?><option value="<?=$ciu_empre['id']?>"><?=$ciu_empre['nombre']?></option>
                    <?php
                    }
                    ?>
                </select><br>
                <button type="submit">Enviar</button>
                <button type="button" id="btn_cerrar_empresa">Cerrar</button>



            </form>
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