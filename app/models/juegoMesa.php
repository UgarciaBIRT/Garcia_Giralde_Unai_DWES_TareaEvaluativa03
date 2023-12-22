<?php

class juegoMesa extends Producto{

    private $minJugadores;
    private $maxJugadores;

    public function __construct($id, $nombre, $compania, $anio, $descripcion, $minJugadores, $maxJugadores){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->compania = $compania;
        $this->anio = $anio;
        $this->descripcion = $descripcion;
        $this->minJugadores = (int) $minJugadores;
        $this->maxJugadores = (int) $maxJugadores;
    }

    public function getMaxJugadores(){
        return $this->maxJugadores;
    }

    public function setMaxJugadores($maxJugadores){
        $this->maxJugadores = (int) $maxJugadores;
    }

    public function getMinJugadores(){
        return $this->minJugadores;
    }

    public function setMinJugadores($minJugadores){
        $this->minJugadores = (int) $minJugadores;
    }

    public function __toString(){
        return "".$this->id." ".$this->nombre." ".$this->compania." ".$this->anio." ".$this->descripcion;
    }
}

?>