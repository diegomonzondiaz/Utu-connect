<?php 
require_once __DIR__ . '/database/database.php';
class publicacionDAO {

function agregarPublicacion($publicacion) {
    $connection = connection();
    $sql = "INSERT INTO publicaciones (titulo, categoria, rol_destino, contenido_texto, id_img, id_archivo) VALUES('$publicacion->titulo', '$publicacion->categoria','$publicacion->tipo', '$publicacion->contenido_texto',$publicacion->contenido_img, $publicacion->contenido_archivo)";
    $respuesta = $connection->query($sql);
    if($respuesta){
        return new Respuesta(true, null, $respuesta);

    }else{
        return new Respuesta(false, $sql, $connection->error);
    }
}

function modificarPublicacion($publicacion) {
    $connection = connection();
    $sql = "UPDATE INTO publicacion set ('titulo', 'categoria', 'tipo', 'contenido_texto', 'contenido_img', 'contenido_archivo') VALUES($publicacion->titulo, '$publicacion->contenido_texto', '$publicacion->contenido_archivo', '$publicacion->contenido_img', '$publicacion->categoria', '$publicacion->tipo') where id= $publicacion->id";
    $respuesta = $connection->query($sql);
    return new Respuesta(true, null, $respuesta);
}

function eliminarPublicacion($id) {
    $connection = connection();
    $sql = "DELETE FROM publicaciones WHERE id= $id";
    $respuesta = $connection->query($sql);
    if ($respuesta){
        return new Respuesta(true, "Publicacion Eliminada exitosamente", $respuesta);
    }else{
        return new Respuesta(false, "No se pudo eliminar", $respuesta);
    }
}

function obtenerPublicacionesRol($rol) {
    $connection = connection();
    $sql = "SELECT * FROM `publicaciones` LEFT JOIN imagenes ON publicaciones.id_img = imagenes.id_imagen LEFT JOIN documentos ON publicaciones.id_archivo = documentos.id_archivo WHERE publicaciones.rol_destino = '$rol'";
    $respuesta = $connection->query($sql);
    $publicaciones = $respuesta->fetch_all(MYSQLI_ASSOC);
    return new Respuesta(true, null, $publicaciones);
}
function obtenerPublicacionesAdmin() {
    $connection = connection();
    $sql = "SELECT * FROM `publicaciones` LEFT JOIN imagenes ON publicaciones.id_img = imagenes.id_imagen LEFT JOIN documentos ON publicaciones.id_archivo = documentos.id_archivo;";
    $respuesta = $connection->query($sql);
    $publicaciones = $respuesta->fetch_all(MYSQLI_ASSOC);
    return new Respuesta(true, null, $publicaciones);
}

}

?>