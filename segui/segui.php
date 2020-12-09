<?php
session_start();
$usario = $_SESSION["documento"];
if ($usario == "" || $usario == null) {
    header("location: ../index.html");
}
require_once('../php/connecion.php');

?>

<?php
    $sql = "SELECT * FROM tip_docu";
    $query = mysqli_query($connection, $sql);
    $fila = mysqli_fetch_assoc($query);
?>

<?php
    $sql_ficha = "SELECT * FROM ficha_programa";
    $query_ficha = mysqli_query($connection, $sql_ficha);
    $fila_ficha = mysqli_fetch_assoc($query_ficha);
?>

<?php
    $sql_re = "SELECT * FROM alternativa";
    $query_re = mysqli_query($connection, $sql_re);
    $fila_re = mysqli_fetch_assoc($query_re);
?>

<?php
    $sql_empresa = "SELECT * FROM empresa";
    $query_empresa = mysqli_query($connection, $sql_empresa);
    $fila_empresa = mysqli_fetch_assoc($query_empresa);
?>

<?php
    $sql_ciudad = "SELECT * FROM municipios,departamento WHERE departamento.departamento_id=municipios.departamento_id";
    $query_ciudad = mysqli_query($connection, $sql_ciudad);
    $fila_ciudad = mysqli_fetch_assoc($query_ciudad);
?>
<?php
    $sql_jornada = "SELECT * FROM jornada";
    $query_jornada = mysqli_query($connection, $sql_jornada);
    $fila_jornada = mysqli_fetch_assoc($query_jornada);
?>
<?php
    $sql_formacion = "SELECT * FROM nivel_formacion";
    $query_formacion = mysqli_query($connection, $sql_formacion);
    $fila_formacion = mysqli_fetch_assoc($query_formacion);
?>
<?php
    $sql_Centro_formacion = "SELECT * FROM cen_formacion";
    $query_Centro_formacion = mysqli_query($connection, $sql_Centro_formacion);
    $fila_Centro_formacion = mysqli_fetch_assoc($query_Centro_formacion);
?>
<?php
    $sql_pro_formacion = "SELECT * FROM pro_formacion";
    $query_pro_formacion = mysqli_query($connection, $sql_pro_formacion);
    $fila_pro_formacion = mysqli_fetch_assoc($query_pro_formacion);
?>
<?php

if (isset($_POST['btn_actualizar'])) {

    $doc = $_POST['documentoA'];
    $correo = $_POST['correoA'];
    $telefono = $_POST['telefonoA'];
    $clave = $_POST['claveA'];

    if ($doc == "" || $correo == "" || $telefono == "" || $clave == "") {

        echo "<script> alert('los campos son obligatorios')</script>";

        echo '<script> window.location="segui.php" </script>';
    } else {
        $existe = 0;
        $resultado = mysqli_query($connection, "SELECT * FROM usuario WHERE documento = '$doc'");
        while ($consulta = mysqli_fetch_array($resultado)) {
            $existe++;
        }
        if ($existe == 0) {

            echo "<script> alert('El documento no existe')</script>";
            echo '<script> window.location="segui.php" </script>';
        } else {
            $actualizar = "UPDATE usuario SET correo = '$correo',telefono = '$telefono',clave = '$clave' WHERE documento = '$doc'";
            mysqli_query($connection, $actualizar);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <link rel="shortcut icon" href="../imagenes/usuario.jpg" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="icon" href="../imagenes/favicon.ico">
    <title>Seguimiento</title>
</head>


<body>

    <header class="princi">

        <div class="logo">

            <img class="imagen" height="90" width="90" src="../imagenes/Imagen1.png" alt="">
            <h3 class="segui">SEGUIMIENTO <img class="seguiimg" width="30" height="30" src="../imagenes/Imagen4.png"
                    alt=""></h3>



            <ul class="cerrar">
                <li><a href="../php/salir.php">CERRAR SESIÓN</a></li>
            </ul>
            <div class="segun">
                <img height="220" src="../imagenes/verdeazulado.png" alt="">
            </div>
        </div>

        <nav class="navegacion">
            <ul class="menu">
                <li><a href="#" id="legal"><img class="uno" width="30" height="30" src="../imagenes/Imagen9.png"
                            alt="">LEGALIZACIÓN </a></li>
                <li><a href="#" id="dos"><img class="dos" width="26" height="30" src="../imagenes/Imagen5.png"
                            alt="">CERTIFICACIÓN</a></li>
                <li id="tres"><a href="#"><img class="tres" width="37" height="30" src="../imagenes/Imagen6.png"
                            alt="">APRENDIZ</a></li>
                <li id="btn_pazysalvo"><a href="#"><img class="cuatro" width="37" height="30"
                            src="https://www.flaticon.es/svg/static/icons/svg/2091/2091584.svg" alt="">PAZ Y SALVO</a>
                </li>
                <div class="cuadro" id="cuadro">
                    <form action="../php/crearPazySalvo.php" method="POST" id="frm_1">
                        <label for="documento">Documento de identidad</label>
                        <input class="input" type="number" name="documento" id="documento"
                            placeholder="Ingrese el documento del aprendiz">
                        <input type="hidden" name="usuario" value="<?php echo $usario?>">
                        <input class="submit" type="submit" value="Buscar">
                    </form>
                </div>
            </ul>
        </nav>

    </header>

    <div class="fondo">
        <!--campo del fondo donde dice seguimiento *en el header*-->
    </div>

    <div class="naranja">
        <img class="perfil" src="../fotoPerfil/seguimiento/<?=$_SESSION["foto"]?>" alt="">
    </div>
    <div class="contenedor">
        <div class="date">

            <!----------------------------campo del fondo donde dice seguimiento *en el header*------------------------->

            <ul class="datos">
                <p class="frase">Soy una persona empendedora que mira hacia adelante y siempre intenta ser mejor cada
                    dia</p>
                <p class="text2">NOMBRE: <?= $_SESSION["usuario"] ?> <br>TELEFONO:
                    <?= $_SESSION["telefono"] ?><br>E-Mail:
                    <?= $_SESSION["correo"] ?></p>
            </ul>

            <a href="#" id="aparecerE" class="button">EDITAR</a>

        </div>
    </div>

    <div class="tresbtn">

        <a href="#" class="button21"> <img class="butuno" alt="" srcset=""> LEGALIZACIÓN</a>
        <a href="#" class="button21"> <img class="butuno" alt="" srcset="">CERTIFICACIÓN</a>
        <a href="#" class="button21"> <img class="butuno" alt="" srcset="">APRENDICES</a>
    </div>

    <div class="formularioActualizar" id="formularito">
        <form id="formularito" method="post" action="segui.php">
            <h1 class="tituloForActu">FORMULARIO ACTUALIZAR</h1>

            <label class="label" for="">*correo </label><br>
            <input class="inputR" type="email" name="correoA" maxlength="30" style="text-transform:uppercase">

            <label class="label" for="">*Telefono</label><br>
            <input class="inputR" type="number" name="telefonoA" maxlength="11" minlength="9"
                style="text-transform:uppercase">

            <label class="label" for="">*Clave</label><br>
            <input class="inputR" type="text" name="claveA" maxlength="10" minlength="4"
                style="text-transform:uppercase">

            <label class="label" for="">*Ingrese su documento</label><br>
            <input class="inputR" type="number" name="documentoA" maxlength="11" minlength="7"
                style="text-transform:uppercase">
            <button class="inputR alv" type="submit" name="btn_actualizar">Actualizar</button>
            <button class="inputR alv" id="botonEditar">Cancelar</button>

        </form>
    </div>

    <!--FORMULARIOS-->
    <div id="formularioDocu" class="formularioDocu">
        <div class="formLegalizar" id="formLegalizar">
            <!--todo el formulario-->

            <div class="buscardor">
                <form method="POST" id="buscarDocu" class="buscarDocu" autocomplete="off">
                    <h3 class="subTitulo1">BUSCAR DOCUMENTO</h3>
                    <!--todo el formulario-->
                    <input class="inputB" type="number" id="documentole">
                    <div class="botones12" id="boton" title="consultar">
                        <a href="#" class="hola" id=""><img class="boton" src="../imagenes/Imagen3.png" height="50px"
                                width="50px"></a>
                    </div>
                </form>
            </div>
            <div class="informa">
                <div class="informacion" id="informa">


                </div>

                <div class="botones">


                    <input class="botonForm" type="button" value="Registar Empresa" id="btnEmpresa">
                    <input class="botonForm" type="button" value="Legalizar" id="btnLegalizar">
                    <input class="botonForm" type="button" value="Cerrar" id="btnCerraDocu">
                    <form action="" id="formuPDF">
                        <input class="botonForm" type="button" value="Documentos" id="DocuPDF">
                        <div id="hidden"></div>
                    </form>
                </div>
            </div>
            <div id="contePDF">
                <div id="readPDF"></div>
                <button id="cerrarPDF">cerrar</button>
            </div>

        </div>
        <!-------------------------------------DIVISION DE FORMULARIO------------------------------------------->
        <div class="registroEmpre" id="registroEmpreS">
            <input class="botonDeCerrar" type="button" value="X" id="cerrarEmpresa"
                style="margin-left: 100%;width: 70px;height: 62px;border-radius: 50%;border: 1px solid navajowhite;font-size:25px;color:white;background: #238276;cursor: pointer">
            <form method="POST" id="registroEmpre" autocomplete="off">

                <h1 class="tituloForm">FORMULARIO DE REGISTRO EMPRESA</h1>

                <label class="label" for="">*Razón Social Empresa: </label><br>
                <input class="inputR" type="text" name="socialEm" id="socialEm" maxlength="30"
                    style="text-transform:uppercase">
                <p class="inputR_p" id="inputR_p"><i class="fas fa-exclamation"></i> Ingrese solo letras y maximo 30
                    caracteres</p>

                <label class="label" for="">*Nit: </label><br>

                <input class="inputR" type="number" name="nit" id="nit" max="20" style="text-transform:uppercase">
                <p class="inputR_p-n" id="inputR_p-n"><i class="fas fa-exclamation"></i> Numeros maximo 12 </p>


                <label class="label" for="">*Nombre De La Empresa: </label><br>
                <input class="inputR" type="text" name="nomEmpre" id="nomEmpre" maxlength="25"
                    style="text-transform:uppercase">
                <p class="inputR_p-nom" id="inputR_p-nom"><i class="fas fa-exclamation"></i> Ingrese solo letras y
                    maximo 25 caracteres</p>

                <label class="label" for="">*Dirección: </label><br>
                <input class="inputR" type="text" name="direccion" id="direccion" maxlength="30"
                    style="text-transform:uppercase">
                <p class="inputR_p-d" id="inputR_p-d"><i class="fas fa-exclamation"></i> Eso no es una dirrecion solo
                    use numeros,letras y guion</p>

                <label class="label" for="">*Teléfono: </label><br>
                <input class="inputR" type="text" name="telefono" id="telefono">
                <p class="inputR_t" id="inputR_p_t"><i class="fas fa-exclamation"></i> Ingrese numero de 10 caracteres
                </p>

                <label class="label" for="">*E-mail: </label><br>
                <input class="inputR" type="email" name="email" id="email" maxlength="30">
                <p class="inputR_p-c" id="inputR_p-c"><i class="fas fa-exclamation"></i> Ingrese solo un correo valido
                </p><br>
                <label class="label"><b>*Ciudad:</b> </label><br>
                <p></p>
                <select class="inputR" name="id_ciu" id="id_ciu">
                    <script src="validacionformulario.js"></script>
                    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
                    <option value="">Elije una ciudad</option>
                    <?php

                    foreach ($query_ciudad as $tip_ciudad) : ?>

                    <option value="<?php echo $tip_ciudad['id'] ?> ">
                        <?php echo $tip_ciudad['nombre'] ?>---<?php echo $tip_ciudad['nom_depa'] ?></option>
                    <?php
                    endforeach;
                    ?>
                </select>
                <div class="agrego"></div>
                <div class="botones">

                    <button class="botonForm" id="botonEM" type="submit">Guardar</button>
                    <input class="botonForm" type="button" value="CERRAR" id="cerrarEmpresad">

                    <input type="reset" class="botonForm">
                </div>
            </form>
        </div>

        <form action="../php/registrolegi.php" method="POST" autocomplete="off" enctype="multipart/form-data"
            id="legalForm">


            <div class="registroLegal" id="registroLegal">
                <h1 class="tituloForm">REGISTRO LEGALIZACIÓN</h1>
                <label class="label" for="">*Seleccione el tipo de alternativa:</label><br>
                <select class="seleccionTipo" id="tipoAlte" name="seleccionTipo">
                    <option value="0">Seleccione la alternativa</option>
                    <?php
                    foreach ($query_re as $alternativa) : ?>

                    <option value="<?php echo $alternativa['id_alternativa'] ?>">
                        <?php echo $alternativa['id_alternativa'] ?>
                        <?php echo $alternativa['nom_alternativa'] ?></option>
                    <?php
                    endforeach;
                    ?>
                </select><br>
                <label class="label" for="">Empresa</label><br>
                <select class="seleccionTipo" name="empresa" id="selec_empresa">
                    <option value="0">Seleccione la empresa</option>
                    <?php
                    foreach ($query_empresa as $empresa) : ?>

                    <option value="<?php echo $empresa['nit_empresa'] ?>" require>
                        <?php echo $empresa['nom_empre'] ?></option>
                    <?php
                    endforeach;
                    ?>
                </select>
                <p class="crear" id="crear">+Crear Empresa</p>

                <label class="label" for="">Nombre del jefe inmediato</label><br>

                <input class="seleccionTipo" type="text" name="jefe" id="nombre_jefe" maxlength="40"
                    style="text-transform:uppercase"><br>
                <p class="p-nombre-jefe" id="p-nombre-jefe"><i class="fas fa-exclamation"></i> Ingrese solo Letras min 5
                    y max 30 </p>
                <label class="label" for="">Cargo del jefe inmediato</label><br>
                <input class="seleccionTipo" type="text" name="cargoJefe" id="cargoJefe" maxlength="35"
                    style="text-transform:uppercase"><br>
                <p class="p-cargo-jefe" id="p-cargo-jefe"><i class="fas fa-exclamation"></i> Ingrese solo Letras min 5 y
                    max 30</p>

                <label class="label" for="">Fecha de inicio de la etapa productiva</label><br>
                <input class="seleccionTipo" type="date" name="fecha" id="">
                <div id="estudiante">

                </div>

                <div class="cargaDocu" id="cargaDocu">
                    <label class="label" for="">*Recuerde cargar todos los archivos en formato PDF</label><br>
                </div>

                <div class="botones">
                    <input class="botonForm" type="submit" value="GUARDAR" id="boton523">
                    <button class="botonForm" id="btn_cerrarLegal">CERRAR</button>
                </div>
            </div>

        </form>
    </div>

    <div class="cargaArchi" id="formularioCertificacion">
        <h1 class="tituloForm">REGISTRO DE CERTIFICACIÓN</h1>
        <form id="cargaArchi" name="cargaArchi" autocomplete="off" enctype="multipart/form-data">

            <Label class="label"><input type="checkbox" name="chequeo" id="" value="valido">|COMPETANCIAS ETAPA LECTIVA
                Y PRODUCTIVA AL DIA</Label>

            <h3 class="subTitulo">*CARGA DE DOCUMENTOS</h3>

            <Label class="label">1) Compromiso de Certificación:</Label>
            <input class="archivo" type="file" name="CompromisoCertificacion">

            <Label class="label">2) Constancia Laboral:</Label>
            <input class="archivo" type="file" name="ConstanciaLaboral">

            <Label class="label">3) Formato de Seguimiento:</Label>
            <input class="archivo" type="file" name="formatoSeguimiento">

            <Label class="label">4) Formato Prueba Saber Pro:</Label>
            <input class="archivo" type="file" name="proSaber">

            <Label class="label">5) Formato Paz y Salvo:</Label>
            <input class="archivo" type="file" name="pazSAlvo">

            <Label class="label">6) Formato APE (Agencia Publica de Empleo):</Label>
            <input class="archivo" type="file" name="formatoAPE">

            <Label class="label">7) Documento de Identidad al 150%:</Label>
            <input class="archivo" type="file" name="cedula">
            <input type="hidden" name="usuario" value="<?= $_SESSION["documento"] ?>">
            <div id="datoAprendiz">
            </div>

            <div class="botones2">
                <input class="botonForm2" type="button" value="GUARDAR" id="btnEnviar">
                <input class="botonForm2" type="button" value="CERRAR" id="cerrarCerti">

            </div>

        </form>
    </div>

    </div>
    </div>

    <div id="registroAprendiz" class="registroAprendiz">

        <form id="frmajax" method="POST" autocomplete="off">
            <h1 class="tituloFormR">REGISTRO DE APRENDIZ</h1>

            <div class="datosR">
                <label class="labelR">Tipo Documento:</label>
                <select name="tipdocu" id="tipdocu">
                    <option value="">Seleccione el documento</option>

                    <?php
                    foreach ($query as $tip) : ?>

                    <option value="<?php echo $tip['id_tip_docu'] ?> "><?php echo $tip['nom_docu'] ?></option>
                    <?php
                    endforeach;
                    ?>
                </select>
            </div>

            <div class="datosR">
                <label class="labelR">Documento</label>
                <input type="number" name="docu" id="docu" class="grupo__aprendiz">
                <p class="parrafoAprendiz" id="parrafoAprendiz_1"><i class="fa fa-exclamation-triangle"
                        aria-hidden="true"></i> El documento debe contener de 7 a 12 números</p>
            </div>

            <div class="datosR">
                <label class="labelR">Nombres Completos:</label>
                <input type="text" name="nom" id="nom" maxlength="35" style="text-transform:uppercase">
                <p class="parrafoAprendiz" id="parrafoAprendiz_2"><i class="fa fa-exclamation-triangle"
                        aria-hidden="true"></i> El nombre puede contener espacios, no puede tener simbolos</p>
            </div>

            <div class="datosR">
                <label class="labelR">Apellidos Completos:</label>
                <input type="text" name="ape" id="ape" maxlength="35" style="text-transform:uppercase">
                <p class="parrafoAprendiz" id="parrafoAprendiz_3"><i class="fa fa-exclamation-triangle"
                        aria-hidden="true"></i> El apellido puede contener espacios, no puede tener simbolos</p>
            </div>

            <div class="datosR">
                <label class="labelR">Email Aprendiz:</label>
                <input type="email" name="email" id="email" require maxlength="40" style="text-transform:uppercase">
                <p class="parrafoAprendiz" id="parrafoAprendiz_4"><i class="fa fa-exclamation-triangle"
                        aria-hidden="true"></i> El correo solo puede contener letras, numero, puntos, guiones y guion
                    bajo</p>
            </div>

            <div class="datosR">
                <label class="labelR">Ciudad:</label>
                <select class="select" name="id_apren" id="id_ciu">
                    <option value="">Seleccione la ciudad</option>
                    <?php
                    foreach ($query_ciudad as $tip_ciudad) : ?>
                    <option value="<?php echo $tip_ciudad['id'] ?> ">
                        <?php echo $tip_ciudad['nombre'] ?>---<?php echo $tip_ciudad['nom_depa'] ?></option>
                    <?php
                    endforeach;
                    ?>
                </select>
            </div>

            <div class="datosR">
                <label class="labelR">Teléfono Fijo:</label>
                <input type="number" name="tel" id="tel">
                <p class="parrafoAprendiz" id="parrafoAprendiz_5"><i class="fa fa-exclamation-triangle"
                        aria-hidden="true"></i> El telefono solo puede contener numeros,máximo son 10 digitos</p>
            </div>

            <div class="datosR">
                <label class="labelR">Teléfono celular:</label>
                <input type="number" name="celular" id="celular">
                <p class="parrafoAprendiz" id="parrafoAprendiz_6"><i class="fa fa-exclamation-triangle"
                        aria-hidden="true"></i> El celular solo puede contener numeros,máximo son 11 digitos</p>
            </div>

            <div class="datosR">
                <label class="labelR">Dirección:</label>
                <input type="text" name="direccion" id="tel" maxlength="40" style="text-transform:uppercase">
                <p class="parrafoAprendiz" id="parrafoAprendiz_7"><i class="fa fa-exclamation-triangle"
                        aria-hidden="true"></i> La direccion puede contener letras, espacios, caracteres especiales,
                    guiones</p>
            </div>

            <div class="datosR">
                <label class="labelR">Ficha de Formación</label>
                <select class="select" name="ficha" id="id_ciu">
                    <option value="">Seleccione la ficha</option>
                    <?php
                    foreach ($query_ficha as $ficha) : ?>
                    <option value="<?php echo $ficha['num_ficha'] ?> ">
                        <?php echo $ficha['num_ficha'] ?></option>
                    <?php
                    endforeach;
                    ?>
                </select>
                <p id="btnficha">+crear ficha de formacion</p>
            </div>
            <button id="btnguardar">Guardar</button>
            <button id="btncerrarAprendiz">Cerrar</button>
        </form>

    </div>



    <!------------crear ficha--------------- -->
    <div class="crearFicha" id="fichaOcul">
        <h1 class="tituloF">CREAR FICHA DE FORMACION</h1>

        <form method="POST" id="formularioFw" autocomplete="off">
            <!-- action="../php/crearFicha.php" -->

            <div class="datosf">
                <label for="" class="labelF">*Numero de ficha</label>
                <input type="number" class="select1" name="numf">
            </div>

            <div class="datosf">
                <label class="labelF">*Jornada</label>
                <select class="select1" name="jornadaF" id="id_jor">
                    <option value="">*Seleccione la jornada</option>
                    <?php
                    foreach ($query_jornada as $jornada) : ?>
                    <option value="<?php echo $ficha['id_jornada'] ?> ">
                        <?php echo $jornada['nom_jornada'] ?></option>
                    <?php
                    endforeach;
                    ?>
                </select>
            </div>

            <div class="datosf">
                <label class="labelF">*Nivel de formacion</label>
                <select class="select1" name="NivelFormacion" id="id_niv_form">
                    <option value="">Seleccione nivel de formacion</option>
                    <?php
                    foreach ($query_formacion as $formacion) : ?>
                    <option value="<?php echo $formacion['id_nivel'] ?> ">
                        <?php echo $formacion['nom_nivel'] ?></option>
                    <?php
                    endforeach;
                    ?>
                </select>
            </div>

            <div class="datosf">
                <label class="labelF">*Centro de formacion</label>
                <select class="select1" name="centroFormacion" id="id_centro_formacion">
                    <option value="">Seleccione el centro de formacion</option>
                    <?php
                    foreach ($query_Centro_formacion as $ficha_Centro_formacion) : ?>
                    <option value="<?php echo $ficha['id_cen_forma'] ?> ">
                        <?php echo $ficha_Centro_formacion['nom_cen_forma'] ?></option>
                    <?php
                    endforeach;
                    ?>
                </select>
            </div>
            <div class="datosf">
                <label class="labelF">*Programa de formacion</label>
                <select class="select1" name="programaformacion" id="id_programa_formacion">
                    <option value="">Seleccione el programa de formacion</option>
                    <?php
                    foreach ($query_pro_formacion as $ficha_pro_formacion) : ?>
                    <option value="<?php echo $ficha_pro_formacion['id_formacion'] ?> ">
                        <?php echo $ficha_pro_formacion['nom_formacion'] ?></option>
                    <?php
                    endforeach;
                    ?>
                </select>
            </div>

            <div class="cajitFicha datosf">
                <label for="" class="labelF">*Fecha inicio etapa productiva</label>
                <input type="date" class="select1" name="fechaiF">
            </div>

            <div class="cajitFicha datosf">

                <label for="" class="labelF">*Fecha fin etapa productiva</label>
                <input type="date" class="select1" name="fechaF">
            </div>

            <div class="agregoF"></div>

            <div class="botonesF">

                <button class="btnEnviar" id="crearficha">CREAR</button>
                <button class="btnCerrar" id="cerrarF">CERRAR</button>
            </div>

        </form>

    </div>

    <footer class="pie">
        <img height="70px" width="70px" src="../imagenes/logo blanco.jpg" alt="">
        <div class="info">
            <p>&copy; Servicio Nacional de Aprendizaje SENA </p>
            <p>Centro de Industria y Construccion- Ibague-Tolima </p>

            <p> Direccion: 141- Sector, Cra. 45 Sur #1255</p>
        </div>
    </footer>

    <div id="buscadorCer">
        <h2>Ingrese documento del aprendiz</h2>
        <form action="" id="forBus">
            <input type="number" name="documento" id="docuvalicer"><br>
            <button type="submit">Consultar</button>
        </form>
        <div class="btoncerb">
            <button id="btnMostrar"> certificacion </button>
            <button id="cerrarBusCert"> Cerrar </button>
        </div>

    </div>
    <script src="segui.js"></script>
    <script src="validacionF.js"></script>
    <script src="validarAprendices.js"></script>
    <script src="validar_Rlegalizacion.js"></script>
    <script src="subpazysalvo.js"></script>

</body>

</html>

<!-------------------------------Jquery--------------------------->
<script type="text/javascript">
$(document).ready(function() {
    $('#btnguardar').click(function() {
        var datos = $('#frmajax').serialize();


        $.ajax({
            type: "POST",
            url: "../php/crear.php",
            data: datos,
            success: function(a) {
                console.log(`revison de este dato ${a}`)
                if (a == 1) {
                    alert('Se agrego correctamente');
                    setTimeout(() => {
                        document.querySelector("#frmajax").reset()

                    }, 2000);

                } else if (a == "existe") {
                    alert('Aprendiz ya existe');
                } else if (a == 3) {
                    alert('llena los campos correctamente')
                } else {
                    alert("llena los campos correctamente")
                }

            }
        });
        return false;
    });
});
</script>
<!-- --------------------------REGISTRO EMPRESA---------------------------------------->
<script type="text/javascript">
$(document).ready(function() {
    $('#botonEM').click(function() {
        var datosEmpre = $('#registroEmpre').serialize();


        $.ajax({
            type: "POST",
            url: "jqueryEnviarEmpresa.php",
            data: datosEmpre,
            success: function(b) {
                if (b == 1) {
                    console.log(b);
                    $('.agrego').html(
                        '<p id="sub_for_empresa"style="color:white;font-size:20px;text-align: center; background-color:#238276;padding:30px 30px;">SE AGREGO CORRECTAMENTE</p>'
                    )
                    setTimeout(() => {
                        document.querySelector("#registroEmpre").reset()
                        $('.agrego').html('<p></p>')
                        window.location = "segui.php"
                    }, 2000);

                    exit()


                } else {

                    $('.agrego').html(
                        '<p id="nada" style="color:white;font-size:20px;text-align: center; background-color:#fc7323;padding:30px 30px;">Verifica que los datos esten ingresados correctamente </p>'
                    )
                    setTimeout(() => {

                        $('.agrego').html('<p></p>')
                    }, 2000);

                    exit()

                }

            }
        });
        return false;
    });

});
</script>

<!-- --------------------------------- -->
<script type="text/javascript">
$(document).ready(function() {
    $('#crearficha').click(function() {
        var datosEmpres = $('#formularioFw').serialize();


        $.ajax({
            type: "POST",
            url: "../php/crearFicha.php",
            data: datosEmpres,
            success: function(h) {

                if (h == 1) {

                    $('.agregoF').html(
                        '<p id="sub_for_empresa"style="color:white;font-size:20px;text-align: center; background-color:#238276;padding:30px 30px;">SE AGREGO CORRECTAMENTE</p>'
                    )
                    setTimeout(() => {
                        document.querySelector("#formularioFw").reset()
                        $('.agregoF').html('<p></p>')
                        window.location = "segui.php"
                    }, 2000);




                } else if (h == 2) {

                    $('.agregoF').html(
                        '<p id="nada" style="color:white;font-size:20px;text-align: center; background-color:#fc7323;padding:30px 30px;">La ficha ya esta creada </p>'
                    )
                    setTimeout(() => {

                        $('.agregoF').html('<p></p>')
                    }, 2000);
                } else {

                    $('.agregoF').html(
                        '<p id="nada" style="color:white;font-size:20px;text-align: center; background-color:#fc7323;padding:30px 30px;">Verifica que los datos esten ingresados correctamente </p>'
                    )
                    setTimeout(() => {

                        $('.agregoF').html('<p></p>')
                    }, 2000);


                }

            }
        });
        return false;
    });

});
</script>