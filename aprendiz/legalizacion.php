<?php
require_once("../php/connecion.php");
session_start();
$usuario = $_SESSION['documento-aprend'];
if ( $_SESSION['documento-aprend'] == "" ||  $_SESSION['documento-aprend'] == null ){
    
    echo  "<script>alert('identifique el aprendiz')</script>";
    echo '<script> window.location="index.php" </script>';
  
}else {

    if($_POST['seleccionTipo'] =="0" || $_POST['empresa'] =="0"){
        echo  "<script>alert('llene los campos de seleccionar')</script>";
        echo '<script> window.location="index.php" </script>';
    }else{

    if ($_POST["seleccionTipo"] == 1) {
        #archivos pdf
        $nombre= $_FILES['GFPI'] ['name'];
        $ruta = $_FILES["GFPI"] ["tmp_name"];
        $destino = "pdfLEgalizacion/".$nombre;
        
        $nombreDOs= $_FILES['ContratoAprendizaje'] ['name'];
        $rutaDos = $_FILES["ContratoAprendizaje"] ["tmp_name"];
        $destinoDos = "pdfLEgalizacion/".$nombreDOs;
        
        #dato ingresados por el usuario
        $documento = $_SESSION['documento-aprend'];
        $Alternativa = $_POST["seleccionTipo"];
        
        $empresa = $_POST["empresa"];
        
        $jefe = $_POST["jefe"];
        
        $cargoJefe = $_POST["cargoJefe"];
        
        

        $fecha = $_POST["fecha"];
        if ($nombre != "") {
            if (copy($ruta,$destino) && copy($rutaDos,$destinoDos)) {
                $consulta = "INSERT INTO legalizacion (nit_empresa,id_alternativa,id_aprend,fecha_ini_ep,fecha_carga_docu,cart_solicitud,form_023,const_empre,cedu_copia,contra_copia,eps_copia,jefe_inmediato,cargo_del_jefe) VALUES ('$empresa','$Alternativa','$documento','$fecha', NOW(),NULL,'$nombre', null, null,'$nombreDOs',null,'$jefe','$cargoJefe')";
                $sql = mysqli_query($connection,$consulta);
                if ($sql) {
                    $estado ="UPDATE detalle_formacion SET id_estado = '2' WHERE detalle_formacion.id_aprend = '$documento'";
                    $sqlEstado= mysqli_query($connection,$estado);
                    if ($sqlEstado) {
                        
                        header("location: ../php/constancia.php");
                    }else{
                        echo "30 linea";
                    }
                } else {
                    echo "linea 27";
                }
            }else {
                echo("<script>alert('No se han cargado los documentos completos')</script>");
                header("location: segui.php");
            }
        }else {
            echo "23 linea";
        }
    }else if ($_POST["seleccionTipo"] == 2 || $_POST["seleccionTipo"] == 6) {
        #archivos pdf
        $nombre= $_FILES['GFPI'] ['name'];
        $ruta = $_FILES["GFPI"] ["tmp_name"];
        $destino = "pdfLEgalizacion/".$nombre;

        $nombreCuatro= $_FILES['CartaSolicitud'] ['name'];
        $rutaCuatro = $_FILES["CartaSolicitud"] ["tmp_name"];
        $destinoCuatro = "pdfLEgalizacion/".$nombreCuatro;

        $nombreTres= $_FILES['Cartaempresa'] ['name'];
        $rutaTres = $_FILES["Cartaempresa"] ["tmp_name"];
        $destinoTres = "pdfLEgalizacion/".$nombreTres;
        #dato ingresados por el usuario
        $documento = $_SESSION['documento-aprend'];
        $Alternativa = $_POST["seleccionTipo"];
        $empresa = $_POST["empresa"];
        $jefe = $_POST["jefe"];
        $cargoJefe = $_POST["cargoJefe"];
        $fecha = $_POST["fecha"];

        if ($nombre != "") {
            if (copy($ruta,$destino) && copy($rutaTres,$destinoTres) && copy($rutaCuatro,$destinoCuatro)) {
                $consulta = "INSERT INTO legalizacion (nit_empresa,id_alternativa,id_aprend,fecha_ini_ep,fecha_carga_docu,cart_solicitud,form_023,const_empre,cedu_copia,contra_copia,eps_copia,jefe_inmediato,cargo_del_jefe) VALUES ('$empresa','$Alternativa','$documento','$fecha', NOW(),'$nombreCuatro','$nombre', '$nombreTres', null,null,null,'$jefe','$cargoJefe')";
                $sql = mysqli_query($connection,$consulta);

                if ($sql) {
                    $estado ="UPDATE detalle_formacion SET id_estado = '2' WHERE detalle_formacion.id_aprend = '$documento'";
                    $sqlEstado= mysqli_query($connection,$estado);
                    
                    if ($sqlEstado) {
                        header("location: ../php/constancia.php");
                    }
                }
            }else {
                echo("<script>alert('No se han cargado los documentos completos')</script>");
                header("location: ../segui/segui.php");
            }
        }
    } elseif ($_POST["seleccionTipo"] == 3 || $_POST["seleccionTipo"] == 4 || $_POST["seleccionTipo"] == 5 ){

         #archivos pdf
         $nombre= $_FILES['GFPI'] ['name'];
         $ruta = $_FILES["GFPI"] ["tmp_name"];
         $destino = "pdfLEgalizacion/".$nombre;

         $nombreCuatro= $_FILES['CartaSolicitud'] ['name'];
         $rutaCuatro = $_FILES["CartaSolicitud"] ["tmp_name"];
         $destinoCuatro = "pdfLEgalizacion/".$nombreCuatro;

         $nombreTres= $_FILES['Cartaempresa'] ['name'];
         $rutaTres = $_FILES["Cartaempresa"] ["tmp_name"];
         $destinoTres = "pdfLEgalizacion/".$nombreTres;

         $nombreCinco= $_FILES['FotocopiaCC'] ['name'];
         $rutaCinco = $_FILES["FotocopiaCC"] ["tmp_name"];
         $destinoCinco = "pdfLEgalizacion/".$nombreCinco;

         $nombreSeis= $_FILES['fotocopiaEPS'] ['name'];
         $rutaSeis = $_FILES["fotocopiaEPS"] ["tmp_name"];
         $destinoSeis = "pdfLEgalizacion/".$nombreSeis;
         #dato ingresados por el usuario
         $documento = $_SESSION['documento-aprend'];
         $Alternativa = $_POST["seleccionTipo"];
         $empresa = $_POST["empresa"];
         $jefe = $_POST["jefe"];
         $cargoJefe = $_POST["cargoJefe"];
         $fecha = $_POST["fecha"];

         if ($nombre != "") {
            if (copy($ruta,$destino) && copy($rutaTres,$destinoTres) && copy($rutaCuatro,$destinoCuatro) && copy($rutaCinco,$destinoCinco) && copy($rutaSeis,$destinoSeis)) {
                $consulta = "INSERT INTO legalizacion (nit_empresa,id_alternativa,id_aprend,fecha_ini_ep,fecha_carga_docu,cart_solicitud,form_023,const_empre,cedu_copia,contra_copia,eps_copia,jefe_inmediato,cargo_del_jefe) VALUES ('$empresa','$Alternativa','$documento','$fecha', NOW(),'$nombreCuatro','$nombre', '$nombreTres', '$nombreCinco',null,'$nombreSeis','$jefe','$cargoJefe')";
                $sql = mysqli_query($connection,$consulta);
                if ($sql) {
                    $estado ="UPDATE detalle_formacion SET id_estado = '2' WHERE detalle_formacion.id_aprend = '$documento'";
                    $sqlEstado= mysqli_query($connection,$estado);
                    if ($sqlEstado) {
                        header("location: ../php/constancia.php");
                    }
                }
            }else {
                echo("<script>alert('No se han cargado los documentos completos')</script>");
                header("location: ../segui/segui.php");
            }
        }
    }elseif ($_POST["seleccionTipo"] == 7) {
       
            #archivos pdf
            $nombre= $_FILES['GFPI'] ['name'];
            $ruta = $_FILES["GFPI"] ["tmp_name"];
            $destino = "pdfLEgalizacion/".$nombre;

            $nombreCuatro= $_FILES['CartaSolicitud'] ['name'];
            $rutaCuatro = $_FILES["CartaSolicitud"] ["tmp_name"];
            $destinoCuatro = "pdfLEgalizacion/".$nombreCuatro;
            
            $nombreCinco= $_FILES['FotocopiaCC'] ['name'];
            $rutaCinco = $_FILES["FotocopiaCC"] ["tmp_name"];
            $destinoCinco = "pdfLEgalizacion/".$nombreCinco;

            $nombreSeis= $_FILES['fotocopiaEPS'] ['name'];
            $rutaSeis = $_FILES["fotocopiaEPS"] ["tmp_name"];
            $destinoSeis = "pdfLEgalizacion/".$nombreSeis;
            #dato ingresados por el usuario
            $documento = $_SESSION['documento-aprend'];
            $Alternativa = $_POST["seleccionTipo"];
            $empresa = $_POST["empresa"];
            $jefe = $_POST["jefe"];
            $cargoJefe = $_POST["cargoJefe"];
            $fecha = $_POST["fecha"];
   
            if ($nombre != "") {
               if (copy($ruta,$destino) && copy($rutaCuatro,$destinoCuatro) && copy($rutaCinco,$destinoCinco) && copy($rutaSeis,$destinoSeis)) {
                   $consulta = "INSERT INTO legalizacion (nit_empresa,id_alternativa,id_aprend,fecha_ini_ep,fecha_carga_docu,cart_solicitud,form_023,const_empre,cedu_copia,contra_copia,eps_copia,jefe_inmediato,cargo_del_jefe) VALUES ('$empresa','$Alternativa','$documento','$fecha', NOW(),'$nombreCuatro','$nombre', null, '$nombreCinco',null,'$nombreSeis','$jefe','$cargoJefe')";
                   $sql = mysqli_query($connection,$consulta);
                   if ($sql) {
                    $estado ="UPDATE detalle_formacion SET id_estado = '2' WHERE detalle_formacion.id_aprend = '$documento'";
                    $sqlEstado= mysqli_query($connection,$estado);
                    if ($sqlEstado) {
                        header("location: ../php/constancia.php");
                    }
                   }else{
                       echo "hola";
                   }
               }else {
                echo("<script>alert('No se han cargado los documentos completos')</script>");
                header("location: ../segui/segui.php");
                }
           }
    }
    
}
}  
?>



