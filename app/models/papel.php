<?php

class Papel extends Producto {

    private $autor;
    private $tipo;

    public function __construct($id, $nombre, $compania, $anio, $descripcion, $precio, $autor, $tipo) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->compania = $compania;
        $this->anio = $anio;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->autor = $autor;
        $this->tipo = $tipo;
    }

    public function getAutor() {
        return $this->autor; 
    }
    public function setAutor($autor){
        $this->autor = $autor;
    }
    public function getTipo() {
        return $this->tipo; 
    }
    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function __toString(){
        return "".$this->id." ".$this->nombre." ".$this->compania." ".$this->anio." ".$this->descripcion." ".$this->precio." ".$this->autor." ".$this->tipo;
    }

}

?>