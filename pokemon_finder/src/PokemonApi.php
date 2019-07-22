<?php

namespace PokemonFinder;

class PokemonApi extends Api {

    function __construct() {
        $this->uriBase = "https://pokeapi.co/api/v2/";
        $this->recursoBase = "pokemon/";
    }

    /** Obtiene el recurso Pokemon con el nombre indicado. */
    function getPokemon($nombre) {
        $resultado = $this->get(null, null, $nombre);

        return empty($resultado) ? array() : array(new Pokemon($resultado));
    }

	/** Obtiene todos los Pokemons existentes, y luego filtra por coincidencia parcial en el nombre. */
    function getAllAndFilter($nombre) {
        $resultados = $this->get(0, 964)['results'];

        $resultados = array_filter($resultados, function($pokemon) use($nombre) {
            if (strpos($pokemon['name'], $this->formatearInput($nombre)) !== false) {
                return true;
            }
            return false;
        });

        $pokemons = array();

        set_time_limit(300); // Se establece un tiempo límite de búsqueda de 5 minutos.

        foreach ($resultados as $resultado) {
            $pokemon = $this->get(null, null, $resultado['name']);
            array_push($pokemons, new Pokemon($pokemon));
        }

        return $pokemons;
    }

    /** Obtiene una muestra de sesis Pokemons para mostrar al inicio. */
    function getMuestra() {
        $resultados = $this->get(6, 6)['results'];

        $pokemons = array();

        foreach ($resultados as $resultado) {
            $pokemon = $this->get(null, null, $resultado['name']);
            array_push($pokemons, new Pokemon($pokemon));
        }

        return $pokemons;
    }

}
