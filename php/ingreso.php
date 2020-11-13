<?php

    session_start();

    require 'connecion.php';   
            
            $usuario = $_POST["usuario"];
            $clave = $_POST["clave"];
           
            
                $consul = "SELECT * FROM usuario WHERE usuario = '$usuario'  and clave = '$clave'";
               
                $query=mysqli_query($connection, $consul);
                $fila = mysqli_fetch_assoc($query);

              

                        if($fila){
                            $_SESSION['id_tip_usu'] = $fila['id_tip_usu'];
                    
                            $_SESSION['usuario'] = $fila['usuario'];
                           
                            

                                if($_SESSION["id_tip_usu"] == 1 ){
                                    
                                    header("location: ../instru/instructor.html");
                                    exit();
                                }
                                elseif($_SESSION["id_tip_usu"] == 2 ){
                                    header("location: ../segui/segui.html");
                                    exit();
                                }
                                 else{
                                    echo "error ";
                                    exit();
                                }  
                                
                        } else{
                            
                            echo "error ";
                                exit();
                        }  
                                                
        
                      

?>     



