<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$tipoConsulta = $_GET['objetivo'];

switch ($tipoConsulta) {
    case "usuario":
        require __DIR__ . ('/controllers/usuario.php');
    break;
    case "publicacion":
        require __DIR__ . ('/controllers/publicacion.php');
    break;
    case "categoria":
        require __DIR__ . ('/controllers/publicacion.php');
    break;
    case "rol":
        require __DIR__ . ('/controllers/rol.php');
    break;
    case 'sesion':
        require_once __DIR__ . ('/controllers/sesion.php');
        break;
}
?>