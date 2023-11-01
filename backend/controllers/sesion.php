<?php 

require_once __DIR__ . '/../models/DAO/sesionDAO.php';

$peticion = $_GET['consulta'];
switch($peticion){
    case 'iniciarSesion':
        iniciarSesion();
        break;
    case 'cerrarSesion':
        cerrarSesion();
        break;
    case 'obtenerSesion':
        obtenerSesion();
        break;
    
}

function iniciarSesion(){
    $user = $_POST['user'];
    $password = $_POST['password'];
    $tipo = $_POST['tipo'];
    $sesionDAO = new SesionDAO();
    $respuesta = $sesionDAO->iniciarSesion($user, $tipo, $password);
    echo json_encode($respuesta);
}

function cerrarSesion(){
    $sesionDAO = new SesionDAO();
    $respuesta = $sesionDAO->cerrarSesion();
    echo json_encode($respuesta);
}

function obtenerSesion(){
    $sesionDAO = new SesionDAO();
    $respuesta = $sesionDAO->obtenerSesion();
    echo json_encode($respuesta);
}

?>