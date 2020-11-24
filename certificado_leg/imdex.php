<?php
require_once('../php/connecion.php');
if($db['id_estado'] == 1 || $db['id_estado'] == null){
    echo '<script> alert("El aprendiz no esta legalizado"); </script>';
    echo '<script> window.location = "../segui/segui.php"; </script>';  
}
    //Consulta
    $documento = $_GET['documento'];

    $consul = "SELECT * FROM legalizacion INNER JOIN aprendices ON legalizacion.id_aprend = aprendices.id_aprend 
    INNER JOIN alternativa ON legalizacion.id_alternativa = alternativa.id_alternativa 
    INNER JOIN detalle_formacion ON detalle_formacion.id_aprend = aprendices.id_aprend
    WHERE legalizacion.id_aprend = '$documento'";
    $query = mysqli_query($connection,$consul);
    $db = mysqli_fetch_assoc($query);
    // var_dump($db);
?>        
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="style.css">
            <title>Document</title>
        </head>
        <body>
            <figure class="imagen">
                <img src="../imagenes/logobody.jpg" alt="">
            </figure>
            <main class="leg" id="leg">
                <header>
                    <figure class="logito"> 
                        <img src="../imagenes/logo.png" alt="" width="60px" height="60px">
                    </figure> 
                </header>
                <h1>CONSTANCIA</h1> <br> <br>
                <article class="aprendiz">
                    El aprendiz <strong> <?php echo strtoupper($db["nombre_aprend"] . $db["apellido_aprend"]) ; ?></strong> con el documento 
                    <strong><?php echo $db["id_aprend"]; ?></strong> entrego los 
                    documentos de ETAPA PRODUCTIVA, con la alternativa 
                    <strong><?php echo $db["nom_alternativa"]; ?></strong> ha satisfaccion
                    el dia <strong><script> document.write(new Date().toLocaleDateString()); </script></strong>
                </article> <br> <br>
                <p>IBAGUE - TOLIMA</p> <br> 
                <p><script> document.write(new Date().toLocaleDateString()); </script></p> <br><br>
                <p>SENA CENTRO DE INDUSTRIA Y CONSTRUCCION</p>
            </main>
            <button id="pdf1">PDF</button>
            <script>
                const boton = document.getElementById("pdf1");
                boton.addEventListener("click", ()=>{
                    boton.style.display = "none";
                    setTimeout(() => {
                        window.print();
                    }, 1000);
                });
            </script>
        </body>
        </html>
