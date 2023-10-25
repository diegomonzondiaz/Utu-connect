<?php 

class Usuario {
    public $ci;
    public $nombre;
    public $password;
    public $tipo;

    public function __construct($ci, $nombre, $password, $tipo){
        $this->ci = $ci;
        $this->nombre = $nombre;
        $this->password = $password;
        $this->tipo = $tipo;
    }
}

?>