window.onload = function() {
    obtener();
    obtenerCategorias();
    let frm = document.querySelector('#crearPublicacion').onsubmit = function() {
        event.preventDefault();
        crearPublicacion(event.target);
    };
};

async function crearPublicacion(formulario) {
    let formdata = new FormData(formulario);
    let url = window.location.origin + "/UTU-connect/backend/controllers/publicacion.php?consulta=agregar";
    let config = {
        method: 'POST',
        body: formdata
    }
    let respuesta = await fetch(url, config);
    let datos = await respuesta.json();
    if(datos.success){
        alert(datos.mensaje);
        obtener();
    }else{
        alert(datos.mensaje);
    }
}

async function obtener(){
    let url = window.location.origin+"/UTU-connect/backend/controllers/publicacion.php?consulta=obtenerAdmin";
    let publicaciones = await fetch(url);
    let publicacionesDatos = await publicaciones.json();
    listar(publicacionesDatos.data);
}

function listar(publicaciones){
    let tabla = document.querySelector('#tabla');
    tabla.innerHTML = "";
    publicaciones.forEach(publicacion =>{
        let imagen = 'N/A';
        let documento = "N/A";
        if (publicacion.id_imagen != null) {
            imagen = `<img src="../../Storage/img/${publicacion.id_img}.${publicacion.tipo_imagen}" width="80px" width="auto">`;
        }
    
        if(publicacion.id_archivo != null){
            documento = `
                <a href="Storage/archivos/${publicacion.id_archivo}.${publicacion.tipo_archivo}" download="${publicacion.nombre_archivo}">${publicacion.nombre_archivo}</a>
            `;
        }
        tabla.innerHTML += `
        <tr>
           <td>${publicacion.id}</td>
           <td>${publicacion.titulo}</td>
           <td>${publicacion.rol_destino}</td>
           <td>${publicacion.contenido_texto}</td>
           <td>${imagen}</td>
           <td>${documento}</td>
           <td><button onclick="eliminar(${publicacion.id})"><i class="fa-solid fa-trash"></i> Eliminar</button></td>
           <td><button><i class="fa-solid fa-pencil"></i> Editar</button></td>
        </tr>
        `;
    });
}

async function eliminar(id){
    let url = window.location.origin+`/UTU-connect/backend/controllers/publicacion.php?consulta=eliminar&id=${id}`;
    let respuesta = await fetch(url);
    let respuestaDatos = await respuesta.json();
    if(respuestaDatos.success){
        alert(respuestaDatos.mensaje);
        obtener();
    }else{
        alert(respuestaDatos.mensaje);
    }
    obtener();
}

async function obtenerCategorias(){
    let url = window.location.origin+"/UTU-connect/backend/controllers/categoria.php?consulta=obtener";
    let respuesta = await fetch(url);
    let categorias = await respuesta.json();
    cargarCategorias(categorias);
}

function cargarCategorias(categorias) {
    let select = document.querySelector('#categorias');
    select.innerHTML = '';
    categorias.forEach((categoria)=>{
        select.innerHTML += `
            <option value="${categoria.nombre}">${categoria.nombre}</option>
        `;
    });
}