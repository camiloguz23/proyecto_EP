<?php
require_once("connecion.php");

$documento = $_GET["documento"];

$consulta = "SELECT aprendices.nombre_aprend,aprendices.apellido_aprend,cen_formacion.nom_cen_forma,aprendices.telefono_aprend, aprendices.correo_aprend,region.nom_region,pro_formacion.nom_formacion,ficha_programa.num_ficha,aprendices.id_aprend,estado_aprendiz.nom_estado, jornada.nom_jornada, nivel_formacion.nom_nivel,aprendices.foto FROM aprendices,cen_formacion,region,ficha_programa,pro_formacion,estado_aprendiz,jornada,nivel_formacion, detalle_formacion WHERE detalle_formacion.id_aprend = '$documento' and aprendices.id_aprend=detalle_formacion.id_aprend and ficha_programa.id_cen_forma=cen_formacion.id_cen_forma and cen_formacion.id_region=region.id_region AND ficha_programa.id_formacion=pro_formacion.id_formacion AND detalle_formacion.id_estado=estado_aprendiz.id_estado AND ficha_programa.id_jornada=jornada.id_jornada and ficha_programa.id_nivel=nivel_formacion.id_nivel and ficha_programa.num_ficha=detalle_formacion.num_ficha";

$sql = mysqli_query($connection,$consulta);
$dato = mysqli_fetch_assoc($sql);

if ($dato) {
     
    
        
        echo('
                <div class="datosMostrar">
                    <h3 class="subTitulo">*DATOS APRENDIZ</h3>
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
                            <label class ="label" for="">TELEFONO: </label>
                            <label class ="datos" for="">'.$dato["telefono_aprend"].'</label>
                        </div>
                        <div class="dato">
                            <label class ="label" for="">E-MAIL: </label>
                            <label class ="datos" for="">'.$dato["correo_aprend"].'</label>
                        </div> 
                        <div class="dato">
                            <label class ="label" for="">ESTADO: </label>
                            <label class ="datos" for="" id="estadoAprend">'.$dato["nom_estado"].'</label>
                        </div>
                        <a href="../certificado_leg/imdex.php?documento='.$dato['id_aprend'].'" target="_blank">
                        <button class="botonForm constancia" style="margin-top:-40px; margin-left:460px; position:absolute;">Constancia</button>
                        </a>
                    </div><br>

                    <h3 class="subTitulo">*DATOS FORMACIÓN</h3>

                    <div class="datosForma">
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
        
    
}else if($documento == ""){
   
}else{
    echo("<h2>Aprendiz no existe</h2>");
};
?>