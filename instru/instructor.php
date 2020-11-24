<?php
session_start();
$usario = $_SESSION["documento"];
if ($usario == "" || $usario == null) {
    header("location: ../index.html");
}
require_once('../php/connecion.php');


?>
<?php
require '../php/connecion.php';


$sql_ciudad = "SELECT * FROM tipo_evidencias";
$query_ciudad = mysqli_query($connection, $sql_ciudad);
$fila_ciudad = mysqli_fetch_assoc($query_ciudad);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="instructor.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<<<<<<< HEAD
    <link rel="icon" href="../imagenes/favicon.ico">
=======

>>>>>>> a41e06c1ca6ae7317c19e08280ebda90203518ed
    <title>INSTRUCTOR</title>
</head>

<body>
    <header class="princi">

        <div class="logo">

            <img class="imagen" height="90" width="90" src="../imagenes/Imagen2.png" alt="">
            <h3 class="segui">INSTRUCTOR<img class="seguiimg" width="30" height="30" src="../imagenes/Imagen7.png" alt=""></h3>

            <div class="cerrar">
                <a href="../php/salir.php">CERRAR SESIÓN</a>
            </div>

            <div class="segun">
                <img height="220" src="../imagenes/naranja.png" alt="">
            </div>
        </div>

        <nav class="navegacion">
            <ul class="menu">
                <li><a href="#" id="seguimi"><img class="dos" width="33" height="26" src="../imagenes/Imagen8.png" alt="">SEGUIMIENTO DE EVIDENCIAS</a></li>
                <li id="aprediz"><a href="#"><img class="tres" width="39" height="30" src="../imagenes/Imagen6.png" alt="">APRENDIZ</a></li>
            </ul>
        </nav>

    </header>

    <div class="contper">
        <div id="fondo" class="fondo">
            <img width="1349" height="400" src="../imagenes/INSTRUCTOR.png" alt="">
        </div>
        <div class="naranja"><img class="perfil" src="../imagenes/PERFIL.jpg" alt=""></div>

        <div class="contenedor">
            <div class="date">
                <ul class="datos">
                    <p>Soy una persona empendedora que mira hacia adelante y simepre intenta ser mejor cada dia</p>
                    <p class="text2">NOMBRE: <?= $_SESSION["usuario"] ?> </p>
                    <p class="text2"> TELEFONO: <?= $_SESSION["telefono"] ?></p>
                    <p class="text2">EMAIL: <?= $_SESSION["correo"] ?></p>
                </ul>
            </div>
            <div class="edicion">
                <a href="#" class="button">EDITAR</a>
            </div>
        </div>

        <div class="opcion">
            <a href="#" class="button3"> <img class="butdos" height="26" width="33" src="../imagenes/Imagen8.png" alt="" srcset="">SEGUIMIENTO DE EVIDENCIAS</a>
            <a href="#" class="button4"> <img class="buttres" height="30" width="55" src="../imagenes/Imagen6.png" alt="" srcset="">APRENDICES</a>
        </div>
    </div>

    <div id="infor" class="seguimiento">
        <div class="sali">
            <a href="#" id="salirr"><img class="salir" src="../imagenes/cancelar.png" alt=""></a>
        </div>

        <div class="informa2">
            <div class="buscador2">
                <h3 class="subTitulo2">BUSCAR DOCUMENTO</h3>
                <div class="buscarDocu">
                    <form method="POST" id="buscarDocu" autocomplete="off">
                        <input type="number" name="aprendiza" placeholder="Numero De Documento" id="documento">
                        <div class="boton">
                            <a href="#" id="boton"><img class="boton" src="../imagenes/Imagen3.png" height="50px" width="50px"></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!--datos del aprendiz -->
        <div class="informa">
        <button id="calificar" class="calificar" name="calificar">Calificar</button>
            <div id="informa">
            
                <!--</div>-->
            
            </div>
            <div class="tipoEvidencia" id="tipoEvidencia">
            <form id="fomutievi" class="fomutievi">
                <label for="">*Seleccione el tipo de evidencia que desea calificar:</label><br>
                    <select class="inputR" name="tip_evi" id="tip_evi">
                            <?php
                                foreach($query_ciudad as $tipo_evidencia):?>
                            <option value="<?php echo $tipo_evidencia['id_tip_eviden'] ?> ">
                                <?php echo $tipo_evidencia['nom_tip_eviden'] ?></option>
                            <?php
                                endforeach; 
                                ?>
                    </select>
                <button id="inicio">Seleccionar</button><br><br>
                <button id="salir2" class="salir2">Cancelar</button>
            </form>
            
        </div>
        <div class="evidencias1" id ="evidencias1">

        <div class="check1">
            <form class=""  action="evidencias.php" id="evidencias"  method="POST">
                <div class="aprendiz" id= "hidden" ></div>
                <input type="hidden" name ="docuinst" value="<?php echo ($_SESSION['documento']) ?>"> 

                <label><input type="checkbox" id="chec1" class="check" name ="evi1" value="1"> Evidencia N°1</label><br>
                <input type="date" id="fecha" name ="fechaE">
                <button id="guardarEvi" name="guardarEvi" value="bebe">Guardar</button>
            </form> 
        </div>
        
    </div>
        <div class="evidencias2" id="evidencias2">
        <form class=""  action="" id="evidenciaas2"  method="POST">
                <input type="checkbox" id="chec13" class="check"> Evidencia N°1<br>
                <input type="checkbox" id="chec14" disabled="" class="check"> Evidencia N°2 <br>
                <input type="date" id="fecha1">

                <div class="botonesE">
                    <button id="guardarE" >Guardar</button>
                </div>        
            </form>
        </div>

        
    </div>
        

    
        
            <!-- <input type="checkbox" id="chec2" disabled="" name ="evi2" value="2" class="check"> Evidencia N°2 <br>
            <input type="checkbox" id="chec3"  disabled="" name ="evi3" value="3" class="check"> Evidencia N°3  <br>
            <input type="checkbox" id="chec4" disabled="" name ="evi4" value="4" class="check"> Evidencia N°4 <br> 
            <input type="checkbox" id="chec5" disabled="" name ="evi5" value="5" class="check"> Evidencia N°5 <br> 
            <input type="checkbox" id="chec6" disabled="" name ="evi6" value="6" class="check"> Evidencia N°6 <br>
            <input type="checkbox" id="chec7" disabled="" name ="evi7" value="7" class="check"> Evidencia N°7 <br> 
            <input type="checkbox" id="chec8" disabled="" name ="evi8" value="8" class="check"> Evidencia N°8 <br> 
            <input type="checkbox" id="chec9" disabled="" name ="evi9" value="9" class="check"> Evidencia N°9  <br>
            <input type="checkbox" id="chec10" disabled="" name ="evi10" value="10" class="check"> Evidencia N°10 <br> 
            <input type="checkbox" id="chec11" disabled="" name ="evi11" value="11" class="check"> Evidencia N°11 <br> 
            <input type="checkbox" id="chec12" disabled="" name ="evi12" value="12" class="check"> Evidencia N°12  <br> 
            <input type="date" id="fecha" name ="fechaE">
        
            <div class="botonesE">
                <button id="cancelarE" type="submit">Cancelar</button>
                <button id="guardarE" >Guardar</button>
            </div>  
        <div class="guardos">
            <input type="submit" value="confirmar">
        </div> -->
                            


    </div>

    
    <footer class="pie">
        <img height="70px" width="70px" src="../imagenes/logo blanco.jpg" alt="">

        <div class="info">
            <p>&copy; Servicio Nacional de Aprendizaje SENA </p>
            <p>Centro de Industria y Construccion- Ibague-Tolima </p>

            <p> Direccion: 141- Sector, Cra. 45 Sur #1255</p>
        </div>
    </footer>

    <script src="app.js"></script>

</body>

</html>
<!-- 
<script>
    funcion habilitar elemento
                    function habilitar(elemento,habili)
                    {
                        const elementohabilitar = document.getElementById(habili);
                        const habilitardos = document.getElementById(elemento);
                        
    
                                if(habilitardos.checked==true){
                                let conf  = confirm("esta seguro de calificar la actividad");
                                    if(conf== true){
                                        elementohabilitar.removeAttribute("disabled");
                                    }
                                    else{
                                        habilitardos.checked=false;
                                    }
                                    
                                }
                    }

                        function ejecutar(e)
                        {
                        switch (e.target.id) 
                            {
                            case "chec1":
                                habilitar("chec1","chec2");
                                break;
                            case "chec2":
                                habilitar("chec2","chec3");
                                break;
                            case "chec3":
                                habilitar("chec3","chec4");
                                break;
                            case "chec4":
                                habilitar("chec4","chec5");
                                break;
                            case "chec5":
                                habilitar("chec5","chec6");
                                break;
                            case "chec6":
                                habilitar("chec6","chec7");
                                break;
                            case "chec7":
                                habilitar("chec7","chec8");
                                break;
                            case "chec8":
                                habilitar("chec8","chec9");
                                break;
                            case "chec9":
                                habilitar("chec9","chec10");
                                break;
                            case "chec10":
                                habilitar("chec10","chec11");
                                break;
                            case "chec11":
                                habilitar("chec11","chec12");
                                break;

                            default:
                                break;
                            }
                        }
 
                    const opciones =document.querySelectorAll(".check");
                    opciones.forEach((el)=>{
                        el.addEventListener("click",ejecutar);
                        
                    })
</script>

<script>
const formu = document.getElementById("fomutievi");
const usuario = document.getElementById("tip_evi");
const formula = document.getElementById("fore"); -->

<!-- 
// funcion para tipos de evidencia
formu.addEventListener("submit", (e)=>
{
    e.preventDefault();
        const xhr = new XMLHttpRequest();
        xhr.addEventListener("readystatechange",(e)=>{
            if(xhr.readyState !== 4) return;
            if(xhr.status >= 200 && xhr.status <300)
            {
                let json = JSON.parse(xhr.responseText);
                console.log(json[0].id_tip_eviden)
                if(json[0].id_tip_eviden==2)
                {
                    
                    const form = `
                    <form class=""  action="" id="evidencias" method="POST">
                        <input type="checkbox" id="chec1" class="check"> evidencia N°1<br>
                        <input type="checkbox" id="chec2" disabled="" class="check"> evidencia N°2 <br>
                        <input type="checkbox" id="chec3" disabled="" class="check"> evidencia N°3  <br>
                        <input type="checkbox" id="chec4" disabled="" class="check"> evidencia N°4 <br>   
                        <input type="checkbox" id="chec5" disabled="" class="check"> evidencia N°5 <br> 
                        <input type="checkbox" id="chec6" disabled="" class="check"> evidencia N°6 <br>
                        <input type="checkbox" id="chec7" disabled="" class="check"> evidencia N°7 <br> 
                        <input type="checkbox" id="chec8" disabled="" class="check"> evidencia N°8 <br> 
                        <input type="checkbox" id="chec9" disabled="" class="check"> evidencia N°9  <br>
                        <input type="checkbox" id="chec10" disabled="" class="check"> evidencia N°10 <br> 
                        <input type="checkbox" id="chec11" disabled="" class="check"> evidencia N°11 <br> 
                        <input type="checkbox" id="chec12" disabled="" class="check"> evidencia N°12  <br>         
                        <div class="botoonn">
                        <input type="date" id="fecha">
                            <div class="funsi">
                                <button id="cancelar" type="submit">Cancelar</button>
                                <button id="guardar" type="submit">Guardar</button>
                            </div>
                        </div>
                    </form>`;

                    formula.innerHTML=form;
                 // funcion habilitar elemento
                    function habilitar(elemento,habili)
                    {
                        const elementohabilitar = document.getElementById(habili);
                        const habilitardos = document.getElementById(elemento);
                        
    
                                if(habilitardos.checked==true){
                                let conf  = confirm("esta seguro de calificar la actividad");
                                    if(conf== true){
                                        elementohabilitar.removeAttribute("disabled");
                                    }
                                    else{
                                        habilitardos.checked=false;
                                    }
                                    
                                }
                    }

                        function ejecutar(e)
                        {
                        switch (e.target.id) 
                            {
                            case "chec1":
                                habilitar("chec1","chec2");
                                break;
                            case "chec2":
                                habilitar("chec2","chec3");
                                break;
                            case "chec3":
                                habilitar("chec3","chec4");
                                break;
                            case "chec4":
                                habilitar("chec4","chec5");
                                break;
                            case "chec5":
                                habilitar("chec5","chec6");
                                break;
                            case "chec6":
                                habilitar("chec6","chec7");
                                break;
                            case "chec7":
                                habilitar("chec7","chec8");
                                break;
                            case "chec8":
                                habilitar("chec8","chec9");
                                break;
                            case "chec9":
                                habilitar("chec9","chec10");
                                break;
                            case "chec10":
                                habilitar("chec10","chec11");
                                break;
                            case "chec11":
                                habilitar("chec11","chec12");
                                break;

                            default:
                                break;
                            }
                        }
 
                    const opciones =document.querySelectorAll(".check");
                    opciones.forEach((el)=>{
                        el.addEventListener("click",ejecutar);
                        
                    })
    

                }
                else 
                {
                    const formu2=`
                    <form class=""  action="" id="evidenciaas2"  method="POST">

                    <input type="checkbox" id="chec13" class="check"> evidencia N°1<br>
                    <input type="checkbox" id="chec14" disabled="" class="check"> evidencia N°2 <br>
                        <div class="botoonnn">
                                <input type="date" id="fecha1">
                                <div class="funsin">
                                    <button id="cancelarr" type="submit">Cancelar</button>
                                    <button id="guardarr" type="submit">Guardar</button>
                                </div>
                        </div>
                    </form>`;
                    formula.innerHTML=formu2;

                     // funcion habilitar elemento
                     function habilitar(elemento,habili)
                     {
                         const elementohabilitar = document.getElementById(habili);
                         const habilitardos = document.getElementById(elemento);
                         
     
                                 if(habilitardos.checked==true){
                                 let conf  = confirm("esta seguro de calificar la actividad");
                                     if(conf== true){
                                         elementohabilitar.removeAttribute("disabled");
                                     }
                                     else{
                                         habilitardos.checked=false;
                                     }
                                     
                                 }
                     }
                     function ejecutar(e)
                        {
                        switch (e.target.id) 
                            {
                            case "chec13":
                                habilitar("chec13","chec14");
                                break;
                            default:
                                break;
                            }
                        }
                        const opciones =document.querySelectorAll(".check");
                        opciones.forEach((el)=>{
                            el.addEventListener("click",ejecutar);
                            
                        })

                }
            
            }
        })
        xhr.open("POST","evi.php");
        xhr.send(new FormData(formu));
        
});
</script> --> -->