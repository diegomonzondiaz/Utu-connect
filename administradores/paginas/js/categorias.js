window.onload = function() {
    obtener();
    let fromluario = document.querySelector('#formularioCrear').onsubmit = () => {
        event.preventDefault();
        agregar(event.target);
    }
}

async function obtener(){
    let url = window.location.origin+"/UTU-connect/backend/controllers/categoria.php?consulta=obtener";
    let categorias = await fetch(url);
    let categoriasDatos = await categorias.json();
    listar(categoriasDatos);
}

function listar(categorias){
    let tabla = document.querySelector('#tabla');
    tabla.innerHTML = "";
    categorias.forEach(categoria =>{
        tabla.innerHTML += `
        <tr>
           <td>${categoria.nombre}</td>
           <td><button id="eliminar" onclick="eliminar('${categoria.nombre}')"><i class="fa-solid fa-trash"></i> Eliminar</button></td>
        </tr>
        `;
    });
}

async function eliminar(categoria){
    let url = window.location.origin+`/UTU-connect/backend/controllers/categoria.php?consulta=eliminar&categoria=${categoria}`;
    let respuesta = await fetch(url);
    let respuestaDatos = await respuesta.json();
    console.log(respuestaDatos);
    if(respuestaDatos.success){
        alert(respuestaDatos.mensaje);
        obtener();
    }else{
        alert(respuestaDatos.mensaje);
    }
    obtener();
}

async function agregar(formulario){
    let url = window.location.origin+'/UTU-connect/backend/controllers/categoria.php?consulta=agregar';
    let categoriaDato = new FormData(formulario);
    let configuracion = {
        method: "POST",
        body:categoriaDato
      };
    let respuesta = await fetch(url, configuracion);
    let respuestaDatos = await respuesta.json();
    if(respuestaDatos.success){
        alert(respuestaDatos.mensaje);
        obtener();
    }else{
        alert(respuestaDatos.mensaje);
    }
}

