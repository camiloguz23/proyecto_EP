<?php
session_start();
$usuario = $_SESSION['documento-aprend'];
$foto =$_SESSION['foto'];


if ($usuario == "" || $usuario == null ){
    header("location: ../index.php");
}
require_once('../php/connecion.php');
?>
<?php
    $sql_empresa = "SELECT * FROM empresa";
    $query_empresa = mysqli_query($connection, $sql_empresa);
    $fila_empresa = mysqli_fetch_assoc($query_empresa);
?>
<?php
    $sql_re = "SELECT * FROM alternativa";
    $query_re = mysqli_query($connection, $sql_re);
    $fila_re = mysqli_fetch_assoc($query_re);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_info.css">
    <link rel="stylesheet" href="css/style_legal.css">
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
                <li><a href="#" id="datos"><img class="dos" width="33" height="26" src="../imagenes/Imagen8.png" alt="">Información Adicional</a></li>
                <li ><a href="#" id="calificaa"><img class="tres" width="39" height="30" src="../imagenes/Imagen6.png" alt="">Descarga de Documentos</a></li>
                <li><a href="#" id="datos2"><img class="cuatro" width="33" height="26" src="../imagenes/Imagen8.png" alt="">Carga de Documentos</a></li>
            </ul>
        </nav>


        
    </header>
    

    <div id="fondo" class="fondo">

    </div>

    <div class="naranja">
        <?php 
        $sql_foto = "SELECT * FROM aprendices WHERE $usuario";
        $query_foto = mysqli_query($connection, $sql_foto);
        $fila_foto = mysqli_fetch_assoc($query_foto);

        if($fila_foto){
            $_SESSION['foto'] = $fila_foto['foto'];
            // $documento = $_SESSION['documento'];

            if( $_SESSION['foto'] == null ){
                echo '<form method="post" enctype="multipart/form-data" class="form_2" id="form_2">
                <h3 class="titulo">Seleccionar foto</h3>
                <input type="file" name="file" class="boton_personalizado">
                <p class="center"><input id="btn_subirfirma" type="submit" value="Subir Archivo" class="boton_personalizado"></p>
                </form>';
                if(isset($_FILES['file'])) {
                    $directorio = "../fotoPerfil/aprendices";
                    
                    if (!file_exists($directorio)) {
                        mkdir($directorio, 0777, true);
                    }
                
                    $directorio = $directorio . "/";
                
                    $archivo = $directorio . basename($_FILES["file"]["name"]); // uploads/carta.pdf
                    $nombreArchivo = $_FILES["file"]["name"];
                    $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
                    $tamañoArchivo = $_FILES["file"]["size"];
                
                    if($tipoArchivo == "png" || $tipoArchivo == "jpg" || $tipoArchivo == "jpeg") {
                        if ($tamañoArchivo <= 209715200) {
                
                            if(move_uploaded_file($_FILES["file"]["tmp_name"], $archivo)){
                                
                                $sql = "UPDATE aprendices SET foto = '$nombreArchivo' WHERE id_aprend = '$usuario'";
                                $consultarSql = mysqli_query($connection,$sql);
                
                                if( $consultarSql ){
                                    echo'<script type="text/javascript">
                                        alert("Se ha agregado correctamente la foto");
                                        
                                    </script>';
                                }
                            } else {
                                echo "<script>alert('Ha ocurrido un error al subir el archivo')</script>";
                            }
                
                        } else {
                            echo "<script>alert('El peso del archivo es superior a 200MB')</script>";
                        }   
                    } else {
                        echo "<script>alert('El tipo de archivo subido no es admitido, solo se admite imágenes (jpg, png, jpeg)')</script>";
                    }
                }
            }else{
                echo "<img class='perfil' src='../fotoPerfil/aprendices/./$fila_foto[foto]' alt='foto de perfil'>";
            }  
        } 
        ?>
    </div>

    <div id="date" class="contenedor">
        <div class="date">


             <ul class="datos">
                <p class="text2">NOMBRE: <?= $_SESSION['nombre-aprendiz'] ?> <br><br>
                TELEFONO:<?= $_SESSION['telefono-aprend'] ?><br><br>
                E-Mail:<?= $_SESSION['correo-aprendiz'] ?></p>
            </ul>

            <a href="#"  id="aparecerE" class="button">EDITAR</a>

        </div>
    </div>

    <div class="opcion">

        <a href="carta.php" class="button3"> <img class="butdos" height="26" width="33" src="../imagenes/Imagen8.png" alt="" srcset=""> Imprimir carta de Autorizacion</a>
        <a href="cargar_carta.php" class="button3"> <img class="buttres" height="30" width="55" src="../imagenes/Imagen6.png" alt="" srcset="">Cargar carta de Autorizacion</a>
        <a href="#" class="button3"> <img height="26" width="33" src="https://www.flaticon.es/svg/static/icons/svg/2091/2091584.svg" alt="" srcset="">#</a>


    </div>
    <!-- informacion Adicional del aprendiz -->
    <div id="infor" class="seguimiento">
        <div class="sali">
            <a href="#" id="salirr"><img class="salir" src="../imagenes/cancelar.png" alt=""></a>
        </div> 
       <h1>Información Academica</h1> 
       <?php
            require_once("../php/connecion.php");

            $consulta = "SELECT aprendices.nombre_aprend, aprendices.num_celular,aprendices.apellido_aprend,cen_formacion.nom_cen_forma,aprendices.telefono_aprend, aprendices.correo_aprend,region.nom_region,pro_formacion.nom_formacion,ficha_programa.num_ficha,aprendices.id_aprend,estado_aprendiz.nom_estado, jornada.nom_jornada, nivel_formacion.nom_nivel,aprendices.foto FROM aprendices,cen_formacion,region,ficha_programa,pro_formacion,estado_aprendiz,jornada,nivel_formacion, detalle_formacion WHERE detalle_formacion.id_aprend = '$usuario' and aprendices.id_aprend=detalle_formacion.id_aprend and ficha_programa.id_cen_forma=cen_formacion.id_cen_forma and cen_formacion.id_region=region.id_region AND ficha_programa.id_formacion=pro_formacion.id_formacion AND detalle_formacion.id_estado=estado_aprendiz.id_estado AND ficha_programa.id_jornada=jornada.id_jornada and ficha_programa.id_nivel=nivel_formacion.id_nivel and ficha_programa.num_ficha=detalle_formacion.num_ficha";

            $sql = mysqli_query($connection,$consulta);
            $dato = mysqli_fetch_assoc($sql);


            if ($dato) {    
                    echo ('
                    <div class="td">
                    <div class="datosMostrar" id="datosgen">
                                <div class="datosApre">
                                <div class="datosApre2">
                                <h3 class="subTitulo">DATOS APRENDIZ</h3>
                                
                            <div class="dato1">
                                <img class="perfil" src="'.$dato["foto"].'" alt="" width="100px">
                            </div>
                            <div class="dato">
                                <label class ="label" for="">NOMBRE: </label>
                                <!-- NO BORRAR LAS CLASES -->
                                <label class ="datos" for="">'.$dato["nombre_aprend"].' '.$dato["apellido_aprend"].'</label>
                            </div>
                            <div class="dato">
                                <label class ="label" for="">IDENTIFICACIÓN: </label>
                                <label class ="datos" for="">'.$dato["id_aprend"].'</label>
                            </div>
                            <div class="dato">
                                <label class ="label" for="">N°CELULAR: </label>
                                <label class ="datos" for="">'.$dato["telefono_aprend"].'</label>
                            </div>
                            <div class="dato">
                                <label class ="label" for="">E-MAIL: </label>
                                <label class ="datos" for="">'.$dato["correo_aprend"].'</label>
                            </div> 
                            <div class="dato">
                                <label class ="label" for="">TELEFONO FIJO: </label>
                                <label class ="datos" for="">'.$dato["num_celular"].'</label>
                            </div> 
                            <div class="dato">
                                <label class ="label" for="">ESTADO: </label>
                                <label class ="datos" for="" id="estadoAprend">'.$dato["nom_estado"].'</label>
                            </div>
                                    
                                </div>
                                </div>
                                <div class="datosApre1">
                                <h3 class="subTitulo">DATOS DE FORMACIÓN</h3>
                                
                                <div class="dato">
                                <label class ="label" for="">REGIONAL: </label>
                                <label class ="datos" for="">'.$dato["nom_region"].'</label>
                            </div>

                            <div class="dato">
                                <label class ="label" for="">NO.FICHA: </label>
                                <label class ="datos" for="">'.$dato["num_ficha"].'</label>
                            </div>

                            <div class="dato">
                                <label class ="label" for="">CENTRO DE FORMACIÓN: </label>
                                <label class ="datos" for="">'.$dato["nom_cen_forma"].'</label>
                            </div>

                            <div class="dato">
                                <label class ="label" for="">PROGRAMA DE FORMACIÓN: </label>
                                <label class ="datos" for="">'.$dato["nom_formacion"].'</label>
                            </div>

                            <div class="dato">
                                <label class ="label" for="">JORNADA: </label>
                                <label class ="datos" for="" >'.$dato["nom_jornada"].'</label>
                            </div>

                            <div class="dato">
                                <label class ="label" for="">NIVEL DE FORMACIÓN: </label>
                                <label class ="datos" for="">'.$dato["nom_nivel"].'</label>
                            </div>
                                </div>
                                
                            </div>
                        
                    '
                );
                $consul="SELECT * FROM calificacion INNER JOIN evidencias on calificacion.id_evidencias=evidencias.id_evidencias  INNER JOIN estado_evi on calificacion.id_esta_evi=estado_evi.id_esta_evi INNER JOIN usuario on calificacion.id_doc_instru=usuario.documento WHERE calificacion.id_aprend = '$usuario' AND calificacion.id_esta_evi=2 ORDER BY evidencias.id_evidencias ASC";
                $query = mysqli_query($connection, $consul);
                        echo ('
                        <div class="tabla">
                        <h4>EVIDENCIAS DEL APRENDIZ</h4><br>
                            <table border="2">
                            <tr>
                                <td>DOCUMENTO APRENDIZ</td>
                                <td>EVIDENCIAS CALIFICADAS</td>
                                <td>ESTADO</td>
                                <td>INSTRUCTOR A CARGO</td>
                                <td>FECHA CALIFICACION</td>
                            </tr>'
                        );
                        while($mostrar=mysqli_fetch_array($query)){
                            echo ('        
                            <tr>
                                <td>'.$mostrar["id_aprend"].'</td>
                                <td>'.$mostrar["nom_evidencias"].'</td>
                                <td>'.$mostrar["nom"].'</td>
                                <td>'.$mostrar["nombre"].''.$mostrar["apellido"].'</td>
                                <td>'.$mostrar["fecha_cali"].'</td>
                            
                    ');
                }
                        echo (' 
                        </tr>
                        </table>
                        <br>
                        </div>
                        </div>
                        ');
                
                

            }else{
                echo("<h2>fallo</h2>");
            };

            ?>
    </div>
    <!-- descarga de documentos -->
    <div class="documentos1" id="documentos1">
    <div class="sali">
            <a href="#" id="salirrr"><img class="salir" src="../imagenes/cancelar.png" alt=""></a>
        </div>
        <h1>DOCUMENTOS PARA DESCARGAR</h1>
        <div class="fomutievi2">
         <label  for="">SELECCIONE EL TIPO DE EVIDENCIA QUE DESEA CALIFICAR:</label><br>
            <form id="fomutievi" class="fomutievi" name="fomutievi">
                <select class="seleccionTipo" id="tipoAlternativa" name="tipoAlte">
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
            </form>    
            <div class="documentos" id="documentos">   
            </div> 
            <br> 
        </div>
    </div>

    <div class="documentos2" id="documentos2">
   
    <form action="legalizacion.php" method="POST" autocomplete="off" enctype="multipart/form-data" id="legalForm">
            <div class="registroLegal" id="registroLegal">
                <h1 class="tituloForm">REGISTRO LEGALIZACIÓN</h1>
                <label class="label1" for="">*Seleccione el tipo de alternativa:</label><br>
                <select class="seleccionTipo" id="tipoAl" name="seleccionTipo">
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
                <label class="label1" for="">Empresa</label><br>
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
                

                <label class="label1" for="">Nombre del jefe inmediato</label><br>
                <input class="seleccionTipo" type="text" name="jefe" id="nombre_jefe" maxlength="40" style="text-transform:uppercase"><br>

                <p class="p-nombre-jefe" id="p-nombre-jefe"><i class="fas fa-exclamation"></i> Ingrese solo Letras min 5 y max 30 </p>

                <label class="label1" for="">Cargo del jefe inmediato</label><br>
                <input class="seleccionTipo" type="text" name="cargoJefe" id="cargoJefe" maxlength="35" style="text-transform:uppercase"><br>
                <p class="p-cargo-jefe" id="p-cargo-jefe"><i class="fas fa-exclamation"></i> Ingrese solo Letras min 5 y max 30</p>

                <label class="label1" for="">Fecha de inicio de la etapa productiva</label><br>
                <input class="seleccionTipo" type="date" name="fecha" id="">
                
                <div class="cargaDocu" id="cargaDocu">
                    <label class="label1" for="">*Recuerde cargar todos los archivos en formato PDF</label><br>
                </div>

                <div class="botones">
                    <input class="botonForm" type="submit" value="GUARDAR" id="boton523">
                    <button class="botonForm" id="btn_cerrarLegal">CERRAR</button>
                </div>
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

    <script src="js/archivo.js"></script>
    <script src="js/legalizar.js"></script>
    <script src="js/formu.js"></script>
    <script src="js/cargar.js"></script>
</body>

</html>