<?php
require_once ("../../php/connecion.php");

$documento = $_POST["documento"];

$sql = "SELECT aprendices.id_aprend,nombre_aprend,apellido_aprend,carta FROM aprendices, detalle_formacion WHERE id_estado = 1 and aprendices.id_aprend = detalle_formacion.id_aprend and aprendices.id_aprend like '%$documento%'";

$consulta= mysqli_query($connection,$sql);

foreach ($consulta as $aprendiz){
    echo ("
    <tr>
                <td>".$aprendiz['id_aprend']."</td>
                <td>".$aprendiz['nombre_aprend']." ". $aprendiz['apellido_aprend']."</td>
                <td><a href='../aprendiz/carta/".$aprendiz['id_aprend']."/".$aprendiz['carta']."'>".$aprendiz['carta']."</a></td>
                <td>
                    <form method='post' action='php/aprobacion.php' autocomplete='off'>
                        <input type='hidden' value='".$aprendiz['id_aprend']."' name='documento'>
                        <button type='submit'>Aprobar</button>
                    </form>
                </td>
            </tr>
    ");
}


?>
