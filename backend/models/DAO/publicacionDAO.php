<?php 
include __DIR__ . 'database/database.php';
class publicacionDAO {

function agregarPublicacion($publicacion) {
    $connection = connection();
    $sql = `INSERT INTO publicacion ('titulo', 'categoria', 'tipo', 'contenido_texto', 'contenido_img', 'contenido_archivo') VALUES($publicacion->titulo, '$publicacion->contenido_texto', '$publicacion->contenido_archivo', '$publicacion->contenido_img' , '$publicacion->categoria', '$publicacion->tipo')`;
    $respuesta = $connection->query($sql);
    return new Respuesta(true, null, $respuesta);
}
function modificarPublicacion($publicacion) {
    $connection = connection();
    $sql = `UPDATE INTO publicacion set ('titulo', 'categoria', 'tipo', 'contenido_texto', 'contenido_img', 'contenido_archivo') VALUES($publicacion->titulo, '$publicacion->contenido_texto', '$publicacion->contenido_archivo', '$publicacion->contenido_img', '$publicacion->categoria', '$publicacion->tipo') where id= $publicacion->id`;
    $respuesta = $connection->query($sql);
    return new Respuesta(true, null, $respuesta);
}
function eliminarPublicacion($id) {
    $connection = connection();
    $sql = `DELETE * FROM publicacion WHERE id= $id`;
    $respuesta = $connection->query($sql);
    return new Respuesta(true, null, $respuesta);
}
function obtenerPublicacionesRol($rol) {
    $connection = connection();
    $sql = `SELECT * FROM publicacion WHERE rol = '$rol'`;
    $respuesta = $connection->query($sql);
    $publicaciones = $respuesta->fetch_all(MYSQLI_ASSOC);
    return new Respuesta(true, null, $publicaciones);
}
function obtenerPublicacionesAdmin() {
    $connection = connection();
    $sql = `SELECT * FROM publicacion`;
    $respuesta = $connection->query($sql);
    $publicaciones = $respuesta->fetch_all(MYSQLI_ASSOC);
    return new Respuesta(true, null, $publicaciones);
}

}

?>