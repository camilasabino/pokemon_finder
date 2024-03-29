<?php

namespace PokemonFinder;

require 'vendor/autoload.php';

use PokemonFinder\PokemonApi;

// Se instancia una API Pokemon.
$pokemonApi = new PokemonApi();

// Búsqueda de Pokemons según término ingresado.
if (!empty($_GET['busqueda'])) {
    $nombre = limpiarInput($_GET['busqueda']);

    if (isset($_GET['check-exacta'])) {
        $pokemons = $pokemonApi->getPokemon($nombre);
    } else {
        $pokemons = $pokemonApi->getAllAndFilter($nombre);
    }
} else {
    $pokemons = $pokemonApi->getMuestra();
}

function limpiarInput($datos) {
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}

require 'views/index.view.php';
?>