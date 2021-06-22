// const datosapre = document.getElementById("informa3")//informacion del aprendiz
const botonn = document.getElementById("boton3");//boton para ejecutar la busqueda del aprendiz
const documentoo = document.getElementById("documento3");//input que contiene el documento del aprendiz

botonn.addEventListener("click", consulta);
function consulta(e) {
    e.preventDefault();  
      let xhr = new XMLHttpRequest();
      const docuBase = documentoo.value 
      xhr.open("get","aprendiz.php?documentoo=" + docuBase,true)
      xhr.onreadystatechange = function () {
          if(xhr.readyState == 4 && xhr.status == 200){
              const info = document.querySelector("#informa3")
              info.innerHTML = xhr.responseText;
            //   info.innerHTML = 
             relacion(docuBase);
          }
      }
      xhr.send()
}