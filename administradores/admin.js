import redirigir from "../login/js/redireccionamiento.js";

window.onload = function() {
    obtenerUsuario();
    document.querySelector('#cerrarSesion').onclick = function() {
        cerrarSesion();
    }
}

var obtenerUsuario = async ()=>{
    let url = window.location.origin+'/UTUConnect/backend/index.php?objetivo=sesion&request=obtenerSesion';
    let respuesta = await fetch(url);
    let respuestaDatos = await respuesta.json();
    let bienvenida = document.querySelector('#bienvenida');
    bienvenida.innerText = `Bienvenido/a ${respuestaDatos.data.name}`; 
    if (respuestaDatos.success){
        if (respuestaDatos.data.tipo!='admin'){
           redirigir('iniciarSesion');
        }
    }else{
        redirigir('iniciarSesion');
    }
 
    
}

async function cerrarSesion(){
    let url = window.location.origin+'/UTUConnect/backend/index.php?objetivo=sesion&request=cerrarSesion';
    let respuesta = await fetch(url);
    let datos = await respuesta.json();
    if (datos.success){
       redirigir('iniciarSesion');
    };
}

