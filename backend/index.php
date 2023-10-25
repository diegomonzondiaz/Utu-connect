<?php include("Access-Control-Allow-Origin: *");
$tipoConsulta = $_GET['objetivo'];

switch ($tipoConsulta) {
    case "usuario":
        include('./controllers/usuario.php');
    break;
    case "publicacion":
        include('./controllers/publicacion.php');
    break;
    case "categoria":
        include('./controllers/publicacion.php');
    break;
    case "rol":
        include('./controllers/rol.php');
    break;
    case 'sesion':
        include('./controllers/sesion.php');
        break;
}
?>