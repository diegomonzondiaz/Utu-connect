<?php 
include '../models/publicacion.php';
include '../models/DAO/publicacionDAO.php';
include '../models/DAO/imagenDAO.php';
include '../models/DAO/archivoDAO.php';
$tipoConsulta = $_GET['consulta'];

switch ($tipoConsulta) {
    case "agregar":
        agregarPublicacion();
    break;
    case "modificar":
        modificarPublicacion();
    break;
    case "eliminar":
        eliminarPublicacion();
    break;
    case "obtenerRol":
        obtenerPublicacionesRol();
    break;
    case "obtenerAdmin":
        obtenerPublicacionesAdmin();
        break;
}

function agregarPublicacion(){
    $titulo = $_POST['titulo'];
    $categoria = $_POST['categoria'];
    $tipo = $_POST['tipo'];
    $contenido_img = $_FILES['contenido_img'];
    $contenido_texto = $_POST['contenido_texto'];
    $contenido_archivo = $_FILES['contenido_archivo'];
    if($contenido_img){
        $imagen = new imagenDAO.agregarImagen($contenido_img);
    }
    if($contenido_archivo){
        $archivo = new archivoDAO.agregarArchivo($contenido_archivo);
    }
    $publicacion = new publicacion(null, $titulo, $categoria, $tipo, $archivo, $imagen, $contenido_texto);
    $resultado = new publicacionDAO.agregarPublicacion($publicacion);
    return $resultado;
}
function modificarPublicacion(){
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $categoria = $_POST['categoria'];
    $tipo = $_POST['tipo'];
    $contenido_img = $_POST['contenido_img'];
    $contenido_texto = $_POST['contenido_texto'];
    $contenido_archivo = $_POST['contenido_archivo'];
    $publicacion = new publicacion($id, $titulo, $categoria, $tipo, $contenido_archivo, $contenido_img, $contenido_texto);
    $resultado = new publicacionDAO.modificarPublicacion($publicacion);
    return $resultado;
}
function eliminarPublicacion(){
    $id = $_POST['id'];
    $resultado = new publicacionDAO.eliminarPublicacion($id);
    return $resultado;
}
function obtenerPublicacionesAdmin(){
}
function obtenerPublicacionesRol(){
    $rol = $_POST['rol'];
    $publicaciones = new publicacionDAO.obtenerPublicacionesRol($rol);
}
?>