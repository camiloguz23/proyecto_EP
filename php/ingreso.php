<?php
    require 'connecion.php';   
    session_start();
            $usuario = $_POST["usuario"];
            $clave = $_POST["clave"];
           
            
                $consul = "SELECT * FROM usuario WHERE documento = '$usuario'  and clave = '$clave'";
                $query=mysqli_query($connection,$consul);
                $fila = mysqli_fetch_assoc($query);

              

                        if($fila){
                            $_SESSION['id_tip_usu'] = $fila['id_tip_usu'];
                            $_SESSION['usuario'] = $fila['nombre'];
                            $_SESSION["telefono"] = $fila["telefono"];
                            $_SESSION["correo"] = $fila["correo"];
                            $_SESSION["documento"] = $fila["documento"];
                           
                            

                                if($_SESSION["id_tip_usu"] == 1 ){
                                    
                                    header("location: ../administrador/admin.php");
                                    exit();
                                }
                                elseif($_SESSION["id_tip_usu"] == 2 ){
                                    header("location: ../segui/segui.php");
                                    exit();
                                }elseif($_SESSION["id_tip_usu"] == 3){
                                    header("location: ../instru/instructor.php");
                                }elseif ($_SESSION["id_tip_usu"] == 4){
                                    header("location: ../APE/ape.php");
                                }elseif ($_SESSION["id_tip_usu"] == 5){
                                    header("location: ../bienestar/biene.php");
                                }elseif ($_SESSION["id_tip_usu"] == 6){
                                    header("location: ../cor_academico/cordinh.php");
                                }elseif ($_SESSION["id_tip_usu"] == 7){
                                    header("location: ../biblioteca/biblio.php");
                                }
                                 else{
                                    header("location: ../index.html");
                                }  
                                
                        } else{
                            
                            
                             header("location: ../ingreso/ingreso.html");
                         
                             
                        }  
                                                
        
                      

?>     



