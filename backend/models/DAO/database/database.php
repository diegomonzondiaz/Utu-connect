<?php 
function connection () {
    $host = "localhost";
    $usuario = "root";
    $password = "";
    $bd = "BD_Proyecto";
    $puerto = 3306;
    $mysqli = new mysqli ($host, $usuario, $password, $bd, $puerto);
    return $mysqli;
}

?>