window.onload = function() {
    document.querySelector("#formulario").onsubmit = function() {
        event.preventDefault();
        iniciarSesion(event.target);
    };
    obtenerUsuario();
    console.log(window.location.origin);
}

var iniciarSesion = async (formulario)=>{
    let datos = new FormData(formulario);
    let url = window.location.origin+'/UTU-connect/backend/index.php?objetivo=sesion&consulta=iniciarSesion';
    let config = {
        method: 'POST',
        body: datos
    }
    let respuesta = await fetch(url, config);
    let respuestaDatos = await respuesta.json();
    if(respuestaDatos.success){
        if(formulario.tipo.value == 'Admin'){
            window.parent.location.href = "../../administradores/adminPage.html";
        }else{
            window.parent.location.href = "../../index.html";
        }
    }else{
        console.log(respuestaDatos.mensaje);
        alert(respuestaDatos.mensaje);
    }
}

var obtenerUsuario = async ()=>{
    let url = window.location.origin+'/UTUConnect/backend/index.php?objetivo=sesion&consulta=obtenerSesion';
    let respuesta = await fetch(url);
    let respuestaDatos = await respuesta.json();
    console.log(respuestaDatos);
    if (respuestaDatos.success){
        if(respuestaDatos.data.tipo == 'admin'){
            window.location.href = "../../administradores/adminPage.html";
        }else{
            window.location.href = "../../index.html";
        }
    }
    
}