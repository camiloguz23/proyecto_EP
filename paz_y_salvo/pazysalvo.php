<?php

require_once("../php/connecion.php");
session_start();

if(isset($_POST)){

    $documento = $_SESSION['docAprendiz'];
    $usuario = $_SESSION["documento"];

    //Consultar el estado del aprendiz
    $sql = "SELECT * FROM aprendices INNER JOIN detalle_formacion ON aprendices.id_aprend = detalle_formacion.id_aprend AND detalle_formacion.id_aprend = '$documento'";
    $query=mysqli_query($connection,$sql);
    $fila = mysqli_fetch_assoc($query);

    //Si el usuario existe carga el formulario
    if (!empty($fila) && $fila['id_estado'] == 4) {
        //Se traen los datos del aprendiz
        $consultaAprendiz = "SELECT aprendices.nombre_aprend, aprendices.apellido_aprend, region.nom_region, aprendices.correo_aprend, pro_formacion.nom_formacion, nivel_formacion.nom_nivel, ficha_programa.num_ficha, tip_docu.nom_docu, aprendices.id_aprend, aprendices.lugar_expedicion, aprendices.fecha_expedicion_docu, aprendices.direccion, aprendices.num_celular, aprendices.telefono_aprend, cen_formacion.nom_cen_forma FROM aprendices, detalle_formacion, ficha_programa, tip_docu, estado_aprendiz, pro_formacion, nivel_formacion, cen_formacion, region WHERE detalle_formacion.id_aprend = aprendices.id_aprend AND detalle_formacion.num_ficha = ficha_programa.num_ficha AND aprendices.id_tip_docu = tip_docu.id_tip_docu AND detalle_formacion.num_ficha = ficha_programa.num_ficha AND detalle_formacion.id_aprend = aprendices.id_aprend AND detalle_formacion.id_estado = estado_aprendiz.id_estado AND ficha_programa.id_formacion = pro_formacion.id_formacion AND ficha_programa.id_nivel = nivel_formacion.id_nivel AND ficha_programa.id_cen_forma = cen_formacion.id_cen_forma AND cen_formacion.id_region = region.id_region AND aprendices.id_aprend = '$documento'";
        $queryAprendiz = mysqli_query($connection,$consultaAprendiz);
        $datosAprendiz = mysqli_fetch_assoc($queryAprendiz);

        $_SESSION['nombre_aprend'] = $datosAprendiz['nombre_aprend'];
        $_SESSION['apellido_aprend'] = $datosAprendiz['apellido_aprend'];
        $_SESSION['nom_region'] = $datosAprendiz['nom_region'];
        $_SESSION['correo_aprend'] = $datosAprendiz['correo_aprend'];
        $_SESSION['nom_formacion'] = $datosAprendiz['nom_formacion'];
        $_SESSION['nom_nivel'] = $datosAprendiz['nom_nivel'];
        $_SESSION['num_ficha'] = $datosAprendiz['num_ficha'];
        $_SESSION['nom_docu'] = $datosAprendiz['nom_docu'];
        $_SESSION['id_aprend'] = $datosAprendiz['id_aprend'];
        $_SESSION['lugar_expedicion'] = $datosAprendiz['lugar_expedicion'];
        $_SESSION['fecha_expedicion_docu'] = $datosAprendiz['fecha_expedicion_docu'];
        $_SESSION['direccion'] = $datosAprendiz['direccion'];
        $_SESSION['num_celular'] = $datosAprendiz['num_celular'];
        $_SESSION['telefono_aprend'] = $datosAprendiz['telefono_aprend'];
        $_SESSION['nom_cen_forma'] = $datosAprendiz['nom_cen_forma'];

        //Consultar el paz y salvo del aprendiz para obtener el id del mismo
        $consultaPazysalvo = "SELECT * FROM paz_y_salvo WHERE id_aprend = '$documento'";
        $queryPazysalvo = mysqli_query($connection, $consultaPazysalvo);
        $pazysalvo = mysqli_fetch_assoc($queryPazysalvo);

        $id_pazysalvo = $pazysalvo['id_pazysalvo']; 

        //Si el usuario aún no tiene el detalle de paz y salvo, se crea automaticamente
        $consultaDetaPazysalvo = "SELECT * FROM detalle_pazysalvo WHERE id_pazysalvo = '$id_pazysalvo' AND documento = '$usuario'";
        $queryDetaPazysalvo = mysqli_query($connection, $consultaDetaPazysalvo);
        $detallePazysalvo = mysqli_fetch_assoc($queryDetaPazysalvo);
        if(empty($detallePazysalvo)) {
           $crearDetapazysalvo = "INSERT INTO detalle_pazysalvo (id_det_pazysalvo, documento, firma, id_pazysalvo) VALUES ('', '$usuario', NULL, '$id_pazysalvo')";
           $querycrearDeta = mysqli_query($connection, $crearDetapazysalvo);
        }
        
        $_SESSION['fecha_diligenciamiento'] = $pazysalvo['fecha_diligenciamiento']; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paz y Salvo</title>
    <link rel="stylesheet" href="style/pazysalvo.css">
</head>
<body>
    <div class="contenedor">
        <div class="contenedor_header">
            <div class="header_logo">
                <img src="../imagenes/sigasena.jpg" alt="" width="250">
            </div>
            <div class="header_titulo">
                <h3>SERVICIO NACIONAL DE APRENDIZAJE SENA</h3>
                <h3>PROCEDIMIENTO CERTIFICACIÓN ACADÉMICA</h3>
                <h3>FORMATO PAZ Y SALVO ACADÉMICO ADMINISTRATIVO</h3>
            </div>
        </div>
        <div class="paz_datos">
            <div class="datos_paz">
               <div>
                    <div>
                        <p>LUGAR:</p></div>
                    <div>
                        <p>FECHA DILIGENCIAMIENTO:</p>
                    </div>
                    <div>
                        <p>CENTRO DE FORMACION:</p>
                    </div>
                    <div>
                        <p>REGIONAL:</p>
                    </div>
               </div>
                <div class="datos_paz-lineas">
                    <div>
                        <p><?php echo $_SESSION['nom_region']?></p>
                    </div>
                    <div>
                        <p><?php echo $_SESSION['fecha_diligenciamiento']?></p>
                    </div>
                    <div>
                        <p><?php echo $_SESSION['nom_cen_forma']?></p>
                    </div>
                    <div>
                        <p><?php echo $_SESSION['nom_region']?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="paz_datos-usuario">
            <div class="datos_usuario-header">
                <h5>DATOS BÁSICOS DEL APRENDIZ</h5>
            </div>
            <div class="contenedor-columnas">
                <div class="datos_usuario-columna1">
                    <div>
                        <p>NOMBRES:</p>
                        <p><?php echo $_SESSION['nombre_aprend']?></p>
                    </div>
                    <div>
                        <P>APELLIDOS</P>
                        <p><p><?php echo $_SESSION['apellido_aprend']?></p></p>
                    </div>
                    <div>
                        <P>CORREO ELECTRONICO </P>
                        <p><?php echo $_SESSION['correo_aprend']?></p>
                    </div>
                    <div>
                        <P>PROGRAMA DE FORMACION </P>
                        <p><?php echo $_SESSION['nom_formacion']?></p>
                    </div>
                    <div>
                        <P>NIVEL DE FORMACIÓN</P>
                        <p><?php echo $_SESSION['nom_nivel']?></p>
                    </div>
                    <div>
                        <P>NÚMERO DE FICHA </P>
                        <p><?php echo $_SESSION['num_ficha']?></p>
                    </div>
                </div>
                <div class="datos_usuario-columna2">
                    <div>
                        <P>TIPO DOCUMENTO DE IDENTIDAD</P>
                        <p><?php echo $_SESSION['nom_docu']?></p>
                    </div>
                    <div>
                        <P>NUMERO DOCUMENTO DE IDENTIDAD</P>
                        <p><?php echo $_SESSION['id_aprend']?></p>
                    </div>
                    <div>
                        <P>FECHA Y LUGAR DE EXPEDICIÓN</P>
                        <p><?php echo $_SESSION['fecha_expedicion_docu']?>, <?php echo $_SESSION['lugar_expedicion']?></p>
                    </div>
                    <div>
                        <P>DIRECCIÓN DE DOMICILIO</P>
                        <p><?php echo $_SESSION['direccion']?></p>
                    </div>
                    <div>
                        <P>TELEFONO FIJO DE CONTACTO</P>
                        <p><?php echo $_SESSION['telefono_aprend']?></p>
                    </div>
                    <div>
                        <P>NÚMERO CELULAR</P>
                        <p><?php echo $_SESSION['num_celular']?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="paz_responables">

        <table class="tabla_responsables">
            <tr>
                <th>FUNCIONARIOS QUE INTERVIENEN EN EL DILIGENCIAMIENTO</th>
                <th>Marcar con X</th>
                <th>DESCRIPCION DEL TRAMITE</th>
                <th>NOMBRES Y APELLIDOS COMPLETOS</th>
                <th>FIRMA</th>
                <th>ACCCIONES</th>
            </tr>
    <?php
        $consulta = "SELECT  detalle_pazysalvo.id_det_pazysalvo, tip_usu.nom_tip_usu, usuario.nombre, usuario.apellido, detalle_pazysalvo.firma
        FROM usuario, detalle_pazysalvo, paz_y_salvo, tip_usu
        WHERE usuario.id_tip_usu = tip_usu.id_tip_usu
        AND detalle_pazysalvo.id_pazysalvo = paz_y_salvo.id_pazysalvo
        AND detalle_pazysalvo.documento = usuario.documento
        AND detalle_pazysalvo.id_pazysalvo = '$id_pazysalvo'";
        $queryConsulta = mysqli_query($connection, $consulta);
        $resulConsulta = mysqli_num_rows($queryConsulta);

        if($resulConsulta > 0) {
            while ($data = mysqli_fetch_array($queryConsulta)) {
                $idFirma = str_replace(' ', '', $data['nom_tip_usu']);
    ?>
        <tr>
            <td><?php echo $data['nom_tip_usu']?></td>
            <td>X</td>
            <td>----------</td>
            <td><?php echo $data['nombre']?> <?php echo $data['apellido']?></td>
            <td><img src="<?php echo $data['firma']?>" alt="" width="125">
            </td>
            <td>
                <a href="editar_usuario.php?id=<?php echo $data['id_det_pazysalvo']?>&&usuario=<?php echo $usuario?>&&documento=<?php echo $documento?>" class="btn_firma1" id="<?php echo $idFirma;?>">Firmar</a>
            </td>
        </tr>
    <?php
            }
        }
    ?> 
        </table>
        </div>
        <div class="paz_firma-aprendiz">
            <div class="texto_aprendiz">
                <p>He actualizado y verificado mis datos básicos* en el aplicativo de gestión académico administrativo institucional SOFIA Plus</p>
                <p>y acepto que se registren en los documentos académicos que debe expedir la institución. </p>
            </div>
            <div class="firma_aprendiz">
                <div class="linea_firma">
                    Firma del Aprendiz
                </div>
            </div>
        </div>
        <div class="contenedor_footer">
            <p>* Tipo y número de documento de identidad vigente, fecha y lugar de expedición, nombres y apellidos, correo electrónico, nivel y modalidad del programa de formación realizado. En caso</p>
            <p>de no estar de acuerdo por favor manifestar la inconsistencia para su corrección con el encargado de administración educativa, utilizando el espacio de observaciones.</p>
            <p>** Estos espacios son de diligenciamiento obligatorio por el centro de formación, los que aparecen en blanco son para cubrir las exigencias adicionales del centro de formación .</p>
            <p class="espacio_observacion"><b>OBSERVACIONES</b></p>
            <div class="observacion"></div>
            <div class="observacion"></div>
            <div class="observacion"></div>
        </div>
    </div>
    <div class="boton_regresar">
        <?php
                if( $_SESSION['id_tip_usu'] == 4) {
        ?>
                    <a class="btn_regresar" href="../APE/ape.php"><img src="" alt=""> Regresar a APE</a>
        <?php
                }
        ?>

        <?php
                if( $_SESSION['id_tip_usu'] == 5) {
        ?>
                    <a class="btn_regresar" href="../bienestar/biene.php">Regresar a Bienestar</a>
        <?php
                }
        ?>

        <?php
                if( $_SESSION['id_tip_usu'] == 6) {
        ?>
                    <a class="btn_regresar" href="../cor_academico/cordinh.php">Regresar a Coordinador Academico</a>
        <?php
                }
        ?>

        <?php
                if( $_SESSION['id_tip_usu'] == 7) {
        ?>
                    <a class="btn_regresar" href="../biblioteca/biblio.php">Regresar a Biblioteca</a>
        <?php
                }
        ?>
    </div>
<script>
    const id_tip_usu = "<?php echo $_SESSION['id_tip_usu'];?>"
    const btn_ape = document.getElementById("Agenciapublicadeempleo");
    const btn_biblioteca = document.getElementById("Biblioteca");
    const btn_coordinador = document.getElementById("CoordinadorAcademico");
    const btn_bienestar = document.getElementById("Bienestar");
    
    switch(id_tip_usu) {
        case "4": 
            btn_biblioteca.style.visibility = "hidden";
            btn_coordinador.style.visibility = "hidden";
            btn_ape.style.visibility = "visible";
            btn_bienestar.style.visibility = "hidden";
            break;
        case "5": 
            btn_biblioteca.style.visibility = "hidden";
            btn_coordinador.style.visibility = "hidden";
            btn_ape.style.visibility = "hidden";
            btn_bienestar.style.visibility = "visible";
            break;
        case "6": 
            btn_biblioteca.style.visibility = "hidden";
            btn_coordinador.style.visibility = "visible";
            btn_ape.style.visibility = "hidden";
            btn_bienestar.style.visibility = "hidden";
            break;
        case "7": 
            btn_biblioteca.style.visibility = "visible";
            btn_coordinador.style.visibility = "hidden";
            btn_ape.style.visibility = "hidden";
            btn_bienestar.style.visibility = "hidden";
            break;
    }
</script>

</body>

</html>

<?php
    } else {

        switch($_SESSION['id_tip_usu']) {
            case 4: 
                echo'<script type="text/javascript">
                        alert("El aprendiz digitado no existe, o no se encuentra en estado Por Certificar");
                        window.location.href="../APE/ape.php";
                    </script>';
                break;
            case 5: 
                echo'<script type="text/javascript">
                        alert("El aprendiz digitado no existe, o no se encuentra en estado Por Certificar");
                        window.location.href="../bienestar/biene.php";
                    </script>';
                break;
            case 6: 
                echo'<script type="text/javascript">
                        alert("El aprendiz digitado no existe, o no se encuentra en estado Por Certificar");
                        window.location.href="../cor_academico/cordinh.php";
                    </script>';
                break;
            case 7: 
                echo'<script type="text/javascript">
                        alert("El aprendiz digitado no existe, o no se encuentra en estado Por Certificar");
                        window.location.href="../biblioteca/biblio.php";
                    </script>';
                break;
        }

    }
?>

<?php
    } 
?>