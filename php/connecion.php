<?php

       //conexion a la base de datos 
       $connection = new mysqli("localhost","root","","ep_proyecto");
       if($connection ->connect_errno)
       {
           echo "error de conexion";
           exit;
       }


?>

