<?php
    session_start();
    $usario = $_SESSION["documento"];
    if ($usario == "" || $usario == null) {
        header("location: ../index.html");
    }
        require_once('../php/connecion.php');

?>

<?php
    $sql="SELECT * FROM tip_docu";
    $query=mysqli_query($connection, $sql);
    $fila=mysqli_fetch_assoc($query);
?>

<?php
    $sql_re="SELECT * FROM alternativa";
    $query_re=mysqli_query($connection, $sql_re);
    $fila_re=mysqli_fetch_assoc($query_re);
?>

<?php
    $sql_empresa="SELECT * FROM empresa";
    $query_empresa=mysqli_query($connection, $sql_empresa);
    $fila_empresa=mysqli_fetch_assoc($query_empresa);
?>

<?php

    $sql_ciudad="SELECT * FROM municipios,departamento WHERE departamento.departamento_id=municipios.departamento_id";
    $query_ciudad = mysqli_query($connection, $sql_ciudad);
    $fila_ciudad = mysqli_fetch_assoc($query_ciudad);
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <link rel="shortcut icon" href="../imagenes/usuario.jpg" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
            </ul>
        </nav>

    </header>

    <div class="fondo">
        <!--campo del fondo donde dice seguimiento *en el header*-->
    </div>

    <div class="naranja">
        <img class="perfil" src="../imagenes/PERFIL.jpg" alt="">
    </div>
    <div class="contenedor">
        <div class="date">

  <!----------------------------campo del fondo donde dice seguimiento *en el header*------------------------->

            <ul class="datos">
                <p class="frase">Soy una persona empendedora que mira hacia adelante y siempre intenta ser mejor cada dia</p>
                <p class="text2">NOMBRE: <?=$_SESSION["usuario"]?> <br>TELEFONO: <?=$_SESSION["telefono"]?><br>E-Mail:
                    <?=$_SESSION["correo"]?></p>
            </ul>

            <a href="#" class="button">EDITAR</a>

        </div>
    </div>

    <div class="tresbtn">

        <a href="#" class="button21"> <img class="butuno" alt="" srcset=""> LEGALIZACIÓN</a>
        <a href="#" class="button21"> <img class="butuno" alt="" srcset="">CERTIFICACIÓN</a>
        <a href="#" class="button21"> <img class="butuno" alt="" srcset="">APRENDICES</a>
    </div>


    <!--FORMULARIOS-->
    <div id="formularioDocu" class="formularioDocu">
        <div class="formLegalizar">
            <!--todo el formulario-->

            <div class="buscardor">
                <h3 class="subTitulo1">BUSCAR DOCUMENTO</h3>
                <form method="POST" id="buscarDocu" class="buscarDocu" autocomplete="off">
                    <!--todo el formulario-->
                    <input class="inputB" type="number" id="documento">
                    <div class="botones12" id="boton" title="consultar">
                        <a href="#" class="hola" ><img class="boton" src="../imagenes/Imagen3.png" height="50px" width="50px"></a>
                    </div>
                </form>
            </div>
            <div class="informa">
                <div id="informa">

                    <!--</div>-->
                </div>

               <div class="botones">
                    <input class="botonForm" type="button" value="Cerrar" id="btnCerraDocu">
                    <input class="botonForm" type="button" value="Registar Empresa" id="btnEmpresa">
                    <input class="botonForm" type="button" value="Legalizar" id="btnLegalizar">
                </div>
            </div>
        </div>
            <!-------------------------------------DIVISION DE FORMULARIO------------------------------------------->
        <div class="registroEmpre" id="registroEmpreS">
            <form method="POST" id="registroEmpre" name="registroEmpre" autocomplete="off">

 
                <h1 class="tituloForm">FORMULARIO DE REGISTRO EMPRESA</h1>

                <label class="label" for="">*Razón Social Empresa: </label>
                <input class="inputR" type="text" name="socialEm">

                <label class="label" for="">*Nit: </label>
                <input class="inputR" type="number" name="nit">

                <label class="label" for="">*Nombre De La Empresa: </label>
                <input class="inputR" type="text" name="nomEmpre">

                <label class="label" for="">*Dirección: </label>
                <input class="inputR" type="text" name="direccion">

                <label class="label" for="">*Teléfono: </label>
                <input class="inputR" type="number" name="telefono">

                <label class="label" for="">*E-mail: </label>
                <input class="inputR" type="email" name="email"><br>
                <label class="label"><b>*Ciudad:</b> </label>
                <p></p>
                <select class="inputR" name="id_ciu" id="id_ciu">
                    <?php
                        foreach($query_ciudad as $tip_ciudad):?>
                    <option value="<?php echo $tip_ciudad['id'] ?> ">
                        <?php echo $tip_ciudad['nombre'] ?>---<?php echo $tip_ciudad['nom_depa'] ?></option>
                    <?php
                        endforeach; 
                        ?>
                </select>
                <div class="agrego"></div>
                <div class="botones">

                    <button class="botonForm" id="botonEM">Guardar</button>
                    <input class="botonForm" type="button" value="CERRAR" id="cerrarEmpresa">

                </div>
            </form>
        </div>


        <form action="../php/registrolegi.php" method="POST" autocomplete="off">                   
            <div class="registroLegal">
                <h1 class="tituloForm">REGISTRO LEGALIZACIÓN</h1>
                <label class="label" for="">*Seleccione el tipo de alternativa:</label>
                <select class="seleccionTipo" id="tipoAlte" name="seleccionTipo">
                    <option value=""></option>
                    <?php
                            foreach($query_re as $alternativa):?>
                    <option value="<?php echo $alternativa['nom_alternativa'] ?>">
                        <?php echo $alternativa['nom_alternativa'] ?></option>
                    <?php
                            endforeach; 
                            ?>
                </select><br>
                <label class="label" for="">Empresa</label>
                <select class="seleccionTipo" name="empresa" id="">
                    <option value=""></option>
                    <?php
                            foreach($query_empresa as $empresa):?>
                    <option value="<?php echo $empresa['nit_empresa'] ?> "><?php echo $empresa['nit_empresa'] ?> -- <?php echo $empresa['nom_empre'] ?></option>
                    <?php
                            endforeach; 
                            ?>
                </select><br>
                <label class="label" for="">Nombre del jefe inmediato</label><br>
                <input class="seleccionTipo" type="text" name="jefe" id=""><br>
                <label class="label" for="">Cargo del jefe inmediato</label><br>
                <input class="seleccionTipo" type="text" name="cargoJefe" id=""><br>
                <div id="estudiante">
                    <input type="hidden" name="docuEstudiante" value="">
                </div>

                <div class="cargaDocu" id="cargaDocu">

                </div>

                <div class="botones">
                    <input class="botonForm" type="submit" value="GUARDAR">
                    <input class="botonForm" type="button" value="CANCELAR">
                </div>
            </div>
        </form>
    </div>


    <div class="formCertificar">
        <div class="informa2">
            <div class="buscador2">
                <h3 class="subTitulo2">BUSCAR DOCUMENTO</h3>
                <form method="POST" id="buscarDocu" name="buscarDocu" class="buscarDocu" autocomplete="off">
                    <input class="inputE" type="number">
                    <div class="boton2">
                        <a href="" id="boton2"><img class="boton2" src="../imagenes/Imagen3.png" height="50px"
                                width="50px"></a>
                    </div>
                </form>
            </div>
        </div>
        <div class="datosMostrar2">
            <h3 class="subTitulo">*DATOS APRENDIZ</h3>
            <div class="datosApre2">
                <div class="dato2">
                    <label class="label2" for="">NOMBRE: </label>
                    <label class="inputC" for=""></label>
                </div>
                <div class="dato2">
                    <label class="label2" for="">TELEFONO: </label>
                    <label class="inputC" for=""></label>
                </div>
                <div class="dato2">
                    <label class="label2" for="">E-MAIL: </label>
                    <label class="inputC" for=""></label>
                </div>
                <div class="dato2">
                    <label class="label2" for="">IDENTIFICACIÓN: </label>
                    <label class="inputC" for=""></label>
                </div>


                <div class="dato2">
                    <label class="labelE" for="">ESTADO E.P: </label>
                    <label class="inputC" for=""></label>
                </div>

            </div><br>


            <h3 class="subTitulo">*DATOS LEGALIZACIÓN</h3>
            <div class="datosForma2">
                <div class="dato">
                    <label class="label2" for="">TIPO DE ALTERNATIVA: </label>
                    <label for="">$bd</label>
                </div>
                <!--CODIGO PARA VER DOCUEMENTOS CARGADOS -->
                <br>
            </div>
        </div>

        <div class="cargaArchi">
            <form method="POST" id="cargaArchi" name="cargaArchi" autocomplete="off">
                <h1 class="tituloForm">REGISTRO DE CERTIFICACIÓN</h1>
                <Label class="label"><input type="checkbox" name="" id="">|COMPETANCIAS ETAPA LECTIVA Y PRODUCTIVA AL
                    DIA</Label>

                <h3 class="subTitulo">*CARGA DE DOCUMENTOS</h3>

                <Label class="label">1) Compromiso de Certificación:</Label>
                <input class="archivo" type="file" name="file">

                <Label class="label">2) Constancia Laboral:</Label>
                <input class="archivo" type="file" name="file">

                <Label class="label">3) Formato de Seguimiento:</Label>
                <input class="archivo" type="file" name="file">

                <Label class="label">4) Formato Prueba Saber Pro:</Label>
                <input class="archivo" type="file" name="file">

                <Label class="label">5) Formato Paz y Salvo:</Label>
                <input class="archivo" type="file" name="file">

                <Label class="label">6) Formato APE (Agencia Publica de Empleo):</Label>
                <input class="archivo" type="file" name="file">

                <Label class="label">7) Documento de Identidad al 150%:</Label>
                <input class="archivo" type="file" name="file">

                <div class="botones2">

                    <input class="botonForm2" type="button" value="GUARDAR">
                    <input class="botonForm2" type="button" value="CERRAR">
                </div>

            </form>
        </div>

    </div>
    </div>

    <div id="registroAprendiz" class="registroAprendiz">


        <form id="frmajax" method="POST">
            <label>Tipo Documento:</label>
            <p></p>
            <select name="tipdocu" id="tipdocu">
                <?php
                        foreach($query as $tip):?>
                <option value="<?php echo $tip['id_tip_docu'] ?> "><?php echo $tip['nom_docu'] ?></option>
                <?php
                        endforeach; 
                        ?>
            </select>

            <p></p>
            <label>Documento</label>
            <p></p>
            <input type="number" name="docu" id="docu">
            <p></p>
            <label>Nombres Completos:</label>
            <p></p>
            <input type="text" name="nom" id="nom">
            <p></p>
            <label>Apellidos Completos:</label>
            <p></p>
            <input type="text" name="ape" id="ape">
            <p></p>
            <label>Email Aprendiz:</label>
            <p></p>
            <input type="email" name="email" id="email" require>
            <p></p>
            <label>Ciudad:</label>
            <p></p>
            <select class="select" name="id_apren" id="id_ciu">
                    <?php
                        foreach($query_ciudad as $tip_ciudad):?>
                    <option value="<?php echo $tip_ciudad['id'] ?> ">
                        <?php echo $tip_ciudad['nombre'] ?>---<?php echo $tip_ciudad['nom_depa'] ?></option>
                    <?php
                        endforeach; 
                        ?>
                </select>
            <label>Telefono Aprendiz:</label>
            <p></p>
            <input type="number" name="tel" id="tel">
            <p></p>

            <button id="btnguardar">Guardar</button>
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

    <script src="segui.js"></script>












    <script src="validacionF.js"></script>
    
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
                if (a == 1) {
                    alert('Se agrego correctamente');
                    
                } else {
                    alert('Error al grabar');
                }

            }
        });
        return false;
    });
});
</script>
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
                    $('.agrego').html('<p style="color:white;font-size:20px;text-align: center; background-color:#238276;padding:30px 30px;">SE AGREGO CORRECTAMENTE</p>')
                    return
                    exit()
                    
                } else {
                
                   $('.agrego').html('<p style="color:white;font-size:20px;text-align: center; background-color:#fc7323;padding:30px 30px;">Verifica que los datos esten ingresados correctamente </p>')
                      return
                      exit()
                  
                }

            }
        });
        return false;
    });

});
</script>