<?php
    require_once("../php/connecion.php");
    session_start();

    if(isset($_POST['btn_actualizar'])){

        $doc = $_POST['documentoA'];
        $correo = $_POST['correoA'];
        $telefono = $_POST['telefonoA'];
        $clave = $_POST['claveA'];

        if($doc == "" || $correo==""|| $telefono==""|| $clave==""){
            echo "los campos son obligatorios";
        }else{
            $existe =0;
            $resultado = mysqli_query($connection,"SELECT * FROM usuario WHERE documento = '$doc'");
            while($consulta = mysqli_fetch_array($resultado)){
                $existe++;
            }
            if($existe ==0){
                echo "el documentono no existe en la db";
            }else{
                $actualizar="UPDATE usuario SET correo = '$correo',telefono = '$telefono',clave = '$clave' WHERE documento = '$doc'";
                mysqli_query($connection,$actualizar);
            }

            
        }

    }

?>