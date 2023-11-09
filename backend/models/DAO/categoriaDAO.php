<?php 
require_once __DIR__ . '/database/database.php';
require_once __DIR__.'/../respuesta.php';
class categoriaDAO {

function agregarCategoria($categoria){
    $connection = connection();
    $sql = "INSERT INTO categorias(nombre) VALUES('$categoria')";
    $respuesta = $connection->query($sql);
    if ($respuesta){
        return new Respuesta(true, "Categoria agregada exitosamente", $respuesta);
    }else{
        return new Respuesta(true, "", $respuesta);
    }
}

function eliminarCategoria($categoria){
    $connection = connection();
    $sql = "DELETE FROM categorias WHERE nombre ='$categoria'";
    $respuesta = $connection->query($sql);
    return new Respuesta(true, "Categoria eliminada exitosamente", $sql);
}

function obtenerCategoria(){
    $connection = connection();
    $sql = "SELECT * FROM categorias";
    $respuesta = $connection->query($sql);
    $categorias = $respuesta->fetch_all(MYSQLI_ASSOC);
    if($respuesta){
        return new Respuesta(true, null, $categorias);
    }
}
}

?>