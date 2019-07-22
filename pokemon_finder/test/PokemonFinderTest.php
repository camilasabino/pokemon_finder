<?php

namespace PokemonFinder;

use PHPUnit\Framework\TestCase;
use PokemonFinder\PokemonApi;

final class PokemonFinderTest extends TestCase {
    
    function contienePokemons($resultados, $pokemons) {

        $resultados_test = array_filter($resultados, function($pokemon) use($pokemons) {
            if (in_array($pokemon->getNombre(), $pokemons)) {
                return true;
            }
            return false;
        });

        return count($resultados_test) == count($pokemons);
    }

    public function testBusquedaExactaCharizard() {
        $pokemonApi = new PokemonApi();
        $resultado = $pokemonApi->getPokemon('charizard');

        $this->assertEquals(count($resultado), 1);
        $this->assertEquals($resultado[0]->getAltura(), 17);
    }

    public function testBusquedaParcialCharizard() {
        $pokemonApi = new PokemonApi();
        $resultado = $pokemonApi->getAllAndFilter('charizard');

        $this->assertTrue($this->contienePokemons($resultado,
                        array('Charizard', 'Charizard Mega X', 'Charizard Mega Y')));
    }

    public function testBusquedaParcialBu() {
        $pokemonApi = new PokemonApi();
        $resultado = $pokemonApi->getAllAndFilter('bu');

        $this->assertTrue($this->contienePokemons($resultado,
                        array('Bulbasaur', 'Electabuzz', 'Tapu Bulu', 'Kabuto', 'Mimikyu Totem Busted')));
    }

    public function testBusquedaExactaCompuesta() {
        $pokemonApi = new PokemonApi();
        $resultado = $pokemonApi->getPokemon('pikachu belle');

        $this->assertEquals(count($resultado), 1);
        $this->assertEquals($resultado[0]->getExperienciaBase(), 112);
    }

    public function testBusquedaParcialCompuesta() {
        $pokemonApi = new PokemonApi();
        $resultado = $pokemonApi->getAllAndFilter('pikachu p');

        $this->assertEquals($resultado[0]->getNombre(), 'Pikachu Pop Star');
        $this->assertEquals($resultado[0]->getPeso(), 60);
    }

    public function testBusquedaCaseInsensitive() {
        $pokemonApi = new PokemonApi();
        $resultado = $pokemonApi->getPokemon('MeWTwo meGa y');

        $this->assertEquals($resultado[0]->getExperienciaBase(), 351);
    }

    public function testBusquedaExactaInexistente() {
        $pokemonApi = new PokemonApi();
        $resultado = $pokemonApi->getPokemon('piccachuh');

        $this->assertEmpty($resultado);
    }

    public function testBusquedaParcialInexistente() {
        $pokemonApi = new PokemonApi();
        $resultado = $pokemonApi->getAllAndFilter('abc xyz');

        $this->assertEmpty($resultado);
    }

}
