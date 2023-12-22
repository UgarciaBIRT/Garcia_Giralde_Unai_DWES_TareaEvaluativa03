<?php

class Adicion extends Producto{

    private $idProductoOriginal;

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

    public function getIdProductoOriginal(){
        return $this->idProductoOriginal;
    }

    public function setIdProductoOriginal($idProductoOriginal){
        $this->idProductoOriginal = $idProductoOriginal;
    }

    public function __toString(){
        return "".$this->id." ".$this->nombre." ".$this->compania." ".$this->anio." ".$this->descripcion." ".$this->precio." ".$this->idProductoOriginal;
    }

}

?>