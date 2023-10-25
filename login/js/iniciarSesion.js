window.onload = function() {
    document.querySelector("#formulario").onsubmit = function() {
        event.preventDefault();
        iniciarSesion(event.target);
    };
}

var iniciarSesion = async (formulario)=>{
    let datos = new FormData(formulario);
    console.log(formulario.tipo);
    let url = 'http://localhost/UTUConnect/backend/index.php?objetivo=sesion&request=iniciarSesion';
    let config = {
        method: 'POST',
        body: datos
    }
    let respuesta = await fetch(url, config);
    let respuestaDatos = await respuesta.json();
    console.log(respuestaDatos);
    if(respuestaDatos === 'Datos correctos'){
        console.log(respuestaDatos);
        redirigir(formulario.tipo.value);
    }else{
        console.log(respuestaDatos);
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