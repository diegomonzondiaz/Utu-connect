window.onload = function() {
    obtenerUsuario();
    document.querySelector('#cerrarSesion').onclick = function() {
        cerrarSesion();
    }
    document.querySelector('#cerrarSesionMobile').onclick = function() {
        cerrarSesion();
    }
}

var obtenerUsuario = async ()=>{
    let url = window.location.origin+'/UTU-connect/backend/index.php?objetivo=sesion&consulta=obtenerSesion';
    let respuesta = await fetch(url);
    let respuestaDatos = await respuesta.json();
    let bienvenida = document.querySelector('#bienvenida'); 
    if (respuestaDatos.success){
        if (respuestaDatos.data.tipo!='Admin'){
           window.location.href = "../index.html";
        }else{
            bienvenida.innerText = `Bienvenido/a ${respuestaDatos.data.name}`;
        }
    }else{
        window.location.href = "../login/login.html";
    }
 
    
}

async function cerrarSesion(){
    let url = window.location.origin+'/UTU-connect/backend/index.php?objetivo=sesion&consulta=cerrarSesion';
    let respuesta = await fetch(url);
    let datos = await respuesta.json();
    if (datos.success){
       window.location.href = "../login/login.html";
    };
}

