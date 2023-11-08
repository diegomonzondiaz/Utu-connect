<?php 
require_once __DIR__ . '/../models/DAO/categoriaDAO.php';
$tipoConsulta = $_GET['consulta'];

switch ($tipoConsulta) {
    case "agregar":
        agregarCategoria();
    break;
    case "eliminar":
        eliminarCategoria();
    break;
    case "obtener":
        obtenerCategoria();
    break;
}

 function agregarCategoria(){
    $categoria = $_POST['categoria'];
    $resultado = (new categoriaDAO())->agregarCategoria($categoria);
    echo json_encode($resultado);
 }

 function eliminarCategoria(){
    $categoria = $_POST['categoria'];
    $resultado = (new categoriaDAO())->eliminarCategoria($categoria);
    echo json_encode($resultado);
 }
 
 function obtenerCategoria(){
    $resultado = (new categoriaDAO())->obtenerCategoria();
    echo json_encode($resultado);
 }


?>