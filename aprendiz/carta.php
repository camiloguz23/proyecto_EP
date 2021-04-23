<?php
require_once('../php/connecion.php');
session_start();
$usuario = $_SESSION['documento-aprend'];
?>
<?php
    $sql_ciudad = "SELECT * FROM municipios,departamento WHERE departamento.departamento_id=municipios.departamento_id";
    $query_ciudad = mysqli_query($connection, $sql_ciudad);
    $fila_ciudad = mysqli_fetch_assoc($query_ciudad);
?>
<?php
    $sql_lega = "SELECT * FROM legalizacion WHERE id_aprend=$usuario";
    $query_lega = mysqli_query($connection, $sql_lega);
    $fila_lega = mysqli_fetch_assoc($query_lega);
?>
<?php
    $consulta = "SELECT aprendices.nombre_aprend,aprendices.apellido_aprend,cen_formacion.nom_cen_forma,aprendices.telefono_aprend, aprendices.correo_aprend,region.nom_region,pro_formacion.nom_formacion,ficha_programa.num_ficha,aprendices.id_aprend,estado_aprendiz.nom_estado, jornada.nom_jornada, nivel_formacion.nom_nivel,aprendices.foto FROM aprendices,cen_formacion,region,ficha_programa,pro_formacion,estado_aprendiz,jornada,nivel_formacion, detalle_formacion WHERE detalle_formacion.id_aprend = '$usuario' and aprendices.id_aprend=detalle_formacion.id_aprend and ficha_programa.id_cen_forma=cen_formacion.id_cen_forma and cen_formacion.id_region=region.id_region AND ficha_programa.id_formacion=pro_formacion.id_formacion AND detalle_formacion.id_estado=estado_aprendiz.id_estado AND ficha_programa.id_jornada=jornada.id_jornada and ficha_programa.id_nivel=nivel_formacion.id_nivel and ficha_programa.num_ficha=detalle_formacion.num_ficha";

    $sql = mysqli_query($connection,$consulta);
    $dato = mysqli_fetch_assoc($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="css/carta.css">
    <title>Document</title>
</head>
<body>
    <div class="principal">
    <div class="spacio"></div>
    <div class=info_one>
        <label for="fecha" >CUIDAD</label>
        <select class="inputR" name="id_ciu" id="id_ciu">
            <option value="">Elije una ciudad</option>
            <?php
                foreach ($query_ciudad as $tip_ciudad) : ?>
                <option value="<?php echo $tip_ciudad['id'] ?> ">
                    <?php echo $tip_ciudad['nombre'] ?>---<?php echo $tip_ciudad['nom_depa'] ?></option>
            <?php
                endforeach;
            ?>
        </select> 
        <h4> SEÑOR  </h4>
        <input type="text" name="coordinador" id="">
        <h4> Coordinador Académico </h4>
        <h4> Centro de la Industria y de La Construcción </h4>
        <h4> SENA Regional Tolima </h4>
        <h4> Cuidad </h4>
        <h4>Yo <?=$_SESSION["nombre-aprendiz"] , $_SESSION['apellido-aprendiz']?>, identificado (a) con la cedula de ciudadanía N° <?=$_SESSION['documento-aprend']?> de ………….……., matriculado (a) en la formación <?php echo $dato["nom_formacion"] ?>;  con número de ficha (<?php echo $dato['num_ficha'] ?>), me dirijo a usted señor Coordinador, con el fin de solicitar su aprobación en la modalidad que he escogido, para desarrollar mi etapa productiva  con una duración de (   ) meses;  esta práctica la realizare en la empresa:................, con  dirección:………………………………………….………., ubicada en la ciudad de …………………………………..….; con No. Telefónico………………………….. y el nombre de la persona que hará las veces de jefe inmediato es:<?php echo $fila_lega["jefe_inmediato"] ?> Fecha de Inicio:<?php echo $fila_lega["fecha_ini_ep"] ?> y  Fecha de Finalización:……………………………….. </h4>

        <button class="descarga" id="descarga"> Imprimir</button>
    </div>
    </div>
    <script>
        $boton = document.getElementById('descarga');
        document.addEventListener('click' , (e) =>{
            if(e.target === $boton){
                $boton.style.display = "none";
                setTimeout(() => {
                    window.print();
                }, 1000);
            }
        });
    </script>
</body>
</html>