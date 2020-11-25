<?php
   require_once("connecion.php");
               
            $numf = $_POST['numf'];
            $jornadaF = $_POST['jornadaF'];
            $NivelFormacion =$_POST['NivelFormacion'] ;
            $programaformacion =$_POST['programaformacion'] ;
            $centroFormacion =$_POST['centroFormacion'] ;
            $fechaiF = $_POST['fechaiF'];
            $fechaF = $_POST['fechaF'];
            
        
            if($numf != "" && $jornadaF != "" && $NivelFormacion != "" && $centroFormacion != "" && $fechaiF != "" && $fechaF != "" && $programaformacion != ""){
              
                $consultaF = "INSERT INTO ficha_programa(num_ficha, id_jornada, id_nivel, id_formacion, id_cen_forma, fecha_inicio, fecha_final)
                 VALUES ('$numf','$jornadaF', '$NivelFormacion', '$programaformacion', '$centroFormacion', '$fechaiF', '$fechaF')";
                
                $resultadoF = mysqli_query($connection,$consultaF);
               
                if($resultadoF ){
                    echo "1";
            
    
                }else{
                    
               echo "2";
                
                }
            }else{
       
                echo "3";
            }
                
           

       
    

?>