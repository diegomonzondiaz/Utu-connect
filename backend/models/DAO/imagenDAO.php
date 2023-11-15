<?php 
require_once __DIR__ . '/database/database.php';
class imagenDAO {
function agregarImagen($imagen) {
    $connection = connection();
    $imagenName = $imagen['name'];
    $rutaTemporal =$imagen['tmp_name'];
    $extension = pathinfo($imagenName, PATHINFO_EXTENSION);
    $sql = "INSERT INTO imagenes (tipo_imagen) VALUES('$extension')";
    $respuesta = $connection->query($sql);
    if($respuesta){
        $id = $connection->insert_id;
        $nuevoNombre = "$id.$extension";
        move_uploaded_file($rutaTemporal, __DIR__."/../../../Storage/img/$nuevoNombre");
        return new Respuesta(true, $sql, $id);
         
    }else{
        return new Respuesta(false, $sql, $connection->error);
    }
}

}
?>