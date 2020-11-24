<?php
   require_once("connecion.php");

            if(strlen($_POST["numf"]) >= 1  &&
            strlen($_POST["jornadaF"]) >= 1  &&
            strlen($_POST["NivelFormacion"]) >= 1  && 
            strlen($_POST["centroFormacion"]) >= 1  && 
            strlen($_POST["fechaiF"]) >= 1  &&
            strlen($_POST["fechaF"]) >= 1  ){
                
                $numf = $_POST['numf'];
                $jornadaF = $_POST['jornadaF'];
                $NivelFormacion =$_POST['NivelFormacion'] ;
                $programaformacion =$_POST['programaformacion'] ;
                $centroFormacion =$_POST['centroFormacion'] ;
                $fechaiF = $_POST['fechaiF'];
                $fechaF = $_POST['fechaF'];
            }
       
            if($numf != "" && $jornadaF != "" && $NivelFormacion != "" && $centroFormacion != "" && $fechaiF != "" && $fechaF != ""){
              
                $consulta = "INSERT INTO ficha_programa (num_ficha, id_jornada, id_nivel, id_formacion, id_cen_forma, fecha_inicio, fecha_final)
                 VALUES                                  ('$numf','$jornadaF', '$NivelFormacion', '1', '2', '$fechaiF', '$fechaF')";
                
                $resultado = mysqli_query($connection,$consulta);
               
                if($resultado){
                    echo '<script> alert ("usuario creado exitosamente,!bienvenido¡");</script>';
                    echo '<script> window.location="../index.html" </script>';
            
    
                }else{
                
                    header("location: registro.php");
                
                }
            }else{
                echo '<script> alert ("las contraseñas no son iguales intentalo de nuevo");</script>';
                echo '<script> window.location="registro.php" </script>';
            }
                
           

        }else{
            ?>
            <h3>porfavor completa los campos</h3>
            <?php
            
        }
    

?>