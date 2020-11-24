<?php
require '../php/connecion.php';


$sql_evi = "SELECT * FROM evidencias";
$query_evi = mysqli_query($connection, $sql_evi);
$fila_evi = mysqli_fetch_assoc($query_evi);
?>
<?php
require '../php/connecion.php';


$sql_esta = "SELECT * FROM estado_evi where id_esta_evi=1";
$query_esta = mysqli_query($connection, $sql_esta);
$fila_esta = mysqli_fetch_assoc($query_esta);
?>

<?php

require_once '../php/connecion.php';

$ins = $_POST["docuinst"];
$apre = $_POST["documenapre"];

if(isset($_POST)){
    $consul = "INSERT INTO calificacion (id_crear_evi,id_aprend,id_evidencias,id_esta_evi,id_doc_instru,fecha_cali) VALUES(null,'$apre','$fila_evi','$fila_esta','$ins, NOW()) "; 
    $query_est = mysqli_query($connection, $consul);
    $fila_est = mysqli_fetch_assoc($query_est);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imagenes/favicon.ico">
    <title>Document</title>
</head>
<body>
    <form id="forma">
            <select class="select" name="evidencia" id="id_evidencia">
                    <?php
                    foreach ($query_ciudad as $tip_ciudad) : ?>
                        <option value="<?php echo $tip_ciudad['id_tip_eviden'] ?> ">
                            <?php echo $tip_ciudad['nom_tip_eviden'] ?></option>
                    <?php
                    endforeach;
                    ?>
                </select>
                <input type="submit" value="enviar">
                </form>

                <div id="forman">

                </div>
<script src="archi.js"></script>
</body>
</html>

