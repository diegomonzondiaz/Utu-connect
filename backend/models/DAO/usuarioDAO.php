<?php 
require_once __DIR__. '/database/database.php';
require_once __DIR__.'/../usuario.php';
require_once __DIR__.'/../respuesta.php';
class UsuarioDAO {

    private $connection;

    public function __construct(){
        $this->connection = connection();
    }

public function agregarUsuario($usuario){
    $sql = "INSERT INTO usuario VALUES($usuario->ci, '$usuario->nombre', '$usuario->password');";
    $respuesta = $this->connection->query($sql);
    if($respuesta){
        $sql2="INSERT INTO usuario_rol VALUES($usuario->ci, '$usuario->tipo');";
        $respuesta = $this->connection->query($sql2);
        if($respuesta){
            return new Respuesta(true, 'usuario creado', null);
        }else{
            $sql3 = "DELETE FROM `usuario` WHERE `ci`=$usuario->ci";
            $respuesta = $this->connection->query($sql3);
            return new Respuesta(false, 'rol no existe',null);
        }
            
    }else{
        return new Respuesta(false, 'usuario existe', null);
    }
    return $respuesta;
}
public function modificarUsuario($usuario){
    $sql = `UPDATE INTO usuario SET ($usuario->ci, '$usuario->nombre', '$usuario->password') where ci = '$usuario->ci'`;
    $respuesta = $this->connection->query($sql);
    return $respuesta;
}
public function eliminarUsuario($usuario){
    $sql = `DELETE FROM usuario WHERE ci = '$usuario->ci'`;
    $respuesta = $this->connection->query($sql);
    return $respuesta;
}
public function obtenerUsuarios($usuario){
    $sql = `SELECT * FROM usuario;`;
    $respuesta = $this->connection->query($sql);
    return $respuesta;
}

}
?>