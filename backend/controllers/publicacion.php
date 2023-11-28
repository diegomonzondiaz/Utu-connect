<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/../models/publicacion.php';
require_once __DIR__ . '/../models/DAO/publicacionDAO.php';
require_once __DIR__ . '/../models/DAO/imagenDAO.php';
require_once __DIR__ . '/../models/DAO/archivoDAO.php';
require_once __DIR__ . '/../models/DAO/sesionDAO.php';
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
    case "obtenerPublicacionesRol":
        obtenerPublicacionesRol();
    break;
    case "obtenerAdmin":
        obtenerPublicacionesAdmin();
        break;
    case "obtenerCat":
        obtenerPublicacionesCategoria();
        break;
}

function agregarPublicacion(){
    $titulo = $_POST['titulo'];
    $categoria = $_POST['categoria'];
    $tipo = $_POST['tipo'];
    $contenido_img = $_FILES['contenido_img'];
    $contenido_texto = $_POST['contenido_texto'];
    $contenido_archivo = $_FILES['contenido_archivo'];
    $idImagen = "NULL";
    $idArchivo = "NULL";
    if(file_exists($contenido_img['tmp_name'])){
        $respuesta = (new imagenDAO())->agregarImagen($contenido_img);
        if($respuesta->success){
            $idImagen = $respuesta->data;
        }else{
            echo json_encode($respuesta);
            exit();
        }

    }
    if(file_exists($contenido_archivo['tmp_name'])){
        $respuesta = (new ArchivoDAO())->agregarArchivo($contenido_archivo);
        if($respuesta->success){
            $idArchivo = $respuesta->data;
        }else{
            echo json_encode($respuesta);
            exit();
        }
    }
    $publicacion = new Publicacion("NULL", $titulo, $categoria, $tipo, $contenido_texto, $idImagen, $idArchivo);
    $resultado = (new publicacionDAO())->agregarPublicacion($publicacion);
    echo json_encode($resultado);
}

function modificarPublicacion(){
    $id = $_POST['id_publicacion'];
    $titulo = $_POST['titulo'];
    $categoria = $_POST['categoria'];
    $tipo = $_POST['tipo'];
    $contenido_img = $_FILES['contenido_img'];
    $contenido_texto = $_POST['contenido_texto'];
    $contenido_archivo = $_FILES['contenido_archivo'];
    $idImagen = "NULL";
    $idArchivo = "NULL";
    if(file_exists($contenido_img['tmp_name'])){
        $respuesta = (new imagenDAO())->agregarImagen($contenido_img);
        if($respuesta->success){
            $idImagen = $respuesta->data;
        }else{
            echo json_encode($respuesta);
            exit();
        }

    }
    if(file_exists($contenido_archivo['tmp_name'])){
        $respuesta = (new ArchivoDAO())->agregarArchivo($contenido_archivo);
        if($respuesta->success){
            $idArchivo = $respuesta->data;
        }else{
            echo json_encode($respuesta);
            exit();
        }
    }
    $publicacion = new Publicacion($id, $titulo, $categoria, $tipo, $contenido_texto, $idImagen, $idArchivo);
    $resultado = (new publicacionDAO())->modificarPublicacion($publicacion);
    echo json_encode($resultado);
}

function eliminarPublicacion(){
    $id = $_GET['id'];
    $resultado = (new publicacionDAO())->eliminarPublicacion($id);
    echo json_encode($resultado);
}

function obtenerPublicacionesAdmin(){
    $publicaciones = (new publicacionDAO())->obtenerPublicacionesAdmin();
    echo json_encode($publicaciones);
}

function obtenerPublicacionesRol(){
    $respuesta = (new sesionDAO())->obtenerSesion();
    if($respuesta->success){
        $publicaciones = (new publicacionDAO())->obtenerPublicacionesRol($respuesta->data["tipo"]);
        echo json_encode($publicaciones);
    }else{
        $publicaciones = (new publicacionDAO())->obtenerPublicacionesRol("general");
        echo json_encode($publicaciones);
    }
    
}

function obtenerPublicacionesCategoria(){
    $respuesta = (new sesionDAO())->obtenerSesion();
    $categoria = $_GET['categoria'];
    if($respuesta->success){
        $publicaciones = (new publicacionDAO())->obtenerPublicacionesCategoria($categoria, $respuesta->data["tipo"]);
        echo json_encode($publicaciones);
    }else{
        $publicaciones = (new publicacionDAO())->obtenerPublicacionesCategoria($categoria, "General");
        echo json_encode($publicaciones);
    }
} 

?>