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
        // Guardamos en $con la conexión con la base de datos.
        $con = $this->con;
        // Hacemos la consulta a la base de datos.
        $qres = $con->query('SELECT p.no, p.pic, p.name, p.hp, p.att, p.def, p.s_att, p.s_def, p.spd, type.type
        FROM pokemons p 
        LEFT JOIN pokemons_type t
        ON p.no = t.no
        LEFT JOIN type
        ON type.id_type = t.id_type');

        // Usamos un id temporal en el que iremos guardando e id del pokémon
        // que estamos tratando.
        $id_temp = -1;
        // Creamos un array vacío que será el que devolveremos.
        $res = [];
        // Creamos un array vacío en el que guardaremos los tipos
        // correspondientes al pokémon que estemos tratando.
        $types = [];
        // Recorremos el resultado de la consulta a la base de datos...
        foreach($qres as $row) {
            // Si es el mismo pokémon añadimos a tipos y si no iniciamos el
            // array de tipos con el primer tipo que aparezca.
            if($id_temp == $row['no']) {
                $types[] = $row['type'];
            } else {
                $types = [$row['type']];
            }
            // Guardamos en res los datos del pokémon indexados por su id.
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
            
            // Actualizamos el id temporal.
            $id_temp = $row['no'];
        }

        return $res;
    }

    public function getPokemon($id) {
        // Guardamos en $con la conexión con la base de datos.
        $con = $this->con;
        // Hacemos la consulta a la base de datos.
        $qres = $con->query("SELECT p.no, p.pic, p.name, p.hp, p.att, p.def, p.s_att, p.s_def, p.spd, type.type
        FROM pokemons p 
        LEFT JOIN pokemons_type t
        ON p.no = t.no
        LEFT JOIN type
        ON type.id_type = t.id_type  
        WHERE '$id' = p.no");

        // Si no existe el pokemon introducido, lanzamos una excepción.
        if($qres->rowCount() === 0) {
            throw new Exception('No existe el pokemon.');
        }

        // Usamos un id temporal en el que iremos guardando e id del pokémon
        // que estamos tratando.
        $id_temp = -1;
        // Creamos un array vacío que será el que devolveremos.
        $res = [];
        // Creamos un array vacío en el que guardaremos los tipos
        // correspondientes al pokémon que estemos tratando.
        $types = [];
        // Recorremos el resultado de la consulta a la base de datos...
        foreach($qres as $row) {
            // Si es el mismo pokémon añadimos a tipos y si no iniciamos el
            // array de tipos con el primer tipo que aparezca.
            if($id_temp == $row['no']) {
                $types[] = $row['type'];
            } else {
                $types = [$row['type']];
            }
            // Guardamos en res los datos del pokémon indexados por su id.
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
            
            // Actualizamos el id temporal.
            $id_temp = $row['no'];
        }

        return $res;
    }

    public function getAllTypePokemons($type) {
        // Guardamos en $con la conexión con la base de datos.
        $con = $this->con;
        // Hacemos la consulta a la base de datos para traernos todos los
        // pokemons del tipo seleccionado.
        $qres = $con->query("SELECT p.no
        FROM pokemons p 
        LEFT JOIN pokemons_type t
        ON p.no = t.no
        LEFT JOIN type
        ON type.id_type = t.id_type
        WHERE '$type' = type.type");

        // Si no existe el pokemon introducido, lanzamos una excepción.
        if($qres->rowCount() === 0) {
            throw new Exception('No existe ese tipo pokemon.');
        }
        
        // Guardamos todos los resultados de la consulta en $selType.
        $selType = $qres->fetchAll();
        // Guardamos en $keys un array con los ids de los pokemons del tipo a
        // consultar.
        $keys = array_map(fn($p)=>$p['no'], $selType);
        // Transformamos el array en una cadena separada por comas.
        $keys = implode(',', array_values($keys));

        // Realizamos una nueva consulta a la base de datos en la que nos
        // traemos todos los pokemos con uno de los ids obtenidos previamente
        // para obtener todos los tipos de cada pokemon que cumpla ser del
        // tipo seleccionado.
        $fres = $con->query("SELECT p.no, p.pic, p.name, p.hp, p.att, p.def, p.s_att, p.s_def, p.spd, type.type
        FROM pokemons p 
        LEFT JOIN pokemons_type t
        ON p.no = t.no
        LEFT JOIN type
        ON type.id_type = t.id_type
        WHERE p.no IN ($keys)");

        // Usamos un id temporal en el que iremos guardando e id del pokémon
        // que estamos tratando.
        $id_temp = -1;
        // Creamos un array vacío que será el que devolveremos.
        $res = [];
        // Creamos un array vacío en el que guardaremos los tipos
        // correspondientes al pokémon que estemos tratando.
        $types = [];
        // Recorremos el resultado de la consulta a la base de datos...
        foreach($fres as $row) {
            // Si es el mismo pokémon añadimos a tipos y si no iniciamos el
            // array de tipos con el primer tipo que aparezca.
            if($id_temp == $row['no']) {
                $types[] = $row['type'];
            } else {
                $types = [$row['type']];
            }
            // Guardamos en res los datos del pokémon indexados por su id.
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
            
            // Actualizamos el id temporal.
            $id_temp = $row['no'];
        }

        return $res;
    }
}