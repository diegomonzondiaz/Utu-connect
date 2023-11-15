<?php 
require_once __DIR__ . '/database/database.php';
class ArchivoDAO {
function agregarArchivo($archivo) {
    $connection = connection();
    $archName = $archivo['name'];
    $rutaTemporal =$archivo['tmp_name'];
    $nombreSinExtension = pathinfo($archName, PATHINFO_FILENAME);
    $extension = pathinfo($archName, PATHINFO_EXTENSION);
    $sql = "INSERT INTO documentos (tipo_archivo, nombre_archivo) VALUES('$extension', '$nombreSinExtension')";
    $respuesta = $connection->query($sql);
    if($respuesta){
        $id = $connection->insert_id;
        $nuevoNombre = "$id.$extension";
        move_uploaded_file($rutaTemporal, __DIR__."/../../../Storage/archivos/$nuevoNombre");
        return new Respuesta(true, $sql, $id);
         
    }else{
        return new Respuesta(false, $sql, $connection->error);
    }
    
}

}
?>