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
    <link rel="stylesheet" href="style_info.css">
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
                <li ><a href="documentos.php" id="calificaa"><img class="tres" width="39" height="30" src="../imagenes/Imagen6.png" alt="">Documentos</a></li>
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
                <p class="text2">NOMBRE: <?= $_SESSION['nombre-aprendiz'] ?> <br><br>
                TELEFONO:<?= $_SESSION['telefono-aprend'] ?><br><br>
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
                                <img class="perfil" src="../fotoPerfil/aprendices/'.$dato["foto"].'" alt="" width="100px">
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
    

    <footer class="pie">
        <img height="70px" width="70px" src="../imagenes/logo blanco.jpg" alt="">

        <div class="info">
            <p>&copy; Servicio Nacional de Aprendizaje SENA </p>
            <p>Centro de Industria y Construccion- Ibague-Tolima </p>

            <p> Direccion: 141- Sector, Cra. 45 Sur #1255</p>
        </div>
    </footer>

    <script src="archivo.js"></script>
</body>

</html>