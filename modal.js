
const modal=(contenedor , contenido , boton)=>{

    document.addEventListener("click",(e)=>{
        e.preventDefault();
        if(e.target.matches(boton) || e.target.matches(`${boton} *`)){
            document.querySelector(contenido).classList.add("transalate");

            setTimeout(()=>{
                document.querySelector(contenedor).classList.add("desaparecer");
            },1000)
        }
    })
}
export default modal;