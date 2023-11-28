window.onload = () => {
    let fromluario = document.querySelector('#formulario_registro').onsubmit = () => {
        event.preventDefault();
        registrar(event.target);
    }
}


var registrar = async (formulario)=>{
    let datos = new FormData(formulario);
    console.log(formulario.tipo);
    let url = window.location.origin+'/UTU-connect/backend/index.php?objetivo=usuario&consulta=agregar';
    let config = {
        method: 'POST',
        body: datos
    }
    let respuesta = await fetch(url, config);
    let respuestaDatos = await respuesta.json();
    if(respuestaDatos.success){
        alert(respuestaDatos.mensaje)
        window.location.href = "../../login/login.html";
    }else{
        console.log(respuestaDatos.mensaje);
        alert(respuestaDatos.mensaje);
    }
}

