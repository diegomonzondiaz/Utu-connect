window.onload = function() {
    let menuMobile = document.querySelector('#menu-mobile');
    let contenedor = document.querySelector('.contenedor_nav-mobile');
    let blur = document.querySelector('#blur').onclick = function() {
        cerrarMenu(contenedor);
    }
    let btnMenu = document.querySelector('#btn_menu').onclick = function() {
        abrirMenu(contenedor);
    }

    obtenerPublicaciones();
    obtenerSesion();
    
}

function abrirMenu(contenedor){
    contenedor.classList.remove('menu-oculto')
    contenedor.classList.add('menu-visible');
}

function cerrarMenu(contenedor){
    contenedor.classList.add('menu-oculto')
    contenedor.classList.remove('menu-visible');
}

var obtenerSesion = async ()=>{
    let url = window.location.origin+'/UTUConnect/backend/index.php?objetivo=sesion&request=obtenerSesion';
    let respuesta = await fetch(url);
    let respuestaDatos = await respuesta.json();
    console.log(respuestaDatos);
    if (respuestaDatos.success){
        document.querySelector('#sesiarInicion').style.display = 'none';
        document.querySelector('#inicionSesiada').style.display = 'none';
        document.querySelector('#nombre-sesion').innerHTML = `
            Bienvenido/a ${respuestaDatos.data.name}
        `;

        document.querySelector('.titulo').innerHTML = `
            Ver Publicaciones <br> <small>${respuestaDatos.data.tipo}</small>
        `
        document.querySelector('#cerrarSesion').style.display = 'block';
        document.querySelector('#cerrarSesionMobile').style.display = 'block';

    }else{
       document.querySelector('#sesiarInicion').style.display = 'block';
       document.querySelector('#inicionSesiada').style.display = 'block';
       document.querySelector('.titulo').innerHTML = `
            Ver Publicaciones <br> <small>(General)</small>
        `;

        document.querySelector('#cerrarSesion').style.display = 'none';
        document.querySelector('#cerrarSesionMobile').style.display = 'none';

    }
}

async function obtenerPublicaciones(){
    let url = window.location.origin + '/UTU-connect/backend/index.php?objetivo=publicacion&consulta=obtenerPublicacionesRol';
    let respuesta = await fetch(url);
    let datos = await respuesta.json();
    if(datos.success){
        console.log(datos.data);
        mostrarPublicaiciones(datos.data);
    }
}

async function cerrarSesion(){
    let url = window.location.origin + '/UTU-connect/backend/index.php?objetivo=sesion&consulta=cerrarSesion';
    let respuesta = await fetch(url);
    let datos = await respuesta.json();
    if(datos.success){
        console.log(datos.data);
        window.location.reload();
    }
}

function mostrarPublicaiciones(publicaciones) {
   let contenedor = document.querySelector('.contenedor_publicaciones');
   contenedor.innerHTML = '';
   publicaciones.forEach(publicacion => {
    contenedor.innerHTML += `
        <div class="${publicacion.contenido_img != '' ? "publicacionConImagen" : "publicacionSinImagen"}">
            <h3 class="titulo_publicacion">${publicacion.titulo}</h3>
            <div class="img_publicacion">
                ${publicacion.contenido_img != "" ? '<img src='+publicacion.contenido_img+' alt="">' : ''}
            </div>
            <div class="contenido_publicacion">
                <p>
                    ${publicacion.contenido_texto}    
                </p>
            </div>
        </div>
    `
   }); 
}

