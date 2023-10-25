<?php 
include 'database/database.php';
class archivoDAO {


}
function agregarArchivo($archivo) {
    $connection = connection();
    $archivoName = $archivo['name'];
    $rutaTemporal =$archivo['tmp_name'];
    $extension = pathinfo($archivoName, PATHINFO_EXTENSION);
    $sql = `INSERT INTO archivo ('nombre') VALUES($archivoName)`;
    $respuesta = $connection->query($sql);
    $id = $connection->insert_id;
    $nuevoNombre = "$id.$extension";
    $nuevaRespuesta = move_uploaded_file($rutaTemporal, __DIR__."/../../../assets/$nuevoNombre");
    if($nuevaRespuesta){
        return $nuevoNombre;
    }
}
function modificarArchivo($imagen) {
    $connection = connection();
    $sql = `UPDATE INTO imagen set ('nombre') VALUES('$imagen')`;
    $respuesta = $connection->query($sql);
    return $respuesta;
}
function eliminarArchivo($publicacion) {
    $connection = connection();
    $sql = `DELETE * FROM publicacion WHERE id= $publicacion->id`;
    $respuesta = $connection->query($sql);
    return $respuesta;
}
function obtenerArchivo($publicacion) {
    $connection = connection();
    $sql = `SELECT * FROM publicacion`;
    $respuesta = $connection->query($sql);
    return $respuesta;
}

?>