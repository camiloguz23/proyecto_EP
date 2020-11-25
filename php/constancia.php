
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">

    <title>INICIO</title>
</head>
<body>

    <header class="princi">
       
        <div class="logo">
            <img class="imagen"  height="67" width="90" src="../imagenes/iconoinicio.jpg.png"  alt="" >
            <h3 class="segui">CONSTANCIA<img class="seguiimg" width="20" height="20" src="../imagenes/iconoii.jpg" alt=""></h3>

            <div class="segun">
                <img height="220" src="../imagenes/verdemoco.png" alt="">
            </div>
        </div>
        
        <nav class="navegacion">
            <ul class="menu">
                <li> </li>
                <li></li>
            </ul>  
        </nav>

        

    </header>

    <div >
        <img src="../imagenes/Jovenes-del-SENA.png" alt="" style="margin-left: 70px;">
        <a href="../certificado_leg/imdex.php?documento=<?=$_SESSION['estudiante']?>" target="blank"><button class="botonForm constancia" style="margin-top:120px; margin-left:160px; position:absolute; width:30%;height:10%;font-size:30px;background-color:  rgb(89, 181, 72);">Imprimir constancia</button></a><br>
        <a href="../segui/segui.php" ><button class="botonForm constancia" style="margin-top:-140px; margin-left:550px; position:absolute; width:30%;height:10%;font-size:30px; background-color:  rgb(89, 181, 72);">Regresar</button></a>
        
    </div>

    <div class="paginas">
        <a href="http://oferta.senasofiaplus.edu.co/sofia-oferta/" target="_blank"><img height="52" width="58" src="../imagenes/sofia.png" alt=""></a><br>
        <a href="https://www.sena.edu.co/es-co/Paginas/default.aspx" target="_blank"><img height="52" width="55" src="../imagenes/sena.png" alt=""></a><br>
        <a href="https://sena.territorio.la/index.php?login=true" target="_blank"><img height="49" width="55" src="../imagenes/terrritorium.png" alt=""></a><br>
    </div>

  

    
</body>
</html>