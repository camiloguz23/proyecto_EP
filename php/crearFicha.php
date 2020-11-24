<?php
    
   
    require 'connection.php';

            if(strlen($_POST["telefono"]) >= 1  &&
            strlen($_POST["apousu"]) >= 1  &&
            strlen($_POST["email"]) >= 1  &&
            strlen($_POST["clave"]) >= 1  ){
                
                $telefono = $_POST['telefono'];
                $apousu = $_POST['apousu'];
                $email =$_POST['email'] ;
                $clave =$_POST['clave'] ;
                $confclave = $_POST['claveCon'];
            
            
            if($clave == $confclave){
              
                $consulta = "INSERT INTO usuario( telefono, apousu, email, clave, id_tip_user) VALUES ('$telefono','$apousu','$email','$clave' ,'2')";
                
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