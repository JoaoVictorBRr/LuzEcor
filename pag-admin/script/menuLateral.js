function abrirMenu(){
    const div = document.getElementById("categorias_barra_lateral");
    div.style.transition = "0.2s";
    div.style.width = "250px"
    div.style.paddingLeft = "20px"
    
}

function fecharMenu(){
    const div = document.getElementById("categorias_barra_lateral");
    div.style.width = "0px"
    div.style.paddingLeft = "0px"
 
    
}

