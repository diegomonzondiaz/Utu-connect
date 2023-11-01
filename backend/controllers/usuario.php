<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "/../models/usuario.php";
require_once __DIR__ . "/../models/DAO/usuarioDAO.php";

    $tipoConsulta = $_GET['consulta'];
    switch ($tipoConsulta) {
        case "agregar":
            agregarUsuario();
        break;
        case "modificar":
            modificarUsuario();
        break;
        case "eliminar":
            // eliminarUsuario();
        break;
    }


    function agregarUsuario(){
        $nombre = $_POST['nombre'];
        $password = $_POST['password'];
        $ci = $_POST['ci'];
        $tipo = $_POST['tipo'];
        $usuario = new usuario($ci, $nombre, $password, $tipo);
        $resultado = (new usuarioDAO())->agregarUsuario($usuario);   
       echo json_encode($resultado) ;
    }

    function modificarUsuario(){
        $nombre = $_POST['nombre'];
        $password = $_POST['password'];
        $ci = $_POST['ci'];
        $tipo = $_POST['tipo'];
        $usuario = new usuario($ci, $nombre, $password, $tipo);
        $resultado = (new usuarioDAO())->modificarUsuario($usuario);
        return $resultado;
    }

    function eliminarUsuarios(){
        $nombre = $_POST['nombre'];
        $password = $_POST['password'];
        $ci = $_POST['ci'];
        $tipo = $_POST['tipo'];
        $usuario = new usuario($ci, $nombre, $password, $tipo);
       // $resultado = new UsuarioDAO.eliminarUsuario($usuario);
       // return $resultado;
    }



?>