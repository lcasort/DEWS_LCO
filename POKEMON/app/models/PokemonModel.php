<?php

class PokemonModel
{
    ///////////////////////////////////////////////////////////////////////////
    //////////////////////////////// VARIABLES ////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////
    protected $con;

    ///////////////////////////////////////////////////////////////////////////
    /////////////////////////////// CONSTRUCTOR ///////////////////////////////
    ///////////////////////////////////////////////////////////////////////////
    public function __construct()
    {
        $pdo_data = 'mysql:host=' . DB_CRED['host'] . ';dbname=' . DB_CRED['dbname'];
        $opts = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        $this->con = new PDO($pdo_data, DB_CRED['user'], DB_CRED['psswd'], $opts);
    }

    ////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////// METHODS //////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    public function getAllPokemons() {
        $con = $this->con;
        $res = $con->query('SELECT p.id_pokemon, p.nombre, p.url_imagen, p.descripcion, tipos.nombre AS tipo_nombre 
        FROM pokemons p 
        LEFT JOIN tipos 
        ON p.tipo = tipos.id_tipo');

        return $res;
    }

    public function getPokemon($id) {
        $con = $this->con;
        $res = $con->query("SELECT p.id_pokemon, p.nombre, p.url_imagen, p.descripcion, tipos.nombre AS tipo_nombre 
        FROM pokemons p 
        LEFT JOIN tipos 
        ON p.tipo = tipos.id_tipo 
        WHERE '$id' = p.id_pokemon");

        return $res;
    }
}