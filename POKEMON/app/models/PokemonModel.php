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
        $qres = $con->query('SELECT p.no, p.pic, p.name, p.hp, p.att, p.def, p.s_att, p.s_def, p.spd, type.type
        FROM pokemons p 
        LEFT JOIN pokemons_type t
        ON p.no = t.no
        LEFT JOIN type
        ON type.id_type = t.id_type');

        $id_temp = -1;
        $res = [];
        $types = [];
        foreach($qres as $row) {
            if($id_temp == $row['no']) {
                $types[] = $row['type'];
            } else {
                $types = [$row['type']];
            }
            $res[$row['no']] = [
                'pic' => $row['pic'],
                'name' => $row['name'],
                'hp' => $row['hp'],
                'att' => $row['att'],
                'def' => $row['def'],
                's_att' => $row['s_att'],
                's_def' => $row['s_def'],
                'spd' => $row['spd'],
                'types' => $types
            ];
            
            $id_temp = $row['no'];
        }

        return $res;
    }

    public function getPokemon($id) {
        $con = $this->con;
        $qres = $con->query("SELECT p.no, p.pic, p.name, p.hp, p.att, p.def, p.s_att, p.s_def, p.spd, type.type
        FROM pokemons p 
        LEFT JOIN pokemons_type t
        ON p.no = t.no
        LEFT JOIN type
        ON type.id_type = t.id_type  
        WHERE '$id' = p.no");

        $id_temp = -1;
        $res = [];
        $types = [];
        foreach($qres as $row) {
            if($id_temp == $row['no']) {
                $types[] = $row['type'];
            } else {
                $types = [$row['type']];
            }
            $res[$row['no']] = [
                'pic' => $row['pic'],
                'name' => $row['name'],
                'hp' => $row['hp'],
                'att' => $row['att'],
                'def' => $row['def'],
                's_att' => $row['s_att'],
                's_def' => $row['s_def'],
                'spd' => $row['spd'],
                'types' => $types
            ];
            
            $id_temp = $row['no'];
        }

        return $res;
    }
}