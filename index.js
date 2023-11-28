window.onload = function() {
    let menuMobile = document.querySelector('#menu-mobile');
    let contenedor = document.querySelector('.contenedor_nav-mobile');
    let blur = document.querySelector('#blur').onclick = function() {
        cerrarMenu(contenedor);
    }
    let btnMenu = document.querySelector('#btn_menu').onclick = function() {
        abrirMenu(contenedor);
    }
    let selectElement = document.getElementById("categorias");
    selectElement.addEventListener("change", function() {
        let valorSeleccionado = selectElement.value;
        filtrar(`${valorSeleccionado}`);
    });
    obtenerSesion();
    obtenerPublicaciones();
    obtenerCategorias();
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
    let url = window.location.origin+'/UTU-connect/backend/index.php?objetivo=sesion&consulta=obtenerSesion';
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
            Ver Publicaciones <br> <small>(${respuestaDatos.data.tipo})</small>
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
    console.log(datos.data);
    if(datos.success){
        mostrarPublicaiciones(datos.data);
    }else{
       alert(datos.mesnaje);
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
    let imagen = '';
    let documento = "";
    if (publicacion.id_imagen != null) {
        imagen = `<div class="img_container"><img src="Storage/img/${publicacion.id_imagen}.${publicacion.tipo_imagen}"></div>`;
    }

    if(publicacion.id_archivo != null){
        documento = `
        <div class = "documento">
            <a href="Storage/archivos/${publicacion.id_archivo}.${publicacion.tipo_archivo}" download="${publicacion.nombre_archivo}">Descargar: ${publicacion.nombre_archivo}</a>
        </div>`;
    }
    contenedor.innerHTML += `
        <div class="${publicacion.contenido_img != '' ? "publicacionConImagen" : "publicacionSinImagen"}">
            <div class="cabecera_publi"><h3 class="titulo_publicacion">${publicacion.titulo}</h3> <p>${publicacion.categoria}</p></div>
            ${imagen}
            
            <div class="contenido_publicacion">
                <p>
                    ${publicacion.contenido_texto}    
                </p>
            </div>
            ${documento}
        </div>
    `
   }); 
}

async function filtrar(categoria){
    let url = window.location.origin+`/UTU-connect/backend/controllers/publicacion.php?consulta=obtenerCat&categoria=${categoria}`;
    let respuesta = await fetch(url);
    let datos = await respuesta.json();
    console.log(datos);
    if(categoria != "Todas"){
        if(datos.data.length > 0){
            mostrarPublicaiciones(datos.data);
        }else{
            alert("No hay publicaiciones de esta categoría");
        }
    }else{
        obtenerPublicaciones();
    }
}

async function obtenerCategorias(){
    let url = window.location.origin+"/UTU-connect/backend/controllers/categoria.php?consulta=obtener";
    let categorias = await fetch(url);
    let categoriasDatos = await categorias.json();
    listar(categoriasDatos);
}

function listar(categorias){
    let select = document.querySelector('#categorias');
    select.innerHTML = "";
    select.innerHTML += '<option value="Todas">Todas</option>';

    categorias.forEach(categoria =>{
        select.innerHTML += `
            <option value="${categoria.nombre}">${categoria.nombre}</option>
        `;   
    });
}