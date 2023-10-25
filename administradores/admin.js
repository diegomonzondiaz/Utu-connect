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
            window.location.href = '../login/login.html';
        }
    }else{
        window.location.href = '../login/login.html';
    }
 
    
}

async function cerrarSesion(){
    console.log('cerrarSesion');
    let url = window.location.origin+'/UTUConnect/backend/index.php?objetivo=sesion&request=cerrarSesion';
    let respuesta = await fetch(url);
    let datos = await respuesta.json();
    if (datos.success){
        window.location.href = '../index.html';
    };
}

