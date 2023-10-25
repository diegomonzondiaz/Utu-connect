<?php 
include 'database/database.php';
class publicacionDAO {

function agregarPublicacion($publicacion) {
    $connection = connection();
    $sql = `INSERT INTO publicacion ('titulo', 'categoria', 'tipo', 'contenido_texto', 'contenido_img', 'contenido_archivo') VALUES($publicacion->titulo, '$publicacion->contenido_texto', '$publicacion->contenido_archivo', '$publicacion->contenido_img' , '$publicacion->categoria', '$publicacion->tipo')`;
    $respuesta = $connection->query($sql);
    return $respuesta;
}
function modificarPublicacion($publicacion) {
    $connection = connection();
    $sql = `UPDATE INTO publicacion set ('titulo', 'categoria', 'tipo', 'contenido_texto', 'contenido_img', 'contenido_archivo') VALUES($publicacion->titulo, '$publicacion->contenido_texto', '$publicacion->contenido_archivo', '$publicacion->contenido_img', '$publicacion->categoria', '$publicacion->tipo') where id= $publicacion->id`;
    $respuesta = $connection->query($sql);
    return $respuesta;
}
function eliminarPublicacion($publicacion) {
    $connection = connection();
    $sql = `DELETE * FROM publicacion WHERE id= $publicacion->id`;
    $respuesta = $connection->query($sql);
    return $respuesta;
}
function obtenerPublicacion($publicacion) {
    $connection = connection();
    $sql = `SELECT * FROM publicacion`;
    $respuesta = $connection->query($sql);
    return $respuesta;
}

}

?>