<?php 
   include("connecion.php");
   

    if (strlen($_POST['tipdocu']) >= 1 && strlen($_POST['nom']) >= 1 && strlen($_POST['ape']) >= 1 && strlen($_POST['email']) >= 1 && strlen($_POST['tel']) >= 1 && strlen($_POST['docu']) >= 1 ) {

        $tipdoc=$_POST['tipdocu'];
        $name=$_POST['nom'];
        $ape=$_POST['ape'];
        $email=$_POST['email'];
        $tel=$_POST['tel'];
        $docu= $_POST['docu'];
        $id= $_POST['id_apren'];
        $celular = $_POST["celular"];
        $direccion = $_POST["direccion"];
        $ficha = $_POST["ficha"];
        
        $insert="INSERT INTO aprendices (id_aprend, nombre_aprend, apellido_aprend, correo_aprend, telefono_aprend, id_tip_docu,direccion,num_celular)
        VALUES ('$docu', '$name', '$ape', '$email', '$tel', '$tipdoc','$direccion','$celular')";
        $inserta = mysqli_query($connection, $insert);

        if ($inserta) {
            $consulta = "INSERT INTO detalle_formacion(num_ficha, id_aprend, id_estado) VALUES ('$ficha',$docu,'1')";
            
            echo mysqli_query($connection,$consulta);
        }

    }

   
?>