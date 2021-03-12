<?php 
   include("connecion.php");
   

    if (strlen($_POST['tipdocu']) >= 1 &&
     strlen($_POST['nom']) >= 1 &&
      strlen($_POST['ape']) >= 1 &&
       strlen($_POST['email']) >= 1 &&
        strlen($_POST['tel']) >= 1 &&
         strlen($_POST['docu']) >= 1 ) {

        $tipdoc=$_POST['tipdocu'];
        $name=$_POST['nom'];
        $ape=$_POST['ape'];
        $email=$_POST['email'];
        $tel=$_POST['tel'];
        $docu= $_POST['docu'];
        $celular = $_POST["celular"];
        $direccion = $_POST["direccion"];
        $ficha = $_POST["ficha"];
        $lugarexp = $_POST["lugarexp"];
        $fechaexp = $_POST["fechaexp"];
        

        $foto= $_FILES['foto'] ['name'];
        $rutafoto = $_FILES["foto"] ["tmp_name"];
        $destinofoto = "../fotoPerfil/aprendices/".$foto;
        

        if($tipdoc !="" && $ficha !="" && copy($rutafoto,$destinofoto) ){
        $consultaApre = "SELECT * FROM aprendices where id_aprend = '$docu'";
        $sqlApre = mysqli_query($connection,$consultaApre);
        $datoApre = mysqli_fetch_assoc($sqlApre);
        if ($datoApre) {
            echo "existe";
        }else {

        
            $insert="INSERT INTO aprendices (id_aprend, nombre_aprend, apellido_aprend, correo_aprend, telefono_aprend, id_tip_docu,direccion,num_celular,fecha_expedicion_docu,lugar_expedicion,foto)
            VALUES ('$docu', '$name', '$ape', '$email', '$tel', '$tipdoc','$direccion','$celular','$fechaexp','$lugarexp','$foto')";
            $inserta = mysqli_query($connection, $insert);

            if ($inserta) {
                $consulta = "INSERT INTO detalle_formacion(num_ficha, id_aprend, id_estado) VALUES ('$ficha',$docu,'1')";
                
                $SQLdeta = mysqli_query($connection,$consulta);

                if ($SQLdeta) {
                    echo 1;
                }
               
            }
        }
      }else{
          echo 2;
      }
    }else{
        echo 3;
    }

   
?>