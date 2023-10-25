<?php 
include 'database/database.php';
class SesionDAO {
    private $connection;

    public function __construct(){
        $this->connection = connection();
    }

    public function autentificar($usuario, $tipo_usuario, $password){
        $connection = connection();
        $sql = "SELECT * FROM `usuarios` WHERE ci IN(SELECT `ci_usuario` FROM `usuario_rol` WHERE `rol_usuario` = '$tipo_usuario') AND `ci` = $usuario AND `contraseña` = '$password'";
        $respuesta = $this->connection->query($sql);
        $dato = $respuesta->fetch_assoc();
        return $dato;
    }
}
?>