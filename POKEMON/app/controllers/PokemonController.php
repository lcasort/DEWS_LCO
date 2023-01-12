<?php

class PokemonController
{
    ///////////////////////////////////////////////////////////////////////////
    //////////////////////////////// VARIABLES ////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////
    

    ///////////////////////////////////////////////////////////////////////////
    /////////////////////////////// CONSTRUCTOR ///////////////////////////////
    ///////////////////////////////////////////////////////////////////////////
    public function __construct()
    {
        // TODO
    }

    ////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////// METHODS //////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    public function list($params)
    {
        $data = [];

        // Comprobamos si existe el modelo.
        if(is_file('./app/models/PokemonModel.php')) {
            require_once('./app/models/PokemonModel.php');
            // Instanciamos el modelo.
            $pokemonModel = new PokemonModel();
            // Llamamos a la función getAllPokemons.
            $data = $pokemonModel->getAllPokemons();
        } else {
            throw new Exception('No se encuentra el modelo.');
        }

        // Comprobamos si existe la vista.
        if(is_file('./app/views/listPokemons.tpl.php')) {
            // CON RUTA RELATIVA
            require_once('./app/views/listPokemons.tpl.php');

            // CON RUTA ABSOLUTA
            /*
            // Obtenemos la ruta absoluta del archivo que queremos cargar.
            $rute = RUTE_APP . '/views/listPokemons.tpl.php';
            // Instanciamos desde la ruta absoluta.
            require_once($rute);
            */
        } else {
            throw new Exception('No existe la vista solicitada.');
        }
        
    }

    public function view($params) {
        $data = [];

        // Comprobamos si existe el modelo.
        if(is_file('./app/models/PokemonModel.php')) {
            require_once('./app/models/PokemonModel.php');
            // Instanciamos el modelo.
            $pokemonModel = new PokemonModel();
            // Llamamos a la función getAllPokemons.
            $data = $pokemonModel->getPokemon($params['id']);
        } else {
            throw new Exception('No se encuentra el modelo.');
        }

        // Comprobamos si existe la vista.
        if(is_file('./app/views/pokemon.tpl.php')) {
            require_once('./app/views/pokemon.tpl.php');
        } else {
            throw new Exception('No existe la vista solicitada.');
        }
    }
}