<?php 

include 'models/DAO/sesionDAO.php';

session_start();
$peticion = $_GET['request'];
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
    $respuesta = $sesionDAO->autentificar($user, $tipo, $password);
    if($respuesta == null){
        echo json_encode('Error datos incorrectos');
    }else{
        $_SESSION['sesion']=[
            "user" => $user,
            "tipo" => $tipo,
            "name" => $respuesta['nombre']

        ];
        echo json_encode('Datos correctos');
    }

}

function cerrarSesion(){
    $_SESSION['sesion']=null;
}

function obtenerSesion(){
    echo json_encode($_SESSION['sesion']);
}

?>