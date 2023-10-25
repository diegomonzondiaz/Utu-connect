<?php 
include 'database/database.php';
class UsuarioDAO {

    private $connection;

    public function __construct(){
        $this->connection = connection();
    }

public function agregarUsuario($usuario){
    $sql = `INSERT INTO usuario VALUES($usuario->ci, '$usuario->nombre', '$usuario->password')`;
    $respuesta = $this->connection->query($sql);
    return $respuesta;
}
public function modificarUsuario($usuario){
    $connection = connection();
    $sql = `UPDATE INTO usuario SET ($usuario->ci, '$usuario->nombre', '$usuario->password') where ci = '$usuario->ci'`;
    $respuesta = $this->connection->query($sql);
    return $respuesta;
}
public function eliminarUsuario($usuario){
    $connection = connection();
    $sql = `DELETE FROM usuario WHERE ci = '$usuario->ci'`;
    $respuesta = $this->connection->query($sql);
    return $respuesta;
}
public function obtenerUsuarios($usuario){
    $connection = connection();
    $sql = `SELECT * FROM usuario;`;
    $respuesta = $this->connection->query($sql);
    return $respuesta;
}

}
?>