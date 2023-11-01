window.onload = function() {
    let menuMobile = document.querySelector('#menu-mobile');
    let contenedor = document.querySelector('.contenedor_nav-mobile');

    let blur = document.querySelector('#blur').onclick = function() {
        cerrarMenu(contenedor);
    }

    let btnMenu = document.querySelector('#btn_menu').onclick = function() {
        abrirMenu(contenedor);
    }
    
}

function abrirMenu(contenedor){
    contenedor.classList.remove('menu-oculto')
    contenedor.classList.add('menu-visible');
}

function cerrarMenu(contenedor){
    contenedor.classList.add('menu-oculto')
    contenedor.classList.remove('menu-visible');
}

