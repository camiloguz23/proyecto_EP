<?php
require_once("../php/connecion.php");

$documento = $_GET["documentoo"];

$consulta = "SELECT aprendices.nombre_aprend,aprendices.apellido_aprend,aprendices.telefono_aprend, aprendices.correo_aprend,pro_formacion.nom_formacion,ficha_programa.num_ficha,aprendices.id_aprend,estado_aprendiz.nom_estado, aprendices.foto FROM aprendices,ficha_programa,pro_formacion,estado_aprendiz, detalle_formacion WHERE detalle_formacion.id_aprend = '$documento' and aprendices.id_aprend=detalle_formacion.id_aprend   AND ficha_programa.id_formacion=pro_formacion.id_formacion AND detalle_formacion.id_estado=estado_aprendiz.id_estado";

$sql = mysqli_query($connection,$consulta);
$dato = mysqli_fetch_assoc($sql);


if ($dato) {    
        echo ('
        <div class="datosMostrar" id="datosgen">
        
                    <h3 class="subTitulo">DATOS APRENDIZ</h3>
                    <div class="datosApre">
                        <div class="dato">
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
                            <label class ="label" for="">NO.FICHA: </label>
                            <label class ="datos" for="">'.$dato["num_ficha"].'</label>
                        </div>

                        <div class="dato">
                            <label class ="label" for="">PROGRAMA DE FORMACIÓN: </label>
                            <label class ="datos" for="">'.$dato["nom_formacion"].'</label>
                        </div>
                        
                    </div>

                    
                </div>
               
        '
    );
    $consul="SELECT * FROM calificacion INNER JOIN evidencias on calificacion.id_evidencias=evidencias.id_evidencias  INNER JOIN estado_evi on calificacion.id_esta_evi=estado_evi.id_esta_evi INNER JOIN usuario on calificacion.id_doc_instru=usuario.documento WHERE calificacion.id_aprend = '$documento' AND calificacion.id_esta_evi=2 ORDER BY evidencias.id_evidencias ASC";
    $query = mysqli_query($connection, $consul);
            echo ('
            <br>
            <br>
            <h4>EVIDENCIAS DEL APRENDIZ</h4><br>
                <table border="2">
                <tr>
                    <td>DOCUMENTO APRENDIZ</td>
                    <td>EVIDENCIAS</td>
                    <td>ESTADO</td>
                    <td>INSTRUCTOR</td>
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
            ');
    
    

}else if($documento == ""){
   
}else{
    echo("<h2>Aprendiz no existe</h2>");
};

?>