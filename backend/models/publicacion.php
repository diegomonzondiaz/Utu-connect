<?php 

class Publicacion {
    public $id;
    public $titulo;
    public $categoria;
    public $tipo;
    public $contenido_texto;
    public $contenido_img;
    public $contenido_archivo;

    public function __construct($id, $titulo, $categoria, $tipo, $contenido_texto, $contenido_img, $contenido_archivo){
        $this->id = $id;
        $this->titulo = $titulo;
        $this->categoria = $categoria;
        $this->tipo = $tipo;
        $this->contenido_img = $contenido_img;
        $this->contenido_texto = $contenido_texto;
        $this->contenido_archivo = $contenido_archivo;
    }
}

?>