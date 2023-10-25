<?php 
include "../models/usuario.php";
include "../models/DAO/usuarioDAO.php";

    $tipoConsulta = $_GET['consulta'];
    switch ($tipoConsulta) {
        case "agregar":
            agregarUsuario();
        break;
        case "modificar":
            modificarUsuario();
        break;
        case "eliminar":
            eliminarUsuario();
        break;
        case "obtener":
            obtenerUsuario();
        break;
    }


    function agregarUsuario(){
        $nombre = $_POST['nombre'];
        $password = $_POST['password'];
        $ci = $_POST['ci'];
        $usuario = new usuario($ci, $nombre, $password);
        $resultado = new usuarioDAO.agregarUsuario($usuario);   
        return $resultado;
    }
    function modificarUsuario(){
        $nombre = $_POST['nombre'];
        $password = $_POST['password'];
        $ci = $_POST['ci'];
        $usuario = new usuario($ci, $nombre, $password);
        $resultado = new usuarioDAO.modificarUsuario($usuario);
        return $resultado;
    }
    function eliminarUsuarios(){
        $nombre = $_POST['nombre'];
        $password = $_POST['password'];
        $ci = $_POST['ci'];
        $usuario = new usuario($ci, $nombre, $password);
        $resultado = new usuarioDAO.eliminarUsuario($usuario);
        return $resultado;
    }
    function obtenerUsuario(){
        $nombre = $_POST['nombre'];
        $password = $_POST['password'];
        $ci = $_POST['ci'];
        $usuario = new usuario($ci, $nombre, $password);
        $resultado = new usuarioDAO.obtenerUsuario($usuario);
        return $resultado;
    }

?>