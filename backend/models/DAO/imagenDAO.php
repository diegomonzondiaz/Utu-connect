<?php 
require_once __DIR__ . '/database/database.php';
class imagenDAO {




function agregarImagen($imagen) {
    $connection = connection();
    $imagenName = $imagen['name'];
    $rutaTemporal =$imagen['tmp_name'];
    $extension = pathinfo($imagenName, PATHINFO_EXTENSION);
    $sql = `INSERT INTO imagen ('nombre') VALUES($imagenName)`;
    $respuesta = $connection->query($sql);
    if($respuesta){
        $id = $connection->insert_id;
        $nuevoNombre = "$id.$extension";
        $nuevaRespuesta = move_uploaded_file($rutaTemporal, __DIR__."/../../../assets/$nuevoNombre");
        if($nuevaRespuesta){
            return new Respuesta(true, null, $nuevoNombre);
        }
    }
}
function modificarImagen($imagen) {
    $connection = connection();
    $sql = `UPDATE INTO imagen set ('nombre') VALUES('$imagen')`;
    $respuesta = $connection->query($sql);
    return new Respuesta(true, null, $respuesta);
}
function eliminarImagen($publicacion) {
    $connection = connection();
    $sql = `DELETE * FROM publicacion WHERE id= $publicacion->id`;
    $respuesta = $connection->query($sql);
    return new Respuesta(true, null, $respuesta);
}
function obtenerImagen($publicacion) {
    $connection = connection();
    $sql = `SELECT * FROM publicacion`;
    $respuesta = $connection->query($sql);
    return new Respuesta(true, null, $respuesta);
}
}
?>