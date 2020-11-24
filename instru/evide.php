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
