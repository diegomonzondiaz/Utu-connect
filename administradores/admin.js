window.onload = function() {
    obtenerUsuario();
    document.querySelector('#cerrarSesion').onclick = function() {
        cerrarSesion();
    }
}

var obtenerUsuario = async ()=>{
    let url = 'http://localhost/UTUConnect/backend/index.php?objetivo=sesion&request=obtenerSesion';
    let respuesta = await fetch(url);
    let respuestaDatos = await respuesta.json();
    if(respuestaDatos == null || respuestaDatos.tipo != 'admin') {
        window.location.href = '../login/login.html';
    }
}

var cerrarSesion = async ()=>{
    let url = 'http://localhost/UTUConnect/backend/index.php?objetivo=sesion&request=cerrarSesion';
    let respuesta = await fetch(url);
    obtenerUsuario();
}

