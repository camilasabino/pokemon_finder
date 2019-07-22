<?php

namespace PokemonFinder;

use GuzzleHttp\Client;

class Api {

    protected $uriBase;
    protected $recursoBase;

    function get($offset, $limit, $nombre = null) {

        $recurso = $this->recursoBase;

        if (!empty($nombre)) {
            $recurso .= $this->formatearInput($nombre) . '/';
        } else {
            $recurso .= "?offset=$offset&limit=$limit";
        }

        $client = new Client(['base_uri' => $this->uriBase, 'http_errors' => false]);
        $response = $client->request('GET', $recurso);
        $statuscode = $response->getStatusCode();

        if ($statuscode != 200) {
            $result = array();
        } else {
            $result = json_decode($response->getBody()->getContents(), true);
        }

        return $result;
    }

    function formatearInput($input) {
        return str_replace(' ', '-', strtolower($input));
    }

}
