window.onload = function() {
    obtener();
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
           <td><button onclick="abrirEdicion()"><i class="fa-solid fa-pencil"></i> Editar</button></td>
        </tr>
        `;
    });
}

async function eliminar(categoria){
    console.log(categoria);
    let url = window.location.origin+'/UTU-connect/backend/controllers/categoria.php?consulta=eliminar';
    let categoriaJSON = JSON.stringify(categoria);
    let configuracion = {
        method: "POST",
        body:{
          categoria: categoriaJSON
        }
      };
    console.log(configuracion);
    let respuesta = await fetch(url, configuracion);
    console.log(respuesta.json());
    //window.location.reload();
}
