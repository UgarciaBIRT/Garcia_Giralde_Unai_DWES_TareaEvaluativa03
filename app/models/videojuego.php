<?php

class videojuego extends Producto{

    private $distribuidora;
    private $genero;
    private $plataformas;

    public function __construct($id, $nombre, $compania, $anio, $descripcion, $precio, $distribuidora, $genero, $plataformas){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->compania = $compania;
        $this->anio = $anio;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->distribuidora = $distribuidora;
        $this->genero = $genero;
        $this->plataformas = $plataformas;
    }

    public function getDistribuidora() {
         return $this->distribuidora; 
    }

    public function setDistribuidora($distribuidora){
        $this->distribuidora = $distribuidora;
    }

    public function getGenero(){
        return $this->genero;
    }

    public function setGenero($genero){
        $this->genero = $genero;
    }

    public function getPlataformas(){
        return $this->plataformas;
    }

    public function __toString(){
        return "".$this->id." ".$this->nombre." ".$this->compania." ".$this->anio." ".$this->descripcion." ".$this->precio." ".$this->distribuidora." ".$this->genero." ".$this->plataformas;
    }
}

?>