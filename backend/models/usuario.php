<?php 

class Usuario {
    public $ci;
    public $nombre;
    public $password;

    public function __construct($ci, $nombre, $password){
        $this->ci = $ci;
        $this->nombre = $nombre;
        $this->password = $password;
    }
}

?>