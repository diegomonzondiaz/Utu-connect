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
    let url = window.location.origin+'/UTUConnect/backend/index.php?objetivo=sesion&request=iniciarSesion';
    let config = {
        method: 'POST',
        body: datos
    }
    let respuesta = await fetch(url, config);
    let respuestaDatos = await respuesta.json();
    console.log(respuestaDatos);
    if(respuestaDatos.success){
        redirigir(formulario.tipo.value);
    }else{
        console.log(respuestaDatos.mensaje);
        alert(respuestaDatos.mensaje);
    }
}

let redirigir = (tipo) => {
    switch(tipo){
        case 'alumno':
            window.parent.location.href = '../../alumnos/alumnos-page.html';
        break;
        case 'admin':
            window.parent.location.href = '../../administradores/adminPage.html';
            break;
        case 'docente':
            window.parent.location.href = '../../docentes/docentes-page.html';
            break;
    }
}


var obtenerUsuario = async ()=>{
    let url = window.location.origin+'/UTUConnect/backend/index.php?objetivo=sesion&request=obtenerSesion';
    let respuesta = await fetch(url);
    let respuestaDatos = await respuesta.json();
    console.log(respuestaDatos);
    if (respuestaDatos.success){
        redirigir(respuestaDatos.data.tipo);
    }
    
}