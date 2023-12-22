<?php
abstract class Producto
{
    private $id;
    private $nombre;
    private $compania;
    private $anio;
    private $descripcion;
    private $precio;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getCompania(){
        return $this->compania;
    }

    public function setCompania($compania){
        $this->compania = $compania;
    }
    
    public function getAnio(){
        return $this->anio;
    }

    public function setAnio($anio){
        $this->anio = $anio;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function getprecio(){
        return $this->precio;
    }

    public function setPrecio($precio){
        $this->precio = $precio;
    }
    
    public abstract function __toString();
}



?>