<?php 
require_once __DIR__ . '/database/database.php';
class categoriaDAO {

function agregarCategoria($categoria){
    $connection = connection();
    $sql = `INSERT INTO categoria ('nombre') VALUES($categoria)`;
    $respuesta = $connection->query($sql);
    if($respuesta){
        return $respuesta;
    }
}

function eliminarCategoria($categoria){
    $connection = connection();
    $sql = `DELETE FROM categoria WHERE ('nombre') ='$categoria'`;
    $respuesta = $connection->query($sql);
    if($respuesta){
        return $respuesta;
    }
}
function obtenerCategoria(){
    $connection = connection();
    $sql = `SELECT * FROM categoria`;
    $respuesta = $connection->query($sql);
    if($respuesta){
        return $respuesta;
    }
}
}




?>