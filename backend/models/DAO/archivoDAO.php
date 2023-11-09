<?php 
require_once __DIR__ . '/database/database.php';
class archivoDAO {



function agregarArchivo($archivo) {
    $connection = connection();
    $archivoName = $archivo['name'];
    $rutaTemporal =$archivo['tmp_name'];
    $extension = pathinfo($archivoName, PATHINFO_EXTENSION);
    $sql = `INSERT INTO archivo ('nombre') VALUES($archivoName)`;
    $respuesta = $connection->query($sql);
    if($respuesta){
        $id = $connection->insert_id;
        $nuevoNombre = "$id.$extension";
        $nuevaRespuesta = move_uploaded_file($rutaTemporal, __DIR__."/../../../assets/$nuevoNombre");
        if($nuevaRespuesta){
        return $nuevoNombre;
        }
    }
}
function modificarArchivo($archivo) {
    $connection = connection();
    $sql = `UPDATE INTO archivo set ('nombre') VALUES('$archivo')`;
    $respuesta = $connection->query($sql);
    return $respuesta;
}
function eliminarArchivo($archivo) {
    $connection = connection();
    $sql = `DELETE * FROM archivo WHERE id= $archivo->id`;
    $respuesta = $connection->query($sql);
    return $respuesta;
}
function obtenerArchivo($archivo) {
    $connection = connection();
    $sql = `SELECT * FROM publicacion`;
    $respuesta = $connection->query($sql);
    return $respuesta;
}
}
?>