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
    public function getAllPokemons()
    {
        // Guardamos en $con la conexión con la base de datos.
        $con = $this->con;
        // Hacemos la consulta a la base de datos.
        $qres = $con->query('SELECT p.id, p.no, p.pic, p.name, p.hp, p.att, p.def, p.s_att, p.s_def, p.spd, type.type
        FROM pokemons p 
        LEFT JOIN pokemons_type t
        ON p.id = t.id
        LEFT JOIN type
        ON type.id_type = t.id_type
        ORDER BY p.no');

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
            if($id_temp == $row['id']) {
                $types[] = $row['type'];
            } else {
                $types = [$row['type']];
            }
            // Guardamos en res los datos del pokémon indexados por su id.
            $res[$row['id']] = [
                'no' => $row['no'],
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
            $id_temp = $row['id'];
        }

        return $res;
    }

    public function getAllPokemonsFromAPI($offset)
    {
        $url = 'https://pokeapi.co/api/v2/pokemon/?limit=15&offset='.$offset;
        $allData = $this->callAPI($url);
        foreach ($allData['results'] as $key => $value) {
            $dataPokemon = $this->callAPI($value['url']);
            $types = [];
            foreach ($dataPokemon['types'] as $key => $value) {
                $types[] = ucfirst($value['type']['name']);
            }
            $stats = [];
            foreach ($dataPokemon['stats'] as $key => $value) {
                $stats[$value['stat']['name']] = $value['base_stat'];
            }
            $data[] = array(
                'no' => $dataPokemon['id'],
                'name' => ucfirst($dataPokemon['name']),
                'pic' => $dataPokemon['sprites']['front_default'],
                'hp' => $stats['hp'],
                'att' => $stats['attack'],
                'def' => $stats['defense'],
                's_att' => $stats['special-attack'],
                's_def' => $stats['special-defense'],
                'spd' => $stats['speed'],
                'types' => $types
            );
        }

        return $data;
    }

    private function callAPI($url)
    {
        // Abrimos conexión cURL y la almacenamos en la variable $ch.
        $ch = curl_init();
        // Configuramos mediante CURLOPT_URL la URL de nuestra API.
        curl_setopt($ch, CURLOPT_URL, $url);
        //Abrimos conexión cURL y la almacenamos en la variable $ch.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // 0 o 1, indicamos que no queremos al Header en nuestra respuesta.
        curl_setopt($ch, CURLOPT_HEADER, 0);
        // Ejecuta la petición HTTP y almacena la respuesta en la variable $data.
        $data = curl_exec($ch);
        // Cerramos la conexión cURL.
        curl_close($ch);

        // Pasamos los datos obtenidos (string) a array.
        $data = json_decode($data,true);

        return $data;
    }

    public function getPokemon($id) {
        // Guardamos en $con la conexión con la base de datos.
        $con = $this->con;
        // Hacemos la consulta a la base de datos.
        $qres = $con->query("SELECT p.id, p.no, p.pic, p.name, p.hp, p.att, p.def, p.s_att, p.s_def, p.spd, type.type
        FROM pokemons p 
        LEFT JOIN pokemons_type t
        ON p.id = t.id
        LEFT JOIN type
        ON type.id_type = t.id_type  
        WHERE '$id' = p.id");

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
            if($id_temp == $row['id']) {
                $types[] = $row['type'];
            } else {
                $types = [$row['type']];
            }
            // Guardamos en res los datos del pokémon indexados por su id.
            $res[$row['id']] = [
                'no' => $row['no'],
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
            $id_temp = $row['id'];
        }

        return $res;
    }

    public function getPokemonAPI($id) {
        $url = 'https://pokeapi.co/api/v2/pokemon/'.$id.'/';
        $res = $this->callAPI($url);

        $types = [];
        foreach ($res['types'] as $key => $value) {
            $types[] = ucfirst($value['type']['name']);
        }
        $stats = [];
        foreach ($res['stats'] as $key => $value) {
            $stats[$value['stat']['name']] = $value['base_stat'];
        }
        $data[] = array(
            'no' => $res['id'],
            'name' => ucfirst($res['name']),
            'pic' => $res['sprites']['front_default'],
            'hp' => $stats['hp'],
            'att' => $stats['attack'],
            'def' => $stats['defense'],
            's_att' => $stats['special-attack'],
            's_def' => $stats['special-defense'],
            'spd' => $stats['speed'],
            'types' => $types
        );

        return $data;
    }

    public function getAllTypePokemons($type) {
        // Guardamos en $con la conexión con la base de datos.
        $con = $this->con;
        // Hacemos la consulta a la base de datos para traernos todos los
        // pokemons del tipo seleccionado.
        $qres = $con->query("SELECT p.id
        FROM pokemons p 
        LEFT JOIN pokemons_type t
        ON p.id = t.id
        LEFT JOIN type
        ON type.id_type = t.id_type
        WHERE '$type' = type.type")->fetchAll(PDO::FETCH_ASSOC);

        // Creamos un array vacío que será el que devolveremos.
        $res = [];

        // Si no existe el pokemon introducido, lanzamos una excepción.
        if($qres) {
            // Guardamos en $keys un array con los ids de los pokemons del tipo a
            // consultar.
            $keys = array_map(fn($p)=>$p['id'], $qres);
            // Transformamos el array en una cadena separada por comas.
            $keys = implode(',', array_values($keys));

            // Realizamos una nueva consulta a la base de datos en la que nos
            // traemos todos los pokemos con uno de los ids obtenidos previamente
            // para obtener todos los tipos de cada pokemon que cumpla ser del
            // tipo seleccionado.
            $fres = $con->query("SELECT p.id, p.no, p.pic, p.name, p.hp, p.att, p.def, p.s_att, p.s_def, p.spd, type.type
            FROM pokemons p 
            LEFT JOIN pokemons_type t
            ON p.id = t.id
            LEFT JOIN type
            ON type.id_type = t.id_type
            WHERE p.id IN ($keys)");

            // Usamos un id temporal en el que iremos guardando e id del pokémon
            // que estamos tratando.
            $id_temp = -1;
            
            // Creamos un array vacío en el que guardaremos los tipos
            // correspondientes al pokémon que estemos tratando.
            $types = [];
            // Recorremos el resultado de la consulta a la base de datos...
            foreach($fres as $row) {
                // Si es el mismo pokémon añadimos a tipos y si no iniciamos el
                // array de tipos con el primer tipo que aparezca.
                if($id_temp == $row['id']) {
                    $types[] = $row['type'];
                } else {
                    $types = [$row['type']];
                }
                // Guardamos en res los datos del pokémon indexados por su id.
                $res[$row['id']] = [
                    'no' => $row['no'],
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
                $id_temp = $row['id'];
            }

        } else {
            $res = $qres;
        }

        return $res;
    }

    public function deletePokemon($id) {
        // Guardamos en $con la conexión con la base de datos.
        $con = $this->con;
        // Hacemos la consulta a la base de datos para traernos todos los
        // pokemons del tipo seleccionado.
        $qres = $con->query("DELETE FROM pokemons WHERE id = $id");

        return $qres;
    }

    public function addPokemonFromAPI($id) {
        $data = $this->getPokemonAPI($id);
        $data = reset($data);

        $no = $data['no'];
        $name = $data['name'];
        $pic = $data['pic'];
        $hp = $data['hp'];
        $att = $data['att'];
        $def = $data['def'];
        $s_att = $data['s_att'];
        $s_def = $data['s_def'];
        $spd = $data['spd'];
        $types = $data['types'];
        $types = array_map(fn($t)=>"'".$t."'", $types);
        $types = implode(',', array_values($types));

        // Guardamos en $con la conexión con la base de datos.
        $con = $this->con;
        // Hacemos la consulta a la base de datos para traernos todos los
        // pokemons del tipo seleccionado.
        $resPokemon = $con->query("INSERT INTO pokemons (id,no,pic,name,hp,att,def,s_att,s_def,spd)
        VALUES (NULL,$no,'$pic','$name',$hp,$att,$def,$s_att,$s_def,$spd)");

        $resIdTypes = $con->query("SELECT id_type FROM `type` t WHERE t.type IN ($types)")->fetchAll(PDO::FETCH_ASSOC);
        $resIdTypes = array_map(fn($t)=>$t['id_type'],$resIdTypes);
        $newId = $con->query("SELECT id FROM pokemons p WHERE p.no = $no ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
        $newId = reset($newId)['id'];

        $resIdTypes = array_map(fn($t)=>'('.$newId.','.$t.')', $resIdTypes);
        $resIdTypes = implode(',', array_values($resIdTypes));

        $resPokemon = $con->query("INSERT INTO pokemons_type (id,id_type)
        VALUES $resIdTypes");

        return $resPokemon;
    }

    public function updatePokemon($id, $name) {
        // Guardamos en $con la conexión con la base de datos.
        $con = $this->con;
        // Hacemos la consulta a la base de datos para traernos todos los
        // pokemons del tipo seleccionado.
        $resPokemon = $con->query("UPDATE pokemons SET name = $name WHERE id = $id");

        return $resPokemon;
    }
}