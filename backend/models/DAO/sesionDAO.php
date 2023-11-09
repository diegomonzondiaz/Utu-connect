<?php 
require_once __DIR__ . '/database/database.php';
require_once __DIR__.'/../respuesta.php';
session_start();
class SesionDAO {
    private $connection;

    public function __construct(){
        $this->connection = connection();
    }

    public function autentificar($usuario, $tipo_usuario, $password){
        $sql = "SELECT * FROM `usuario` WHERE ci IN(SELECT `ci_usuario` FROM `usuario_rol` WHERE `rol_usuario` = '$tipo_usuario') AND `ci` = $usuario AND `contraseña` = '$password'";
        $respuesta = $this->connection->query($sql);
        $dato = $respuesta->fetch_assoc();
        return $dato;
    }

    public function iniciarSesion($user,$tipo,$password){
        $respuesta = $this->autentificar($user, $tipo, $password);
        if($respuesta == null){
            return new Respuesta(false, "Datos incorrectos", null);
        }else{
            $_SESSION['sesion']=[
                "user" => $user,
                "tipo" => $tipo,
                "name" => $respuesta['nombre']
    
            ];

            return new Respuesta(true, "Datos correctos", null);
        }
    
    }
    
    public function cerrarSesion(){
        $_SESSION['sesion']=null;
        return new Respuesta(true,"sesion cerrada",null);
    }
    
    public function obtenerSesion(){
        if($_SESSION['sesion'] != null){
            return new Respuesta(true,"sesion encontrada",$_SESSION['sesion']);
        }else{
            return new Respuesta(false,"no se encontro sesion",null);
        }
       
    }
}
?>