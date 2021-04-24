<?php
require_once('../php/connecion.php');
session_start();
$usuario = $_SESSION['documento-aprend'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/carta.css">
    <title>Document</title>
</head>
<body>
<?php 
        $sql_carta = "SELECT * FROM aprendices WHERE $usuario";
        $query_carta = mysqli_query($connection, $sql_carta);
        $fila_carta = mysqli_fetch_assoc($query_carta);

        if($fila_carta){
            $_SESSION['carta'] = $fila_carta['carta'];
            // $documento = $_SESSION['documento'];
            if( $_SESSION['carta'] == null ){
                echo '<form method="post" enctype="multipart/form-data" class="form_2" id="form_2">
                <h3 class="titulo">SELECCIONAR CARTA DE AUTORIZACIÓN</h3>
                <input type="file" name="file" class="boton_personalizado">
                <p class="center"><input class="boton" id="btn_subirfirma" type="submit" value="Subir Archivo" class="boton_personalizado"></p>
                <a class="regre" href="index.php" id="regre">⬅</a>
                </form>';
                if(isset($_FILES['file'])) {
                    $directorio = "carta/" . $usuario;
                    
                    if (!file_exists($directorio)) {
                        mkdir($directorio, 0777, true);
                    }
                
                    $directorio = $directorio . "/";
                
                    $archivo = $directorio . basename($_FILES["file"]["name"]); // uploads/carta.pdf
                    $nombreArchivo = $_FILES["file"]["name"];
                    $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
                    $tamañoArchivo = $_FILES["file"]["size"];
                
                    if($tipoArchivo == "pdf") {
                        if ($tamañoArchivo <= 209715200) {
                
                            if(move_uploaded_file($_FILES["file"]["tmp_name"], $archivo)){
                                
                                $sql = "UPDATE aprendices SET carta = '$archivo' WHERE id_aprend = '$usuario'";
                                $consultarSql = mysqli_query($connection,$sql);
                
                                if( $consultarSql ){
                                    echo'<script type="text/javascript">
                                        alert("Se ha agregado correctamente la carta de autorizacion");
                                        
                                    </script>';
                                }
                            } else {
                                echo "<script>alert('Ha ocurrido un error al subir el archivo')</script>";
                            }
                
                        } else {
                            echo "<script>alert('El peso del archivo es superior a 200MB')</script>";
                        }   
                    } else {
                        echo "<script>alert('El tipo de archivo subido no es admitido, solo se admite PDF ')</script>";
                    }
                }
            }else{
                echo '
                <div class="info">
                <h3 class="resp">USTED YA CARGO SU CARTA DE AUTORIZACIÓN </h3>
                </div>
                <a class="regrr" href="index.php" id="regre">⬅</a>
                ';
            }  
        } 
        ?>
    </div>
</body>
</html>