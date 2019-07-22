<?php

namespace PokemonFinder;

class Pokemon {

    private $nombre;
    private $imagen;
    private $experienciaBase;
    private $altura;
    private $peso;

    function __construct($resultado) {
        $this->setNombre($resultado['name']);
        $this->imagen = $resultado['sprites']['front_default'];
        $this->experienciaBase = $resultado['base_experience'];
        $this->altura = $resultado['height'];
        $this->peso = $resultado['weight'];
    }

    function getNombre() {
        return $this->nombre;
    }

    function getImagen() {
        return $this->imagen;
    }

    function getExperienciaBase() {
        return $this->experienciaBase;
    }

    function getAltura() {
        return $this->altura;
    }

    function getPeso() {
        return $this->peso;
    }

    function setNombre($nombre) {
        $nombre = ucwords(str_replace('-', ' ', $nombre));
        $this->nombre = $nombre;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    function setExperienciaBase($experienciaBase) {
        $this->experienciaBase = $experienciaBase;
    }

    function setAltura($altura) {
        $this->altura = $altura;
    }

    function setPeso($peso) {
        $this->peso = $peso;
    }

}
